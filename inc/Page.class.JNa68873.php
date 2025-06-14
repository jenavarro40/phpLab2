<?php


class Page{
    static private $title="PLEASE WRITE SOMETHING HERE";
    static private $studentName="Nobody";
    static private $studentID="XXXXXXX";

    // This static function set the HTML header including the title and display the student name and ID
    static function getHeader(){
        
    }

    // This static function close all the HTML tags at the bottom of the document
    static function getFooter(){
        
    }

    // This static function display the form. It gets the information of the valid input 
    // that can be part of the $validation status array from the Validate class
    // Note: The correct post data will be displayed within the HTML input control object
    static function showForm($valid_status){
        
    }

    // This static function read the validation status property of the Validate class 
    // and display the error messages or submission notification
    static function ShowNotification($valid_status){
        
    }

    

    // This static function display the submitted data. The shipping cost variable is the 
    // shipping cost associative array declared in config.inc.php
    // Make sure to calculate the total cost
    static function showData($shippingCost){
        
    }
}
?>