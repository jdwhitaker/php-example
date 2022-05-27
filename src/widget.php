<?php

$conn = new mysqli(
    $_ENV['MYSQL_HOSTNAME'],
    $_ENV['MYSQL_USER'],
    $_ENV['MYSQL_PASSWORD'],
    $_ENV['MYSQL_DATABASE']);
if ($conn->connect_error) die("Fatal Error: MySQL connect");
$query = "SELECT * FROM widgets WHERE name LIKE ?";
$search = "%{$_POST['name']}%";
$statement = $conn->prepare($query);
$statement->bind_param("s", $search);
$statement->execute();
$result = $statement->get_result();
if (!$result) die("Fatal Error: MySQL result");
print_r($result);
$rows = $result->fetch_all();
print_r($rows);
$result->close();
$conn->close();