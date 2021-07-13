<?php

require_once __DIR__. '/../vendor/autoload.php';

$URL = 'https://reqres.in/api/users?page=1';

$client = new GuzzleHttp\Client();

$start_time = microtime(true);
$response = $client->request('GET', $URL);
$time_elapsed = microtime(true) - $start_time;

// Print request execution time
echo "Request took: " . $time_elapsed . " seconds." . PHP_EOL;

// Get response status code
echo $response->getStatusCode() . PHP_EOL;

// Get response headers
echo $response->getHeader('Content-Type')[0] . PHP_EOL;

// Get response body
echo $response->getBody() . PHP_EOL;

// Get data and manipulate it
$data = $response->getBody();
$users = json_decode($data, true);

print_r($users);

echo "DONE!" . PHP_EOL;
