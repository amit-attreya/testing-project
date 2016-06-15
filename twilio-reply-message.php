<?php
// Condition to check message response is "balance" from twilio client side response.
if (isset($_REQUEST['Body'])):
   $body = $_REQUEST['Body'];
  $body_message_balance = stripos($body, 'balance');
  $body_message_price = stripos($body, 'price');
if($body_message_balance !== false):
    $incoming_from_balance = $_REQUEST['From'];
    $message_balance = 'Your Stellar Account balance: ' . $stellar_value . 'STR';
    $client = new Services_Twilio($AccountSid, $AuthToken);
    $message_balance_query = $client->account->messages->create(array(
        "From" => $from,
        "To" => '+19094181900',
        "Body" => $message_balance,
            ));
    if ($message_balance_query):
        echo 'message created successfull';
        echo'</br>';
    endif;
// Display a confirmation message on the screen
    echo "Sent message {$message_balance_query->status}";
//    endif;
    // Applying message create query if request body is price.
   elseif($body_message_price !== false):
    $incoming_from_price = $_REQUEST['From'];
    $message_price = 'Your Stellar Account balance: ' . $dollar . 'USD';
    $client = new Services_Twilio($AccountSid, $AuthToken);
    $message_price_query = $client->account->messages->create(array(
        "From" => $from,
        "To" => '+19094181900',
        "Body" => $message_price,
            ));
    if ($message_price_query):
        echo 'message created successfull';
        echo'</br>';
    endif;
// Display a confirmation message on the screen
    echo "Sent message {$message_price_query->status}";
    else:
        $incoming_from_invalid = $_REQUEST['From'];
        $message_error = 'Invalid text';
    $client = new Services_Twilio($AccountSid, $AuthToken);
    $message_price_query = $client->account->messages->create(array(
        "From" => $from,
        "To" => '+19094181900',
        "Body" => $message_error,
            ));
    endif;
endif;