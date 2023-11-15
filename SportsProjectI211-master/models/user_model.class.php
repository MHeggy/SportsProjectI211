<?php
/**
 * Author: Miles Hegeduis
 * Date: 11/15/2023
 * File Name: user_model.class.php
 * Description: File defining the UserModel class.
 */

class UserModel {// start of UserModel class.
    private $db;

    // constructor
    public function __construct() {
        $this->db = Database::getInstance();
    }// end of constructor.

    // function to add users when they register.
    public function add_user($username, $password, $email, $firstName, $lastName, $phone) {
        $conn = $this->db->getConnection();
        $table = $this->db->getCustomerTable();

        // hash the password before storing it in the database.
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // create SQL query to insert user data into customers table.
        $query = "INSERT INTO $table (username, password, email, first_name, last_name, phone) VALUES(?, ?, ?, ?, ?, ?)";

        // create prepared statement.
        $stmt = $conn->prepare($query);

        // Check if the statement is prepared successfully
        if (!$stmt) {
            die('Error: ' . $conn->error); // Display error message
        }

        // Bind parameters to the statement
        $stmt->bind_param("sssss", $username, $hashedPassword, $email, $firstName, $lastName, $phone);

        // Execute the statement
        $success = $stmt->execute();

        if ($success) {
            return true;
        } else {
            return false;
        }
    }// end of add_user function.

}// end of UserModel class.