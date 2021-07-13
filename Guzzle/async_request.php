<?php

require_once __DIR__. '/../vendor/autoload.php';

$client = new GuzzleHttp\Client();

// Send an asynchronous request
$request = new GuzzleHttp\Psr7\Request('GET', 'https://httpbin.org');

$start_time = microtime(true);
$promise = $client->sendAsync($request)->then(function ($response) {
    echo "Async Request completed!" . PHP_EOL . $response->getBody();
});
$promise->wait();

$time_elapsed = microtime(true) - $start_time;

// Print request execution time
echo "Request took: " . $time_elapsed . " seconds." . PHP_EOL;

