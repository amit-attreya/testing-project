<?php
error_reporting(0);
if (!function_exists('prw')) {

    function prw($val) {
        echo '<pre>';
        print_r($val);
        echo'</pre>';
    }

}
require "Services/Twilio.php";
// set your AccountSid and AuthToken from www.twilio.com/user/account
$AccountSid = "ACc4e60ef3f130863fff31295e123bc7b8";
$AuthToken = "e1294d8d25957fd8993ad5e3d1ba85bb";
$from = '+14842623093';
require_once 'justcoinapp.php';
// Condition to check stellar id value from user form.
if (isset($_POST['id'])):
    $stellar_id = $_POST['id'];
endif;

include 'stellarapp.php';
//echo 'Value in dollar: '. $dollar;
// Condition to check User form has submitted successfully or not.
if (isset($_POST['submit'])):
    $mobile = $_POST['mobile'];
    $stellar_id = $_POST['id'];
//    echo 'Mobile Number : ' . $mobile;
//    echo '<br/>';
//    echo 'Stellar Id : ' . $stellar_id;
//    echo '</br>';
//    $message = 'Welcome to stellar checker,want info your stellar account in Str message "balance" or in USD Message "price"';
    $message_success = 'Welcome to stellar checker, send message "balance" for Stellar amount & send message "price"
        for Stellar amount in dollar';
    $message_wrong_stellar_id = 'Inavalid Stellar account Id!';
    $to = $mobile;

    try {
        if (isset($stellar_value) && $stellar_value != false):
        $client = new Services_Twilio($AccountSid, $AuthToken);
    $message1 = $client->account->messages->create(array(
        "From" => $from,
        "To" => $to,
        "Body" => $message_success,
            ));
    else:
        $stellar_invalid_id_error = 'Invalid stellar Id!';
        $client = new Services_Twilio($AccountSid, $AuthToken);
    $message1 = $client->account->messages->create(array(
        "From" => $from,
        "To" => $to,
        "Body" => $message_wrong_stellar_id,
            ));        
endif;
// Display a confirmation message on the screen
    echo "Sent message {$message1->status}";
    } catch (Services_Twilio_RestException $e) {
//        print_r($e->getMessage());
        $mobile_error = 'Invalid mobile number!';
    }

endif;
require_once 'twilio-reply-message.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Stellar Balance Checker</title>
    </head>
    <body>
        <div>
            <h1>User message section</h1>
            <h4 style="color: red"><?php if(isset($mobile_error)): echo $mobile_error; endif; ?></h4>
            <h4 style="color: red"><?php if(isset($stellar_invalid_id_error)): echo $stellar_invalid_id_error; endif; ?></h4>
        </div>
        <div>
            <form action="" method="post">
                <div>
                    <div>
                        <span><b>Mobile Number:</b></span>
                        <span><input type="text" name="mobile" value=""/></span>
                    </div>  
                    <div>
                        <span><b>Stellar Id:</b></span>
                        <span><input type="text" name="id" value=""></span>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Submit"/>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
