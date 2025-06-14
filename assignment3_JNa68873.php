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


if(isset($_POST['submit'])){ // you can check with isset() or !empty()
   $status=Validate::validateForm();
    $valid_status = $status[0];
    $error_status = $status[1];
    $flagStatus = $status[2];
    if ($flagStatus) {        
        page::ShowNotification($valid_status);
        page::showForm($valid_status);
    } else {
        page::showData($shippingCost);
    }
}else{
    page::showForm
    (array('name_value'=>null
    ,'email_value'=>null
    ,'phone_value'=>null
    ,'product_value'=>null
    ,'wrap_value'=>null
    ,'shipping_value'=>null));
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