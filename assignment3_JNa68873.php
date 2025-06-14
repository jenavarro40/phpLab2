<?php

// logging the error 

error_log('This errors begining at: '.date("Y-m-d H:i:s"));



// Make sure to call all your include files
require_once('inc/config.inc.php');
require_once('inc/Page.class.JNa68873.php');
require_once('inc/Validate.class.JNa68873.php');
//Show the header

page::getHeader();

// if the form was posted, validate the input and to update the valid status
$valid_status = [];

if(isset($_POST['submit'])){ // you can check with isset() or !empty()
   $valid_status=Validate::validateForm();
    if (!empty($valid_status)) {
        page::showForm($valid_status);
        page::ShowNotification($valid_status);
    } else {
        page::showData($shippingCost);
    }
}else{
    page::showForm($valid_status);
}




// If there was post data and there were errors
// display the error messages and the form
// Note that the correct entry needs to be printed in the form's inputs
    
// If there was post data and there were no errors...
// Display thank you message
// Display the data
    
// Other than that, display the form


// Show the footer
page::getFooter();


?>