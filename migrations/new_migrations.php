<?php

# Get the DB config
$config = require __DIR__ . '/../config/config.php';
$database = $config['database'];

# Declare the necessary variables
$messages = [];
$pdo = null;

# Connect to the database
try {
    $dsn = "mysql:host={$database['db_host']}";
    $pdo = new \PDO($dsn, $database['db_user'], $database['db_pass'], $config['pdo_options']);
    $messages[] =  "Database connection successful.";
} catch (\PDOException $e) {
    $messages[] =  "Database connection failed.";
}

# Always drop DB first run
try {
    $query = "DROP DATABASE IF EXISTS {$database['db_name']}";
    $pdo->exec($query);
} catch (\PDOException $e) {
    $messages[] =  "Unable to drop database.";
}

# Create the database
try {
    $query = "CREATE DATABASE IF NOT EXISTS {$database['db_name']} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
    $pdo->exec($query);
    $messages[] = "Database {$database['db_name']} was created successfully.";
} catch (\PDOException $e) {
    $messages[] = "Error creating database {$database['db_name']}.";
}

# Select the database