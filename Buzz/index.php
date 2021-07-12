<?php

require_once '../vendor/autoload.php';

use Buzz\Browser;
use Buzz\Client\FileGetContents;
use Nyholm\Psr7\Factory\Psr17Factory;

$client = new FileGetContents(new Psr17Factory());
$browser = new Browser($client, new Psr17Factory());

$start_time = microtime(true);
$response = $browser->get('https://www.google.com');
$time_elapsed = microtime(true) - $start_time;

// Print request execution time
echo "Request took: " . $time_elapsed . " seconds." . PHP_EOL;

// $response is a PSR-7 object.
echo $response->getStatusCode() . PHP_EOL;

echo $response->getBody() . PHP_EOL;
