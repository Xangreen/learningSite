<?php

$file = fopen("../log.txt","a");
if (!file) {
	echo "Файл открыть не удалось";
} else {	
 	fwrite ($file, $_POST['name']."\r\n");
	fwrite ($file, $_POST['email']."\r\n");
	fwrite ($file, $_POST['phone']."\r\n");
	fwrite ($file, $_POST['message']."\r\n"); 
}
fclose ($file);
			
?>