<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php';

// 1. Удалить из таблицы по полученном имени
echo "1. Выбрать все записи с id, кроме промежутка 12-15"."<br>";
$query="
SElECT id, name
FROM people
";
$result=$link->query($query);

echo json_encode($result);

$link->close();
?>