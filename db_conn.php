<?php 

$sname = "eu-cdbr-west-01.cleardb.net";
$uname = "b4b73a0b9810cd";
$password = "eb76c692";

$db_name = "heroku_88a5718b3026eb4"; 

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Соединение прервано!";
}