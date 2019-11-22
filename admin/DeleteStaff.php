<?php

if(isset($_GET['id'])){
	$id = (int)$_GET['id'];
	include("Connection.php");
	$sql = "DELETE FROM staff WHERE Staff_id = $id";
	$res = mysqli_query($conn,$sql);
	if($res){
		header("location:Allteachers.php");
	} else {
		echo "Could not delete";
	}
}
?>