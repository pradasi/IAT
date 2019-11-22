<?php

	if(isset($_GET['id'])){
		include('Connection.php');
		$id = (int)$_GET['id'];
		$name = mysqli_escape_string($conn,$_POST['name']);
		$email = mysqli_escape_string($conn,$_POST['email']);
		$profile = mysqli_escape_string($conn,$_POST['options']);
		$sem = mysqli_escape_string($conn,$_POST['sem']);
		$subject = mysqli_escape_string($conn,$_POST['subject']);
		
		$sql = "UPDATE staff SET Name = '$name', Email = '$email', Sem = '$sem', Subject = '$subject', Options = '$profile' WHERE Staff_id = $id";
		$res = mysqli_query($conn,$sql);
		if($res){
			header("location:./Allteachers.php");
		} else {
			echo "could not update";
		}
		
	}

?>