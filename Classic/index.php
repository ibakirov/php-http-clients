<?php
// File path or URL
$URL = 'users.json'; # https://jsonplaceholder.typicode.com/

// Read JSON file
$res = file_get_contents($URL);
echo "<pre>";
print_r($res);

echo PHP_EOL;
echo "VAR_DUMP CONTENT:" . PHP_EOL;
var_dump($res);

// Decode JSON data into array
$users = json_decode($res, true);
foreach ($users as $user) {
    echo $user['name'] . ' : ' . $user['username'] . ' : ' . $user['email'] . PHP_EOL;
}

// Write JSON file
for ($i = 0; $i < count($users); $i++) {
    // Add new element key 'age' with value
    $users[$i]['age'] = random_int(15, 100);
}
// Encode data to JSON
$json_data = json_encode($users, JSON_PRETTY_PRINT);

// Write data into file
file_put_contents('new_users.json', $json_data);

print_r($users);
