<?php
	include('Connection.php');
	session_start();
	if(isset($_POST['submit'])){

		$Email = $_SESSION['email'];
		$cur_pass = mysqli_escape_string($conn,$_POST['cur_pass']);
		$password = md5($cur_pass);
		$new_pass = mysqli_escape_string($conn,$_POST['new_pass']);
		$conf_pass = mysqli_escape_string($conn,$_POST['conf_pass']);
		$path = 'location:'.$_SESSION['page'];

		$sql = "select * from  staff where Email = '$Email' and Password = '$password'";
		$res = mysqli_query($conn,$sql);
		if($res ->num_rows == 1){
			$pass = md5($conf_pass);
			$sql = "UPDATE staff SET Password = '$pass' where Email = '$Email'";
			$res =  mysqli_query($conn,$sql);
			if($res){
				header($path);
			} else {
				echo "password didn't change";
			}
		} else {
			echo "old password Didn't match";
		}
		

	}
?>