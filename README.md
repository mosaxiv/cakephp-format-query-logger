# FormatQueryLogger plugin for CakePHP

<p align="center"> 
<img src="https://raw.githubusercontent.com/mosaxiv/cakephp-format-query-logger/master/image.png">
</p>

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

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
