<?php
 // now greet the sender
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    
?>
<Response>
    <Message><?php echo $_REQUEST['From'] ?>, thanks for the message!</Message>
</Response>