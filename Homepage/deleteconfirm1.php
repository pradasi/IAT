<?php session_start();
include "Connection.php";

$QP_code = $_POST['QP_code'];
$confirmation=$_POST['confirmation'];

$q1 = "update question_paper set Confirmed=0 where QP_code=$QP_code ";

$q2 = " update question_paper set VerifiedbyCCI=1 where QP_code=$QP_code ";

$res=mysqli_query($conn,$q2) or die("Can't Execute Query...");

// $row=mysqli_fetch_assoc($res);


		
if ($conn->query($q1) === TRUE) { 
   				
   		header("location:nochanges.php");

   		}
			
else {
  				 
  		 echo "Error: " . $q1 . "<br>" . $conn->error;

 		}






?>