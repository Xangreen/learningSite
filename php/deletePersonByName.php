<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php';

// 1. Удалить из таблицы по полученном имени
//echo "1. Удалить из таблицы по полученном имени"."<br>";
$name = $link->real_escape_string($_POST['nameTD']);
$query="
DELETE FROM people
WHERE name='$name'";
$link->query($query);

$link->close();
?>