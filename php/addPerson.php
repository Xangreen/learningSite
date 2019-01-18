<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

include 'config.php';

//1. Добавить в таблицу
//name
//age
//salary

//echo "1. Добавить имя в базу данных"."<br>";
$name = $link->real_escape_string($_POST['name']);
$age = $link->real_escape_string($_POST['age']);
$salary = $link->real_escape_string($_POST['salary']);
//echo "name: $name, age: $age, salary: $salary <br>";
//echo "name: ".gettype($name).", age:  ".gettype($age).", salary:  ".gettype($salary)." <br>";
//echo "preg_match: name: ".preg_match('/^\d+$/',$name).", age:  ".preg_match('/^\d+$/',$age).", salary:  ".preg_match('/^\d+$/',$salary)." <br>";
//echo "false. isset(name): ".isset($name).", is_int(age): ".is_int($age)." ,is_int(salary): ".is_int($salary)." <br>";

if (isset($name) and preg_match('/^\d+$/',$age) and preg_match('/^\d+$/',$salary)) {
	//echo "true";
	$query="
	INSERT INTO people (name,age,salary)
	VALUES ('$name',$age,$salary)";
	if(!$link->query($query)) {
		 die(header("HTTP/1.0 404 Not Found"));
	}
} else {
	 die(header("HTTP/1.0 404 Not Found"));
}


$link->close();
?>