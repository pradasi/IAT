<?php 

session_start();
include "Connection.php"; 


	$msg=array();
    if(isset($_POST))
	{

    if(empty($_FILES['qp']['name']))
		$msg[] = "Please provide a document file";
	
		if($_FILES['qp']['error']>0)
		$msg[] = "Error uploading document file";
		
		
		if(!((substr($_FILES['qp']['name'],-4))==".pdf" ||(substr($_FILES['qp']['name'],-4))==".doc"||(substr($_FILES['qp']['name'],-5))==".docx"))
			$msg[] = "wrong document file  type";
			
		if(file_exists("../upload_qp/".$_FILES['qp']['name']))
			$msg[] = "Document File already uploaded. Please do not updated with same name";
		
		if(!empty($msg))
		{
			echo '<b>Error:-</b><br>';
			
			foreach($msg as $k)
			{
				echo '<li>'.$k;
			}
		}
		else
		{
			move_uploaded_file($_FILES['qp']['tmp_name'],"../upload_qp/".$_FILES['qp']['name']);

			$QP ="upload_qp/".$_FILES['qp']['name'];

			 $q="select * from staff where Name='$_SESSION[unm]'";
    		 $res=mysqli_query($conn,$q) or die("Can't Execute Query...");

      		 $row=mysqli_fetch_assoc($res);

     		 $q2 = "select * from subjects where SubjectName='$row[Subject]' ";
      		$res2=mysqli_query($conn,$q2) or die("Can't Execute Query...");

     		 $rowx=mysqli_fetch_assoc($res2);
             
             $Subject_code = $rowx['Subject_code'];
             $Sem = $row['Sem'];
             $CI_Id = $row['Staff_id'];

             $q3="INSERT into question_paper(Subject_code,Sem,QP,CI_Id)values('$Subject_code',$Sem,'$QP',$CI_Id)";

	
		
		
			if ($conn->query($q3) === TRUE) { 
   				
   				 header("location:AddQuestionPaper.php");

   				}
			else {
  				  echo "Error: " . $q3 . "<br>" . $conn->error;
				}
				
		
        }
   }


?>