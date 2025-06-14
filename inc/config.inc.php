<?php


//Javier Enrique Navarro 300368873

// REQUIRED DEFINITIONS
date_default_timezone_set('America/Vancouver');

// definition for log file
define('LOGFILE','logs/error_log.txt');
  
// setting error logging to be active 
ini_set("log_errors", TRUE); 
 
  
// setting the logging file in php.ini 
ini_set('error_log', LOGFILE); 

define("ITEM_COST",25);
define("WRAP_COST",10);
define("DISCOUNT",0.15);
define("TAX",0.12);

// DECLARE THE ASSOCIATIVE ARRAY SHIPPING COST
$shippingCost = ["regular" => 6,"express" => 15, "priority" => 25]

?>