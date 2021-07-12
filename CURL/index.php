<?php

$URL = 'https://gorest.co.in/public/v1/posts';
$options = array();

$curl = curl_init($URL);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $URL . '?' . http_build_query($options));

$response = curl_exec($curl);
$data = json_decode($response, true);
curl_close($curl);

echo "<pre>";
print_r($data);

