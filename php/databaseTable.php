<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php';

// 0. Первоначальная таблица
//echo "0. Первоначальная таблица"."<br>";
$query="SELECT * FROM people";
$result = $link->query($query);

$output="";

if (mysqli_num_rows($result) > 0){
	$output.= "<table>";
	$output.= "<tr><td class='firstRow'>id</td><td class='firstRow'>name</td><td class='firstRow'>delete</td></tr>";
	while($temp = mysqli_fetch_assoc($result)){
		$output.= "<tr><td>$temp[id]</td><td>$temp[name]</td><td><a  class='deleteRow' name='$temp[id]'
>Удалить</a></td></tr>"; //onclick='deleteThisId($temp[id])'
	}
	$output.= "</table>";
}
$output.= "<br>";

//echo html_entity_decode(json_encode($output));
echo json_encode($output);
$link->close();
?>
