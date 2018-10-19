# FormatQueryLogger plugin for CakePHP

Format the query log.

#  Default :fearful:
<p align="center">
    <img src="https://raw.githubusercontent.com/mosaxiv/cakephp-format-query-logger/master/image2.png">
</p>

# Plugin :smile:
<p align="center">
    <img src="https://raw.githubusercontent.com/mosaxiv/cakephp-format-query-logger/master/image.png">
</p>

## Installation

```
composer require mosaxiv/cakephp-format-query-logger
```

## Requirements

* CakePHP3.5.0+

## Usage

### Console Log

```php
use Cake\Datasource\ConnectionManager;
use mosaxiv\Log\FormatQueryLogger;

$con = ConnectionManager::get('default');
FormatQueryLogger::console($con);
```

### File Log

```php
use Cake\Datasource\ConnectionManager;
use mosaxiv\Log\FormatQueryLogger;
use Cake\Log\Log;

Log::config('queries', [
    'className' => 'File',
    'path' => LOGS,
    'file' => 'queries.log',
    'scopes' => ['queriesLog']
]);
$con = ConnectionManager::get('default');
FormatQueryLogger::new($con);
```
