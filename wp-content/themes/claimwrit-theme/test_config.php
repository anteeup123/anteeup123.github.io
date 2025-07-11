<?php
require_once __DIR__ . '/includes/config.php';

try {
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($mysqli->connect_error) {
        throw new Exception("Connection failed: " . $mysqli->connect_error);
    }
    
    echo "✅ Database connected successfully!<br>";
    echo "MySQL Server Version: " . $mysqli->server_info;
    
    // Test creating a table (optional)
    $mysqli->query("CREATE TABLE IF NOT EXISTS test_connection (id INT AUTO_INCREMENT PRIMARY KEY, message VARCHAR(255))");
    echo "<br>✅ Test table created (if didn't exist).";
    
    $mysqli->close();
} catch (Exception $e) {
    die("❌ Error: " . $e->getMessage());
}