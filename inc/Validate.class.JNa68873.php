<?php
require_once('inc/config.inc.php');

class Validate
{


    static $valid_status = [];
    static $error_status = [];

    // It is up to you on how to implement the valid_status array. 
    // Make sure that you can use the array to display the notification error
    // and the validated post data
    // make sure to update the valid_status attribute everytime you validate an input.
    // all input are required

    static function validateForm()
    {
        global $shippingCost;
       
        $flagStatus = false;

        //Validate the name
        $name = filter_input(INPUT_POST, "fullName", FILTER_UNSAFE_RAW);
        if (empty($name) || preg_match("/^[^a-zA-Z\s]$/", $name)) {
            self::$error_status["name"] = "Please Write your Name";
            self::$valid_status["name_value"] = null;
            error_log("NAME: empty or wrong format");
        } else {
            self::$valid_status["name_value"] = $name;
        }

        //Validate the email address, use filter_input    
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        if ($email === false) {
            self::$error_status["email"] = "Please check your email";
            self::$valid_status["email_value"] = null;
            error_log("EMAIL: empty or wrong format");

        } else {
            self::$valid_status["email_value"] = $email;
        }


        //Validate the phone number, use filter_input with regexp   
        $phoneRegex = ["options" => ["regexp" => "/^\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/"]];
        $phone = filter_input(INPUT_POST, "phoneNumber", FILTER_VALIDATE_REGEXP, $phoneRegex);
        if ($phone === false) {
            self::$error_status["phone"] = "Please check your phone";
            self::$valid_status["phone_value"] = null;
            error_log("PHONE: empty or wrong format");
        } else {
            self::$valid_status["phone_value"] = $phone;
        }

        //Validate the amount of prodcut amount, use filter_input with minimum range (1) and maximum range (6)
        $productfilter = array("options" => array("min_range" => 1, "max_range" => 6));
        $product = filter_input(INPUT_POST, "productAmount", FILTER_VALIDATE_INT, $productfilter);
        if ($product === false) {
            self::$error_status["product"] = "Please check your Product amount";
            self::$valid_status["product_value"] = null;
            error_log("PRODUCT AMOUNT: empty or outside range");
        } else {
            self::$valid_status["product_value"] = $product;
        }
        //Ensure one of the gift wrap options is checked
        $giftWrap = filter_input(INPUT_POST, 'giftWrap');
        if ($giftWrap !== 'yes' && $giftWrap !== 'no') {
            self::$error_status["wrap"] = "Please check your Product amount";
            self::$valid_status["wrap_value"] = null;
            error_log("GIFT WRAP: empty or outside range");
        } else {
            self::$valid_status["wrap_value"] = $giftWrap;

        }


        //Ensure the drop down shipping option was selected
        foreach ($shippingCost as $key => $value) {
            $shippingCostVal[] = $key;
        }
        $shipping = filter_input(INPUT_POST, 'shipping', FILTER_SANITIZE_STRING);
        if (!in_array($shipping, $shippingCostVal)) {
            self::$error_status["shipping"] = "Please choose a shipping option";
            self::$valid_status["shipping_value"] = null;
            error_log("SHIPPING: empty or outside range");
        } else {
            self::$valid_status["shipping_value"] = $shipping;
        }


        //print_r(self::$valid_status);
        //print_r([self::$valid_status,self::$error_status,$flagStatus]);
        return [self::$valid_status,self::$error_status];


    }
}