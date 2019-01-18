<?php
echo $_POST[0];
foreach($_POST as &$str) {
	echo $str."<br>";
}		
?>