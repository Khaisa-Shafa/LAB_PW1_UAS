<?php
// Create connection
$conn = new mysqli("localhost", "root", "","todolist");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>