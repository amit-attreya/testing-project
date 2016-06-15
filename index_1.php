<?php

if (!function_exists('prw')) {

    function prw($val) {
        echo '<pre>';
        print_r($val);
        echo'</pre>';
    }

}

$url = 'https://live.stellar.org:9002';
$request = '
{
  "method": "account_info",
  "params": [
    {
      "account": "gwXsohat743pwF5rwZ2MYyVQkFsMzbCS4i"
    }
  ]
}';

//prw($request);
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
//$response = json_decode(curl_exec($ch), true);
curl_setopt($ch, CURLOPT_URL, $url);
// Execute
$result = curl_exec($ch);
// Closing
curl_close($ch);

// decoding JSON data
$result_data_stellar_balance_array = json_decode($result, true);
//Initialising and assigning a User Stellar value in STR.
$stellar_value_default = $result_data_stellar_balance_array['result']['account_data']['Balance'];
$stellar_value= $stellar_value_default/1000000;
echo 'Stellar value: '.$stellar_value;
?>