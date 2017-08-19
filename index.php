<?php
require_once 'vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Judges119\Monolog\Formatter\ZalgoFormatter;
$log = new Logger('demo');
$zalgo = new ZalgoFormatter();
$handler = new StreamHandler('php://stdout', Logger::INFO);
$handler->setFormatter($zalgo);
$log->pushHandler($handler);
$log->info('He who will sing the song that ends the world');
