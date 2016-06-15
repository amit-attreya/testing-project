<?php

require_once 'jsonRPCClient.php';
 
  $bitcoin = new jsonRPCClient('https://live.stellar.org:9002');
 
  echo "<pre>\n";
  print_r($bitcoin->getinfo()); echo "\n";
  echo "Received: ".$bitcoin->getreceivedbylabel("Your Address")."\n";
  echo "</pre>";

?>
