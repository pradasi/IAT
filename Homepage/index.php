<?php
	session_start();
	if($_SESSION['type'] == "CI"){
		$_SESSION['OTP'] = '';
		$_SESSION['path'] = '';
		header('location:./CIHome.php');
	} else if($_SESSION['type'] == "CCI") {
		$_SESSION['OTP'] = '';
		$_SESSION['path'] = '';
		header('location:./CCIHome.php');
	} else if($_SESSION['type'] == "TC"){
		$_SESSION['OTP'] = '';
		$_SESSION['path'] = '';
		header('location:./TCHome.php');
	} else{
		$_SESSION['OTP'] = '';
		$_SESSION['path'] = '';
		header('location:../');
	} 
		
?>