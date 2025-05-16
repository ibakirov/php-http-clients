<?php

require_once __DIR__. '/../vendor/autoload.php';

use WpOrg\Requests\Requests;

WpOrg\Requests\Autoload::register();

$URL = 'https://reqres.in/api/users?page=2';

$headers = array('Accept' => 'application/json');
$options = array();

$start_time = microtime(true);

$response = Requests::get($URL, $headers, $options);

$time_elapsed = microtime(true) - $start_time;

// Print request execution time
echo "Request took: " . $time_elapsed . " seconds." . PHP_EOL;

// Get response status code
echo "Response Status: " . $response->status_code . PHP_EOL;

// Get response headers
$headers = $response->headers;

echo "Response Headers: " . PHP_EOL;

foreach ($headers as $key => $value) {
    if (is_array($value)) {
        $value = implode(", ", $value);
    }
    echo "$key: $value" . PHP_EOL;
}

// Get response body
$data = $response->body;

echo "Response Body: " . $data . PHP_EOL;

// Manipulate data
$users = json_decode($data, true);

// Print user data
echo "User Data: " . PHP_EOL;

print_r($users);
