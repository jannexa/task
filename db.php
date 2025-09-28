<?php
// Read database credentials from environment variables
$host     = getenv('DB_HOST') ?: 'localhost';
$user     = getenv('DB_USER') ?: 'root';
$pass     = getenv('DB_PASS') ?: '';
$db       = getenv('DB_NAME') ?: 'task_db';
$port     = getenv('DB_PORT') ?: 3306;  // Default MySQL port

// Create MySQLi connection
$conn = new mysqli($host, $user, $pass, $db, $port);

// Check connection
if ($conn->connect_error) {
    die("❌ Database connection failed: " . $conn->connect_error);
}

// Ensure UTF-8
$conn->set_charset("utf8");
?>
