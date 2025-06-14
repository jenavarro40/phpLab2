<?php
require_once('inc/config.inc.php');

class Validate
{


    static $valid_status = [];

    // It is up to you on how to implement the valid_status array. 
    // Make sure that you can use the array to display the notification error
    // and the validated post data
    // make sure to update the valid_status attribute everytime you validate an input.
    // all input are required

    static function validateForm()
    {
        global $shippingCost;

        //Validate the name
        $name = filter_input(INPUT_POST, "Fullname", FILTER_UNSAFE_RAW);
        if (empty($name) || preg_match("/^[^a-zA-Z\s]$/", $name)) {
            self::$valid_status["name"] = "Please Write your Name";
            error_log("NAME: empty or wrong format");
        }

        //Validate the email address, use filter_input    
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        if ($email === false) {
            self::$valid_status["email"] = "Please check your email";
            error_log("EMAIL: empty or wrong format");

        }


        //Validate the phone number, use filter_input with regexp   
        $phoneRegex = ["options" => ["regexp" => "/^\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/"]];
        $phone = filter_input(INPUT_POST, "phoneNumber", FILTER_VALIDATE_REGEXP, $phoneRegex);
        if ($phone === false) {
            self::$valid_status["phone"] = "Please check your phone";
            error_log("PHONE: empty or wrong format");
        }

        //Validate the amount of prodcut amount, use filter_input with minimum range (1) and maximum range (6)
        $productfilter = array("options" => array("min_range" => 1, "max_range" => 6));
        $product = filter_input(INPUT_POST, "productAmount", FILTER_VALIDATE_INT, $productfilter);
        if ($product === false) {
            self::$valid_status["product"] = "Please check your Product amount";
            error_log("PRODUCT AMOUNT: empty or outside range");
        }
        //Ensure one of the gift wrap options is checked
        $giftWrap = filter_input(INPUT_POST, 'giftWrap');
        if ($giftWrap !== 'yes' && $giftWrap !== 'no') {
            self::$valid_status["wrap"] = "Please check your Product amount";
            error_log("GIFT WRAP: empty or outside range");
        }

        //Ensure the drop down shipping option was selected
        foreach ($shippingCost as $key => $value) {
            $shippingCostVal[] = $key;
        }
        $shipping = filter_input(INPUT_POST, 'shipping', FILTER_SANITIZE_STRING);
        if (!in_array($shipping, $shippingCostVal)) {
            self::$valid_status["shipping"] = "Please choose a shipping option";
            error_log("SHIPPING: empty or outside range");

        }

        //print_r(self::$valid_status);

        return self::$valid_status;


    }
}