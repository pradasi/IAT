<?php session_start();
include "Connection.php";

$QP_code = $_POST['QP_code'];
$confirmation=$_POST['confirmation'];

$q1 = "update question_paper set Confirmed ='$confirmation' where QP_code = $QP_code ";

$q2 = " update question_paper set VerifiedbyCCI=1 where QP_code=$QP_code ";

$res1 = mysqli_query($conn,$q1) or die("Can't Execute Query...");

$row = mysqli_fetch_assoc($res1);

		
if ($conn->query($q2) === TRUE) { 
   				
   		header("location:CCIHome.php");

   		}
			
else {
  				 
  		 echo "Error: " . $q1 . "<br>" . $conn->error;

 		}




?>