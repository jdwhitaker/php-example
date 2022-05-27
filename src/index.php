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

$conn = new mysqli(
    $_ENV['MYSQL_HOSTNAME'],
    $_ENV['MYSQL_USER'],
    $_ENV['MYSQL_PASSWORD'],
    $_ENV['MYSQL_DATABASE']);
if ($con->connect_error) die("Fatal Error: MySQL connect");
$query = "SELECT * FROM widgets";
$result = $conn->query($query);
if (!$result) die("Fatal Error: MySQL result");
