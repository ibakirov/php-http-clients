<?php

require_once __DIR__. '/../vendor/autoload.php';

$URL = 'https://jsonplaceholder.typicode.com/todos';

$headers = array('Accept' => 'application/json');
$options = array();

$start_time = microtime(true);
$request = Requests::get($URL, $headers, $options);
$time_elapsed = microtime(true) - $start_time;

// Print request execution time
echo "Request took: " . $time_elapsed . " seconds." . PHP_EOL;

var_dump($request);

// int(200)
echo $request->status_code . PHP_EOL;
// string(31) "application/json; charset=utf-8"
echo $request->headers['content-type'] . PHP_EOL;

echo $request->body;
