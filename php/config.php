<?php
$hostName = "localhost";
$userName = "id7288326_example1678";
$password = "///";
$databaseName = "id7288326_nedvizhinvest";
$link= new mysqli($hostName,$userName,$password,$databaseName);
if ($link->connect_error) {
	die ("Не удалось подключиться к MySQL: ".$link->connect_error);	
}
$link->query ("SET NAMES 'utf8'");
?>