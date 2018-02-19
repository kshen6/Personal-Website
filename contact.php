<?php
/*
 * Configure elements of data
 */

//email address for the "from" field
$from = 'Demo contact form <kshen6@stanford.edu>';

//email address to receive the email
$sendTo = 'Demo contact form <kshen6@stanford.edu>';

//email subject
$subject = 'New message from personal site contact form';

//form field names and their translations.
//array variable name => text to appear in email
$fields = array('name' => 'Name', 'email' => 'Email', 'message' => 'Message'); 

//display this message if all is well
$okMessage = 'Contact form successfully submitted. Thanks for contacting, I will get back to you soon!';

//display if error
$errorMessage = 'There was an error while submitting the form. Sorry! Please try again later.';


/*
 * Sending!
 */

//if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);

//try catch loop
try
{
    //if the field is empty, throw exception
    if(count($_POST) == 0) throw new \Exception('Form is empty');

    $emailText = "You have a new message from your contact form\n=============================\n";

    foreach ($_POST as $key => $value) {
        // If the field exists in the $fields array, include it in the email 
        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    //headers
    $headers = array('Content-Type: text/plain; charset="UTF-8";',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from,
    );

    //send email
    mail($sendTo, $subject, $emailText, implode("\n", $headers));

    $responseArray = array('type' => 'success', 'message' => $okMessage);

}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

//return JSON if requested by AJAX
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}

//or else, just return the message
else {
    echo $responseArray['message'];
}