<?php

require_once '../vendor/autoload.php';

$URL = 'https://jsonplaceholder.typicode.com/users';

$headers = array('Accept' => 'application/json');

$start_time = microtime(true);
$response = Unirest\Request::get($URL, $headers);
$time_elapsed = microtime(true) - $start_time;

// Print request execution time
echo "Request took: " . $time_elapsed . " seconds." . PHP_EOL;

print_r($response);

echo $response->code . PHP_EOL;        // HTTP Status code
echo $response->headers . PHP_EOL;     // Headers
echo $response->body . PHP_EOL;        // Parsed body
echo $response->raw_body . PHP_EOL;    // Unparsed body
