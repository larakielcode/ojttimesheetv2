<?php

namespace App\Core;
class User
{
    protected \PDO $connection;
    private string $firstname;
    private string $middlename;
    private string $lastname;
    private string $school;
    private int $total_required_hours;
    private int $site_location;
    private string $user_address;
    private string $mobile_no;
    private string $status;
    private string $date_status_updated;
    private string $email;
    private string $password;
    private string $role;

    // this is to instantiate the user
    public function __construct(
        private int $users_id
    ) {
        $this->connection = require __DIR__ . '/../includes/connection.php';
    }

    public function insertUser()
    {
        // function to insert user to the db using transaction
    }

    public function getUser()
    {
        // function to get user
        $user = Database::query("SELECT * FROM users WHERE users_id = :users_id",['usersid' => $this->users_id]);
        dd($user);
    }

    public function getAllUser()
    {
        //function to get all the users
    }

    public function editUser()
    {
        //function to edit the user
    }
}
