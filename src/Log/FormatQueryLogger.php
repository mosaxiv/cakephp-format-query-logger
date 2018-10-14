<?php

namespace mosaxiv\Log;

use Cake\Database\Log\QueryLogger;
use Cake\Log\Log;

class FormatQueryLogger extends QueryLogger
{
    /**
     * Wrapper function for the logger object, useful for unit testing
     * or for overriding in subclasses.
     *
     * @param \Cake\Database\Log\LoggedQuery $query to be written in log
     * @return void
     */
    protected function _log($query)
    {
        $rawQuery = $query->query;

        if (Log::getConfig('console-queries')) {
            $query->query = PHP_EOL . \SqlFormatter::format($rawQuery, true);
            Log::write('debug', $query, ['scope' => 'highlight-queriesLog']);
        }

        $query->query = PHP_EOL . \SqlFormatter::format($rawQuery, false) . PHP_EOL;
        Log::write('debug', $query, ['scope' => 'queriesLog']);
    }

    /**
     * query log setting
     *
     * @param \Cake\Datasource\ConnectionInterface $conn DatasourceConnection
     * @return void
     */
    static public function new(\Cake\Datasource\ConnectionInterface $conn)
    {
        $conn->logQueries(true);
        $conn->setLogger(new self());
    }

    /**
     * console query log setting
     *
     * @param \Cake\Datasource\ConnectionInterface $conn DatasourceConnection
     * @return void
     */
    static public function console(\Cake\Datasource\ConnectionInterface $conn)
    {
        Log::setConfig('console-queries', [
            'className' => 'Console',
            'stream' => 'php://stderr',
            'scopes' => ['highlight-queriesLog']
        ]);

        static::new($conn);
    }
}