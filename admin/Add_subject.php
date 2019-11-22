<?php
	include "Connection.php";
	if(isset($_POST['submit'])){
		$name = mysqli_escape_string($conn,$_POST['name']);
		$code = mysqli_escape_string($conn,$_POST['code']);
		$sem = (int)mysqli_escape_string($conn,$_POST['sem']);
		$sql = "INSERT INTO subjects values('$code','$name',$sem);";
		$res = mysqli_query($conn,$sql);
		if($res){
			header("location:./");
		} else {
			die("Could not add Subject");
		}
	}
?>
