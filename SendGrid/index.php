<?php

require_once __DIR__. '/../vendor/autoload.php';

$URL = 'https://reqres.in/api/users?page=2';

$client = new SendGrid\Client($URL);

$start_time = microtime(true);

$response = $client->get();

$time_elapsed = microtime(true) - $start_time;

// Print request execution time
echo "Request took: " . $time_elapsed . " seconds." . PHP_EOL;

// Get response status code
echo "Response Status: " . $response->statusCode() . PHP_EOL;

// Get response headers
$headers = $response->headers();

echo "Response Headers: " . PHP_EOL;

foreach ($headers as $key => $value) {
    if (is_array($value)) {
        $value = implode(", ", $value);
    }
    echo "$key: $value" . PHP_EOL;
}

// Get response body
$data = $response->body();

echo "Response Body: " . $data . PHP_EOL;

// Manipulate data
$users = json_decode($data, true);

// Print user data
echo "User Data: " . PHP_EOL;

print_r($users);

echo "DONE!" . PHP_EOL;
