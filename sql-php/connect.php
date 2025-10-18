<?php
$host = "localhost";
$port = "3306";
$user = "root";
$pass = "84648337";
$db   = "booking";

$mysqli = new mysqli($host, $user, $pass, $db, $port);
if ($mysqli->connect_errno) {
    echo 'Database connection failed: ' . htmlspecialchars($mysqli->connect_error, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    exit;
}