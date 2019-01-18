<?php
// Функция mail() - отправляет сообщение получателю to
// Обязательные 3 аргумента: почта кому, тема письма, сообщение

// $to = 'example1678@mail.ru';	
// $subject = 'Форма обратной связи';
// $message = 'Hello world!';
// $headers = 'MIME-Version: 1.0\r\n'; //настройки
// $headers .='Content-type: text/html';
// mail($to, $subject, $message, $headers);
	
	
$to = "example1678@yandex.ru";
$subject = "Форма обратной связи";
$message = "Ваше имя: ".$_POST['name']."<br>"."\r\n"; 
$message .= "Ваш email: ".$_POST['email']."<br>"."\r\n";
$message .= "Ваш телефон: ".$_POST['phone']."<br>"."\r\n";
$message .= "Ваше сообщение: ".$_POST['message']."<br>"."\r\n";
$headers = "MIME-Version: 1.0 \r\n";
$headers .= "Content-type: text/html; charset=utf-8 \r\n";

$headers .= 'From: nedvizhinvest.000webhostapp.com';
mail($to, $subject, $message, $headers);

$str=$to."\r\n".$subject."\r\n".$message;

$file = fopen("../log.txt","a");
if (!file) {
	//echo json_encode('Failed to open file');
} else {	
 	fwrite ($file, $str);
	//echo json_encode('success');
}
fclose ($file);
//echo json_encode('end');

// This is in the PHP file and sends a Javascript alert to the client
//$message = "wrong answer";
//echo "<script type='text/javascript'>alert('$message');</script>";
?>