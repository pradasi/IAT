<?php 
	session_start();
	$_SESSION['path']= '';
	$op = '' ;
  
  
    
	if(isset($_SESSION['status'])){	
		//for generating otp
		if(isset($_POST["otp"])){
			putenv('PATH='.getenv('PATH').'C:\Program Files\Java\jdk-12.0.2\bin'); 
			$op = `java CryptProj 2>&1`;
            
			if($op){

				//$to =$_SESSION['email'];
        $to="prak16cs@cmrit.ac.in" ;
				$subject = 'OTP';
				$message = $op;
				$headers = 'From: webmaster@example.com' . "\r\n" .
				'Reply-To: webmaster@example.com' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

				if(mail($to, $subject, $message, $headers)){
					$_SESSION['path'] = $_POST['otp'];
					$_SESSION['OTP'] = $op; 
					$_SESSION['generated'] = true;
               
					header("Location: verifyOTP.php");
             
				} else {
					echo "Error in Sending mail!!";
					header("refresh:5;url=view_download_qp.php");
				} 
			}

		}
	} else {
		echo "<script>alert('Please Login!!')</script>";
		header("Location: ../index.html");
	}
	

?>
