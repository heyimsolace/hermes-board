<?php

// DATABASE INTEGRATION

// DB INFO
$servername = "hermes-board.tk";
$username = "hermes";
$password = "hermes";
$database = "hermes_board";

// DB CONNECT
try {
    $db = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
