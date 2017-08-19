# MonoZalgo

A [monolog](https://github.com/Seldaek/monolog) formatter that that spices up your logs with the whispers of [Zalgo](http://knowyourmeme.com/memes/zalgo).

## Demo

```
$log = new Logger('demo');
$handler = new StreamHandler('php://stdout', Logger::INFO);
$handler->setFormatter(new ZalgoFormatter());
$log->pushHandler($handler);
$log->info('He who will sing the song that ends the world');
```
