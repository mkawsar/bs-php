<?php

// Create connection
function connection() {
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "ecommerce";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
