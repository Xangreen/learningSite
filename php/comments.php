<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php';

//name,email,phone,message
$name = $link->real_escape_string($_POST['name']);
$email = $link->real_escape_string($_POST['email']);
$phone = $link->real_escape_string($_POST['phone']);
$message = $link->real_escape_string($_POST['message']);

if (preg_match('/[a-zA-Zа-яА-Я]+$/',$name) and isset($email) and !empty($email) and isset($phone) and !empty($phone) and isset($message) and !empty($message)) {
	$query="INSERT INTO comments (name,email,phone,comment) 
	VALUES ('$name','$email','$phone','$message')";
	If(!$link->query($query)) {	
		die ();
	}
} else {
	die();
}


$link->close();
?>