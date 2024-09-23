<?php

// mysql

$host = "localhost";
$user = "php_app";
$password = "1234";
$database = "sql_store";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection Failed: " . $connect_error);
}

echo "Connection Successful!";

$sql = "SELECT customer_id, first_name, last_name FROM customers";
$result = $conn->query($sql);

var_dump($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUSTOMERS</title>
</head>
<body>
    <h1>CUSTOMERS</h1>

    <?php
        if ($result->num_rows > 0) {
            echo "<ul>";
            while($row = $result->fetch_assoc()) {
                // print_r($row);
                // izvadīt katru klientu ar li elementu
                // echo "<li>Customer ID: " . $row["customer_id"] . "</li>";
                echo "<li>Name: " . $row["first_name"] . ", " . $row["last_name"] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "No customers found";
        }
    ?>
</body>
</html>