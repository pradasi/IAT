<?php session_start();
include "Connection.php"; 

$QP_code = $_POST['QP_code'];

$Changes_needed=mysqli_escape_string($conn,$_POST['changes']);

$q2 = " update question_paper set VerifiedbyCCI=0 where QP_code=$QP_code ";

$q1 = "INSERT INTO changes(Changes_needed,QP_code)Values('$Changes_needed',$QP_code)";

$res=mysqli_query($conn,$q2) or die("Can't Execute Query...");


		
if ($conn->query($q1) === TRUE) { 
   				
   		header("location:CCIHome.php");

   		}
			
else {
  				 
  		 echo "Error: " . $q1 . "<br>" . $conn->error;

 		}






?>