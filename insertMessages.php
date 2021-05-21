<?php
    include 'includes/class-autoload.inc.php';

    $var1 = $_POST[idSender];
    $var2 = $_POST[idReciever];
    $var3 = $_POST[message];

    $setMessageObj = new messages();
    $setMessageObj->setMessage($var1,$var2,$var3);

    header("Location: messagesPersonal.php");
?>