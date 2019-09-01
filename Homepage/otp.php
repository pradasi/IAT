<?php 
	session_start();
	if(isset($_SESSION['status'])){
		echo $_SESSION['unm']; 
	}
	else{ 
	echo "<script>alert('Please login')</script>";
	}
//	$op = '';
//	
//	if(isset($_POST['otp'])){
//		putenv('PATH='.getenv('PATH').'C:\Program Files\Java\jdk-12.0.2\bin'); 
//		$op = `java CryptProj 2>&1`;
//	}
//	if($op){
//		
//		$to      = 'prak16cs@cmrit.ac.in';
//		$subject = 'OTP';
//		$message = $op;
//		$headers = 'From: webmaster@example.com' . "\r\n" .
//    'Reply-To: webmaster@example.com' . "\r\n" .
//    'X-Mailer: PHP/' . phpversion();
//		
//		if(mail($to, $subject, $message, $headers)){
//			
//		} 
//	}

?>
