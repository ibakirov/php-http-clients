<?php

require_once __DIR__. '/../vendor/autoload.php';

use \Httpful\Request;

$URL = 'https://gorest.co.in/public/v1/comments';

$start_time = microtime(true);
$response = Request::get($URL)
    ->expectsJson()
    ->send();
$time_elapsed = microtime(true) - $start_time;

// Print request execution time
echo "Request took: " . $time_elapsed . " seconds." . PHP_EOL;

echo $response->raw_body;
