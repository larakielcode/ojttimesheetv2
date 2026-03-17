<?php
include __DIR__ . '/../includes/connection.php';

$test_query = "CREATE TABLE IF NOT EXISTS users (
            users_id INT AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(50) NOT NULL,
            middle_name VARCHAR(50),
            last_name VARCHAR(50) NOT NULL,
            school VARCHAR(100),
            total_required_hours INT DEFAULT 0,
            site_location INT,
            user_address TEXT,
            mobile_no VARCHAR(30),
            status ENUM('active','inactive','suspended','deleted') DEFAULT 'active',
            date_status_updated DATETIME DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

try {
    $stmt = $connection->exec($test_query);
    echo "Created tables successfully";
} catch (PDOException $e) {
    die("Error creating tables." . $e->getMessage());
}
