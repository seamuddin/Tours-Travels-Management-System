<?php
try{
	$con=new PDO("mysql:host=localhost;dbname=youtube","root","");
}catch(PDOExection $e){
	echo $e->getMessage();
}
?>