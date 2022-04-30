<?php
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$message = $_POST['message'];

$mailheader = "From:".$name. $surname."<".$email.">\r\n";

$recipient = "fillo.devecchi@gmail.com";

mail($recipient, $message, $mailheader) or die("Error!");

header('shop.php');
?>

