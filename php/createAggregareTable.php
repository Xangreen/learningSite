<?php
	echo "
	<head>	
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
	</head>"
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php';

// 1. Удалить из таблицы по полученном имени
echo "1. Обьединение таблиц"."<br>";
$query="
TRUNCATE TABLE peopleAgr";
$link->query($query);


// Создание обьединеной таблицы
/*$query="
SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = '+00:00';
CREATE TABLE `peopleAgr` (
  `id` int(11) NOT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE `peopleAgr`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `peopleAgr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;
";
$link->query($query); */
$query="
INSERT peopleAgr (name,city,age,salary)
SELECT name,city,age,salary
FROM people
UNION ALL
SELECT name,city,age,salary
FROM people2
";
$link->query($query);

$query="SELECT * FROM peopleAgr";
$result = $link->query($query);

if (mysqli_num_rows($result) > 0){
	echo "<table>";
	echo "<tr><td class='firstRow'>id</td><td class='firstRow'>name</td><td class='firstRow'>age</td><td class='firstRow'>salary</td></tr>";
	while($temp = mysqli_fetch_assoc($result)){
		echo "<tr><td>$temp[id]</td><td>$temp[name]</td><td>$temp[age]</td><td>$temp[salary]</td></tr>";
	}
	echo "</table>";
}
echo "<br>";

$link->close();
?>