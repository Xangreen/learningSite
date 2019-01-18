<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script type='text/javascript' src='js/jquery-3.3.1.js'></script>
	<style> 
		table {
			border-collapse: collapse;
			border: 2px solid;
			font-size:20px;
		}			
		td { 
			border: 1px solid;
			margin: 0px;
			text-align: center;
			min-width:40px;	
			padding: 7px 0px;
			background-color: rgb(215,229,194);
		}
		.firstRow {
			border-width: 1px 1px 2px;
			background-color: rgb(106,172,74);
		}
		.firstColumn {
			border-width: 1px 2px;
			background-color: rgb(106,172,74);
		}
		.firstCell {
			border-width: 2px;
			background-color: rgb(106,172,74);
		}
	</style>
</head>
<body>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'php/config.php';
//mysqli_query ($link, "SET NAMES 'utf8'");
if (isset($_GET['del'])){
	$id = $link->real_escape_string($_GET['del']);	
	$query="
	DELETE FROM people
	WHERE id='$id'";
	$link->query($query);	
}
if(!empty($_GET['del'])){ // проверяется не является ли переменная пустой
	
}


// 0. Первоначальная таблица
echo "0. Первоначальная таблица"."<br>";
$query="SELECT * FROM people";
$result = $link->query($query);

if (mysqli_num_rows($result) > 0){
	echo "<table>";
	echo "<tr><td class='firstRow'>id</td><td class='firstRow'>name</td><td class='firstRow'>delete</td></tr>";
	while($temp = mysqli_fetch_assoc($result)){
		echo "<tr><td>$temp[id]</td><td>$temp[name]</td><td><a href='?del=$temp[id]'
>Удалить</a></td></tr>";
	}
	echo "</table>";
}
echo "<br>";

$link->close();


?>

<div id="dataTable"></div>

<input type="text" id="nameToDelete"></input>
<input type="button" value="submit" id="send"></input>
<div id="nameToDeleteShow"> </div>
<div style="clear:both;">


<div class="container-fluid" id="registration-wrapper">
	<form action="php/addPerson.php" method="post" id="addPersonForm">
	  <div class="form-group">
		<label for="nameToAdd">Имя</label>
		<input type="text" class="form-control" id="nameToAdd" placeholder="Иванов Иван Иванович" name="name">
	  </div>		 
	  <div class="form-group">
		<label for="age">Возраст</label>
		<input type="text" class="form-control" id="age" placeholder="40" name="age">
	  </div>
	  <div class="form-group">
		<label for="salary">Зарплата</label>
		<textarea class="form-control" id="salary" rows="3" name="salary"
		placeholder="15" ></textarea>
	  </div>
	  <button type="submit" id="feedbackSubmit" class="btn btn-primary">Отправить</button>
	</form>
</div>
<div style="clear:both;">

<script type='text/javascript'>

	
	/*function tableRefresh(){
		console.log("start");
		$.ajax({
			url: "php/databaseTable.php",
			//contentType: text/plain 
			//context: document.body
		}).done(function(result){
			console.log("success");
			//console.log(result);
			$("#dataTable").html(result);
		}).fail( function() {
			console.log("fail");
		});
	}
	tableRefresh();*/
	
	function deleteThisId(id) {
		$.ajax({
			url:"php/deletePersonById.php",
			method:"POST",
			data: { id: id }					
			}).done( function(){			
				tableRefresh();
				console.log('операция выполнена успешно');
			}).fail( function(){
				console.log('ошибка при выполнении');			
		});
	}
	
	$("#send").on("click", function(event){
		event.preventDefault(); 		//$("#nameToDeleteShow").append($("#nameToDelete").val(),"<br>");
		$("#nameToDeleteShow").text($("#nameToDelete").val());
		console.log("#send enter");
		$.ajax({
			url:"php/deletePersonByName.php",
			method:"POST",
			data: { nameTD: $("#nameToDelete").val() }				
			}).done( function(){
				tableRefresh();
				console.log('операция выполнена успешно');
			}).fail( function(){
				console.log('ошибка при выполнении');			
			});
	});
	

	$(document).ready ( function(){
		console.log("initalised");		
	
		$('#dataTable').on('click', ".deleteRow", function(){	
			$.ajax({
				url:"php/deletePersonById.php",
				method:"POST",
				data: { id: $(this).attr('name') }					
				}).done( function(){
				//	location.reload(true);
					tableRefresh();
					console.log('операция выполнена успешно');
				}).fail( function(){
					console.log('ошибка при выполнении');			
				});
		});
		$("#addPersonForm").on("submit", function(event){	
			event.preventDefault(); 
			$.ajax({
				url:"php/addPerson.php",
				method:"POST",
				data: $("#addPersonForm").serialize()				
				}).done( function(){
				//	location.reload(true);
					tableRefresh();
					console.log('операция выполнена успешно');
				}).fail( function(){
					console.log('ошибка при выполнении');			
				});
		});
	});
</script>


<?php
require "footer.php";
?>