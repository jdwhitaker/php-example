<?php
require 'vendor/autoload.php';

require_once('Library.php');
require_once('User.php');

echo double(2) . "\n";
$user = new User('John', 'iloveyou', 2);
$user->greet();
echo User::ADMIN . "\n";
$user->priv();

$ping = (new \JJG\Ping('8.8.8.8'))->ping();
print_r($ping);