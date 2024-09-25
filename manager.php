<?php

// mysql

$host = "localhost";
$user = "php_app";
$password = "1234";
$database = "sql_hr";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection Failed: " . $connect_error);
}

echo "Connection Successful!";

$sql = "
SELECT 
e.employee_id,
e.first_name,
e.last_name,
-- e.reports_to,
m.first_name AS 'manager'
FROM
employees e
    JOIN
employees m ON e.reports_to = m.employee_id";

$result = $conn->query($sql);

var_dump($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPLOYEES THAT REPORT TO MANAGER</title>
</head>
<body>
    <h1>EMPLOYEES THAT REPORT TO MANAGER</h1>

    <?php
        if ($result->num_rows > 0) {
            echo "<ul>";
            while($row = $result->fetch_assoc()) {
                // print_r($row);
                // izvadīt katru klientu ar li elementu
                // echo "<li>Customer ID: " . $row["customer_id"] . "</li>";
                echo "<li>" . $row["first_name"] . ", " . $row["last_name"] . ", Manager: " . $row["manager"] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "No employees found";
        }
    ?>
</body>
</html>