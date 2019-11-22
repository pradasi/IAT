<?php
session_start();
if($_SESSION['status'] == true){
	$name= $_GET['path'];

	header("Content-type: application/pdf");   
	header("Content-Length: " . filesize($name)); 

	readfile($name);
} else {
	header("location:./logout.php");
}
?>