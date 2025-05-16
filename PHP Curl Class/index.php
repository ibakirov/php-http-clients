<?php

require_once __DIR__. '/../vendor/autoload.php';

use Curl\Curl;

$URL = 'https://reqres.in/api/users?page=2';

$curl = new Curl();

$start_time = microtime(true);

$curl->get($URL);

$time_elapsed = microtime(true) - $start_time;

// Print request execution time
echo "Request took: " . $time_elapsed . " seconds." . PHP_EOL;

// Get response status code
echo "Response Status: " . $curl->getHttpStatusCode() . PHP_EOL;

// Get response headers
$headers = $curl->responseHeaders;

echo "Response Headers: " . PHP_EOL;

foreach ($headers as $key => $value) {
    if (is_array($value)) {
        $value = implode(", ", $value);
    }
    echo "$key: $value" . PHP_EOL;
}

// Get response body
$data = $curl->getResponse();

echo "Response Body: " . json_encode($data) . PHP_EOL;

// Manipulate data
$users = json_encode($data);

// Print user data
echo "User Data: " . PHP_EOL;

print_r($users);

echo "DONE!" . PHP_EOL;
