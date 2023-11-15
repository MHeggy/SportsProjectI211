<?php
/**
 * Author: Miles Hegeduis
 * Date: 11/15/2023
 * File Name: register.class.php
 * Description: File defining the RegisterView class
 */

class RegisterView extends View {
    public function display() {
        parent::header();
        ?>

        <div class="registration-container">
            <style>
                .registration-container {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-direction: column; /* Added to stack title and form vertically */
                    height: 100vh;
                    margin: 0;
                    font-family: 'Arial', sans-serif;
                    background-color: #f4f4f4;
                }

                .registration-title {
                    font-size: 24px;
                    margin-bottom: 20px;
                }

                .registration-form {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    max-width: 400px;
                    width: 100%;
                }

                .registration-form input {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 15px;
                    box-sizing: border-box;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                }

                .registration-form input[type="submit"] {
                    background-color: #4caf50;
                    color: white;
                    cursor: pointer;
                }

                .registration-form input[type="submit"]:hover {
                    background-color: #45a049;
                }
            </style>

            <div class="registration-title">Registration Form</div>

            <form class="registration-form" action="index.php?action=do_register" method="post">
                <input type="text" name="username" required="required" placeholder="Username">
                <input type="password" name="password" required="required" placeholder="Password">
                <input type="email" name="email" required="required" placeholder="Email">
                <input type="text" name="first_name" required="required" placeholder="First Name">
                <input type="text" name="last_name" required="required" placeholder="Last Name">
                <input type="text" name="phone" required="required" placeholder="Phone Number">
                <input type="submit" value="Submit">
            </form>
        </div>

        <?php
        parent::footer();
    }
}

