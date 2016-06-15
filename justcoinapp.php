<?php
$usd_contents = 'https://justcoin.com/api/v1/markets';
$usd_json = file_get_contents($usd_contents);
$usd_data = json_decode($usd_json, true);
$count_usd_data = count($usd_data);
//$btc_usd = array();
//$btc_str = array();
for ($i = 0; $i < $count_usd_data; $i++) {
    if ($usd_data[$i]['id'] == 'BTCUSD'):
        $btc_usd = $usd_data[$i]['last'];
    endif;
    if ($usd_data[$i]['id'] == 'BTCSTR'):
        $btc_str = $usd_data[$i]['last'];
    endif;
}
echo'Per btc staller: ' . $btc_str;
echo '</br>';
echo 'Per btc doller: ' . $btc_usd;
echo '</br>';
$one_usd = $btc_str / $btc_usd;
echo 'Per dollar staller: ' . $one_usd;
echo '</br>';
$one_staller = 1 / $one_usd;
echo 'per staller dollar: ' . $one_staller;
echo '</br>';