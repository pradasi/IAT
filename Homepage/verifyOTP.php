<?php
	session_start();
	if(isset($_SESSION['status'])){	
		//for generating otp
		if(isset($_POST['verify'])){
			$serop = (int)$_SESSION['OTP'];
			$cliotp = (int) $_POST['verotp'];
			if($serop == $cliotp){
				$path = $_SESSION['path'];
				echo "Download link expires in 10 seconds<br><br>";
				echo "<a href=$path Download>CLICK TO DOWNLOAD</a>";
				$_SESSION['OTP'] = '';
				$_SESSION['path'] = '';
				header("refresh:10;url=view_download_qp.php");
			} else {
				echo "OTP not matched!!";
				header("refresh:5;url=verifyOTP.html");
				die();
			}
		} 
	}else {
		echo "<script>alert('Please Login!!')</script>";
		header("Location: ../Login/index.html");
	}
?>


		