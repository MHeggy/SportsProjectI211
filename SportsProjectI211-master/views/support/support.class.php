<?php
/**
 * Author: Miles Hegeduis
 * Date: 11/15/2023
 * File Name: support.class.php
 * Description: File that defines the SupportView class.
 */

class SupportView extends View {// start of SupportView Class.

    public function display() {// start of display function.
        // header
        parent::header();

        ?>

        <div style="background-color: #393ECE">
            <h2>How may we help you, today?</h2>
        </div>

        <?php
        // footer
        parent::footer();
    }// end of display function.
}// end of SupportView class.