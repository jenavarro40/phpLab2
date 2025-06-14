<?php
require_once('inc/config.inc.php');

class Page
{
    static private $title = "My First Formulary in PHP";
    static private $studentName = "Javier Enrique Navarro";
    static private $studentID = "300368873";

    // This static function set the HTML header including the title and display the student name and ID
    static function getHeader()
    {
        ?>
        <html>

        <head>
            <meta charset="utf-8">
            <meta name="author" content="">
            <title></title>
            <link href="css/styles.css" rel="stylesheet">
        </head>

        <body>
            <header>
                <h1>Assignment 2: <?= self::$title ?>         <?= self::$studentName ?> (<?= self::$studentID ?>)</h1>
            </header>
            <?php

    }

    // This static function close all the HTML tags at the bottom of the document
    static function getFooter()
    {
        ?>
            <!-- Start the page's footer -->
            </article>
        </body>

        </html>
        <?php


    }

    // This static function display the form. It gets the information of the valid input 
    // that can be part of the $validation status array from the Validate class
    // Note: The correct post data will be displayed within the HTML input control object
    static function showForm($valid_status)
    {

            ?>
            <article>
                <section class="main">
                    <!-- Start the page's form -->
                    <div class="form">
                        <form action="" method="post">
                            <fieldset id="form">
                                <legend>Douglas Custom Build Order Page</legend>
                                <div>
                                    <label for="fullName">Full Name</label>
                                    <input type="text" name="fullName" id="fullName" placeholder="First and last name">
                                </div>
                                <div>
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" id="email" placeholder="someone@here.ca">
                                </div>
                                <div>
                                    <label for="phoneNumber">Phone Number</label>
                                    <input type="text" name="phoneNumber" id="phoneNumber" placeholder="(nnn) nnn nnnn">
                                </div>
                                <div>
                                    <label for="productAmount">Product Amount</label>
                                    <input type="text" name="productAmount" id="productAmount"
                                        placeholder="number of product less than 7">
                                </div>
                                <div>
                                    <label for="giftWrap">Gift wrap?</label>
                                    <span>
                                        <input type="radio" name="giftWrap" id="giftWrapYes" value="yes"> Yes
                                        <input type="radio" name="giftWrap" id="giftWrapNo" value="no"> No
                                    </span>
                                </div>
                                <div>
                                    <label for="shipping">Shipping Priority</label>
                                    <select name="shipping">
                                        <option value="Select...">Please select one option</option>
                                        <option value="regular">Regular - $6</option>
                                        <option value="express">Express - $15</option>
                                        <option value="priority">Priority - $25</option>
                                    </select>
                                </div>
                                <div>
                                    <input type="submit" name="submit" value="Submit Order">
                                    <input type="reset" name="reset" value="Clear Data">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </section>
                <?php

        
    }

    // This static function read the validation status property of the Validate class 
    // and display the error messages or submission notification
    static function ShowNotification($valid_status)
    {
        ?>
            <section class="sidebar">
                <!-- Start the page's error notification -->
                <div class="highlight">
                    <p>Please fix the following errors:</p>
                    <ul>
                        <li>Error 1</li>
                        <li>Error 2</li>
                    </ul>
                </div>
            <?php

    }



    // This static function display the submitted data. The shipping cost variable is the 
    // shipping cost associative array declared in config.inc.php
    // Make sure to calculate the total cost
    static function showData($shippingCost)
    {

    }
}
?>