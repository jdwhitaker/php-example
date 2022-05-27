<!DOCTYPE html>
<body>
    <h1>Widget Search</h1>
    <form method="post" action="widget.php">
        Search for widgets
        <input type="text" name="name" />
        <input type="submit" />
    </form>
<?php
    if(!(isset($_POST['name'])) || strlen($_POST['name']) <= 0)
    {
        exit;
    }
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
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    foreach($rows as $row)
    {
        echo "<h2>{$row['name']}</h2>";
        echo "<p>{$row['value']}</p>";
    }
    $result->close();
    $conn->close();
?>
</body>