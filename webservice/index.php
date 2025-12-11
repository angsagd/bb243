<?php

// endpoint API
$url = 'https://dummyjson.com/users/20';
$response = file_get_contents($url);

// header('Content-Type: application/json');
// echo $response;

$user = json_decode($response);

$namaDepan    = $user->firstName;
$namaBelakang = $user->lastName;

echo "<h1>$namaDepan $namaBelakang</h1>";


?>