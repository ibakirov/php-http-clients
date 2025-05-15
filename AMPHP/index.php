<?php

require_once __DIR__. '/../vendor/autoload.php';

use Amp\Http\Client\HttpClientBuilder;
use Amp\Http\Client\Request;

$URL = 'https://reqres.in/api/users?page=1';

$client = HttpClientBuilder::buildDefault();

$start_time = microtime(true);

$response = $client->request(new Request($URL));

$time_elapsed = microtime(true) - $start_time;

// Print request execution time
echo "Request took: " . $time_elapsed . " seconds." . PHP_EOL;

// Get response status code
echo "Response Status: " . $response->getStatus() . PHP_EOL;

// Get response headers
$headers = $response->getHeaders();

echo "Response Headers: " . PHP_EOL;

foreach ($headers as $key => $value) {
    if (is_array($value)) {
        $value = implode(", ", $value);
    }
    echo "$key: $value" . PHP_EOL;
}

// Get response body
$data = $response->getBody()->buffer();

echo "Response Body: " . $data . PHP_EOL;

// Manipulate data
$users = json_decode($data, true);

// Print user data
echo "User Data: " . PHP_EOL;

print_r($users);

echo "DONE!" . PHP_EOL;
