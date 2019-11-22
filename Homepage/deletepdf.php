<?php
session_start();
if($_SESSION['status'] == true){
	$name= $_GET['path'];
	$code = (int)$_GET['code'];
	$realpath = realpath($name);

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "IAT";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
	} else {
		$sql = "DELETE FROM question_paper WHERE QP_code = $code";
		$result = mysqli_query($conn,$sql);
		if($result){
			if(!unlink($realpath)){
				echo "couldn't from folder";
				if($_SESSION['type'] == 'CI')
					header("refresh:5;url=CIHome.php");
				else if($_SESSION['type'] == 'CCI')
					header("refresh:5;url=CCIHome.php");
			} else {
				echo "Deleted successfully";
				if($_SESSION['type'] == 'CI')
					header("refresh:5;url=CIHome.php");
				else if($_SESSION['type'] == 'CCI')
					header("refresh:5;url=CCIHome.php");
				
			}
			
		} else {
			die("couldn't delete");
			if($_SESSION['type'] == 'CI')
					header("refresh:5;url=CIHome.php");
				else if($_SESSION['type'] == 'CCI')
					header("refresh:5;url=CCIHome.php");	
		}
	}
	
} else {
	header("location:./logout.php");
}
?>