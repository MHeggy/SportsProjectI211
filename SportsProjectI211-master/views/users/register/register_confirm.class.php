<?php
/**
 * Author: Miles Hegeduis
 * Date: 11/15/2023
 * File Name: register_confirm.class.php
 * Description: File defining the RegisterConfirm class.
 */

class RegisterConfirm extends View {
    public function display() {
        parent::header();
        ?>

        <div class="confirmation-container">
            <style>
                .confirmation-container {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-direction: column; /* Stack elements vertically */
                    height: 100vh;
                    margin: 0;
                    font-family: 'Arial', sans-serif;
                    background-color: #f4f4f4;
                }

                .confirmation-message {
                    font-size: 24px;
                    margin-bottom: 20px;
                    text-align: center;
                }

                .confirmation-image {
                    max-width: 100%;
                    height: auto;
                }
            </style>

            <div class="confirmation-message">Congratulations! You have successfully registered for the site.</div>
            <img class="confirmation-image" src="path/to/your/success/image.jpg" alt="Success Image">
        </div>

        <?php
        parent::footer();
    }
}
