<?php

# Get the DB config
$config = require __DIR__ . '/../config/config.php';
$database = $config['database'];

# Declare the necessary variables
$messages = [];
$pdo = null;

try {
    # Connect to the mysql server
    $dsn = "mysql:host={$database['db_host']}";
    $pdo = new \PDO($dsn, $database['db_user'], $database['db_pass'], $config['pdo_options']);
    $messages[] =  "Database connection successful.";

    # Drop then re-create
    $pdo->exec("DROP DATABASE IF EXISTS `{$database['db_name']}`");
    $pdo->exec("CREATE DATABASE `{$database['db_name']}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE `{$database['db_name']}`");
    $messages[] = "Database initialized.";


    # Define tables
    $tables = [
        # Locations table
        "site_locations" => "CREATE TABLE site_locations (
                            location_id INT PRIMARY KEY AUTO_INCREMENT,
                            location_name VARCHAR(150) NOT NULL,
                            address TEXT,
                            is_active BOOLEAN DEFAULT TRUE,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                            ) ENGINE=InnoDB",

        # Locations tables
        "list_of_schools" => "CREATE TABLE schools (
                            school_id INT PRIMARY KEY AUTO_INCREMENT,
                            school_name VARCHAR(150) NOT NULL,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                            ) ENGINE=InnoDB",
        
        # Accounts : core authentication table
        "accounts" => "CREATE TABLE accounts (
                        accounts_id INT PRIMARY KEY AUTO_INCREMENT,
                        email VARCHAR(150) UNIQUE NOT NULL,
                        password VARCHAR(255) NOT NULL,
                        role ENUM('admin', 'intern') NOT NULL,
                        last_login DATETIME NULL,
                        last_update TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                        ) ENGINE=InnoDB",

        # Admin details : links to accounts and site_locations
        "admin_details" => "CREATE TABLE admin_details (
                            admin_id INT PRIMARY KEY,
                            first_name VARCHAR(50) NOT NULL,
                            middle_name VARCHAR(50),
                            last_name VARCHAR(50) NOT NULL,
                            mobile_no VARCHAR(30),
                            site_location_id INT,
                            CONSTRAINT fk_admin_site
                                FOREIGN KEY (site_location_id)
                                REFERENCES site_locations(location_id)
                                ON DELETE SET NULL,
                            CONSTRAINT fk_admin_account
                                FOREIGN KEY (admin_id)
                                REFERENCES accounts(accounts_id)
                                ON DELETE CASCADE
                            ) ENGINE=InnoDB",
        
        # Intern details : links to accounts and site_locations
        "intern_details" => "CREATE TABLE intern_details (
                            intern_id INT PRIMARY KEY,
                            first_name VARCHAR(50) NOT NULL,
                            middle_name VARCHAR(50),
                            last_name VARCHAR(50) NOT NULL,
                            mobile_no VARCHAR(30),
                            user_address TEXT,
                            school_id INT,
                            site_location_id INT,
                            total_required_hours INT DEFAULT 0,
                            status ENUM('active','inactive','suspended','deleted') DEFAULT 'active',
                            last_status_updated DATETIME DEFAULT NULL,
                            last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                            CONSTRAINT fk_intern_site
                                FOREIGN KEY (site_location_id)
                                REFERENCES site_locations(location_id)
                                ON DELETE SET NULL,
                            CONSTRAINT fk_intern_account
                                FOREIGN KEY (intern_id)
                                REFERENCES accounts(accounts_id)
                                ON DELETE CASCADE,
                            CONSTRAINT fk_intern_school
                                FOREIGN KEY (school_id)
                                REFERENCES schools(school_id)
                                ON DELETE SET NULL
                            ) ENGINE=InnoDB",
        
        # Intern Timesheet : Depends on intern details
        "intern_timesheets" => "CREATE TABLE intern_timesheets (
                            timesheet_id INT PRIMARY KEY AUTO_INCREMENT,
                            intern_id INT,
                            date DATE NOT NULL,
                            time_in DATETIME NOT NULL,
                            time_out DATETIME NULL,
                            hours_daily DECIMAL(6,2) DEFAULT 0.00,
                            timesheet_status ENUM('pending','approved','rejected') DEFAULT 'pending',
                            notes TEXT,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                            CONSTRAINT fk_timesheet_intern
                                FOREIGN KEY (intern_id)
                                REFERENCES intern_details(intern_id)
                                ON DELETE CASCADE
                            ) ENGINE=InnoDB",
    ];

    # Create the tables
    foreach ($tables as $name => $query) {
        try {
            $pdo->exec($query);
            $messages[] = "Table `{$name}` created successfully.";
        } catch (\PDOException $e) {
            $messages[] = "Failed to create table `{$name}`: " . $e->getMessage();
        }
    }

    # INSERT INITIAL site_locations
    $list_of_locations = require __DIR__ . '/../includes/list_of_sites.php';
    foreach($list_of_locations as $key => $data) {
        try {
            $statement = $pdo->prepare("INSERT INTO site_locations (location_name, address, is_active) VALUES (?, ?, ?)");
            $statement->execute([
                $data['location_name'],
                $data['address'],
                $data['is_active']
            ]);
            $messages[] = "Location `{$data['location_name']}` inserted successfully.";
        } catch (\PDOException $e) {
            $messages[] = "Failed to insert location data.";
        }
    }

    # INSERT SCHOOL

    $list_of_school = require __DIR__ . '/../includes/list_of_schools.php';

    foreach($list_of_school as $data) {
        try {
            $statement = $pdo->prepare("INSERT INTO schools (school_name) VALUES (?)");
            $statement->execute([
                $data
            ]);
            $messages[] = "School `{$data}` inserted successfully.";
        } catch (\PDOException $e) {
            $messages[] = "Failed to insert school data.";
        }
    }

    # INSERT super admin credentials
    try {
        $pdo->beginTransaction();

        $statement = $pdo->prepare("INSERT INTO accounts (email, password, role) VALUES (?,?,?)");
        $statement->execute([
            'itpadmin@omegahms.com',
            password_hash('admin123', PASSWORD_DEFAULT),
            'admin'
        ]);

        $new_account_id = $pdo->lastInsertId();
        
        $statement = $pdo->prepare("INSERT INTO admin_details 
                                (admin_id, first_name, middle_name, last_name, mobile_no, site_location_id) 
                                VALUES (?, ?, ?, ?, ?, ?)
                                ");
        $statement->execute([$new_account_id, 'IT', '', 'Administrator', '+639398878158', '1']);

        $pdo->commit();
        $messages[] = "Admin account created and added successfully.";

    } catch (\PDOException $e) {

        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }

        $messages[] = "Admin account creation failed.";
    }

    # INSERT interns
    try {
        $list_of_interns = require __DIR__ . '/../includes/sample_interns.php';
        $pdo->beginTransaction();

        foreach ($list_of_interns as $interns => $data) {
            $statement = $pdo->prepare("INSERT INTO accounts (email, password, role) VALUES (?,?,?)");
            $statement->execute([
                $data['email'],
                password_hash($data['password'], PASSWORD_DEFAULT),
                $data['role']
            ]);

            $new_account_id = $pdo->lastInsertId();
            $sample_school_id = mt_rand(1,20);

            $statement = $pdo->prepare("INSERT INTO intern_details 
                                    (intern_id, first_name, middle_name, last_name, mobile_no, user_address, school_id, site_location_id, total_required_hours, status) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                                    ");
            $statement->execute([
                $new_account_id, 
                $data['firstname'],
                $data['middle_name'],
                $data['lastname'],
                '+'.$data['mobile_no'],
                $data['user_address'],
                $sample_school_id,
                $data['site_location'],
                $data['total_hrs_required'],
                $data['status'],
                ]);
        }

        $pdo->commit();
        $messages[] = "Intern account created and added successfully.";

    } catch (\PDOException $e) {

        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }

        $messages[] = "Intern account creation failed.";
    }

} catch (\PDOException $e) {
    $messages[] =  "Database connection failed.";
}

# Output the messages
foreach ($messages as $message) {
    echo $message . "<br />";
}