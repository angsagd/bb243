<?php

// require necessary files
require_once 'inc/config.php';

// testing code

$user = new User;

$allUser = $user->getAll();

print_r($allUser);