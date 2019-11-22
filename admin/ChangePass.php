<?php
	include('Connection.php');
	session_start();
	if(isset($_POST['submit'])){

		$Email = $_SESSION['email'];
		$cur_pass = mysqli_escape_string($conn,$_POST['cur_pass']);
		$password = md5($cur_pass);
		echo $password;
		$new_pass = mysqli_escape_string($conn,$_POST['new_pass']);
		$conf_pass = mysqli_escape_string($conn,$_POST['conf_pass']);
		

		$sql = "select * from  staff where Email = '$Email' and Password = '$password'";
		$res = mysqli_query($conn,$sql);
		if($res ->num_rows == 1){
			$pass = md5($conf_pass);
			$sql = "UPDATE Staff SET Password = '$pass' where Email = '$Email'";
			$res =  mysqli_query($conn,$sql);
			if($res){
				header('location:index.php');
			} else {
				echo "password didn't change";
			}
		} else {
			echo "old password Didn't match";
		}
		

	}
?>