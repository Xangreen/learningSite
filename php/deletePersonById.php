<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php';

// 1. Удалить из таблицы по полученном имени
echo "1. Удалить из таблицы по полученном имени"."<br>";
$id = $link->real_escape_string($_POST['id']);
$query="
DELETE FROM people
WHERE id='$id'";
$link->query($query);

$link->close();
?>