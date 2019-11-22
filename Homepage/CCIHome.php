<?php session_start();
include "Connection.php";

if($_SESSION['status'] == true && $_SESSION['type'] == "CCI" ){

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">
      <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>
    <style type="text/css">
     
     h4{
			font-style:Times New Roman;
			border-radius: 5px;
			border: 2px solid #418BCA;
			padding: 20px; 
			width: 700px;
			height: 80px; 
			transition: all 0.5s;
         
        
         
     } 
        h4:hover{
            background-color: #418BCA ;
            color: white ;
            transform: scale(1.1) ;
        }
        
 
        #topnavi{
            background-color: 	#418BCA ;
        }
        #topnavi a{
            font-family: 'Pacifico', cursive;
            color: white ;
            height: 55px ;
            border-bottom-color: white ;
        }
        
         #topnavi a:hover{
            color: black;
        }
        
        .container-fluid li a:hover{
           background-color: #418BCA ;
           color: white ;
        
        
        }
        
       
       
    </style>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" id="topnavi">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"> Question Paper Management System 
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
           <!--  <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li> -->
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
 <br><br>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Your Details <span class="sr-only">(current)</span></a></li>
            <li><a href="view_download_qp.php">View Question Paper </a></li>
            <li><a href="suggestchanges.php">Suggest Changes</a></li>
            <li><a href="nochanges.php">Final selection for IAT</a></li>
            <li><a href="deleteconfirm.php">Remove Final selection for IAT</a></li>
             <li><a href="selectedqp.php"> Selected Question Paper for IAT</a></li>
             <li><a href="ChangePassword.php">Change password</a></li>
          </ul>
        </div>
        <div  class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 style="font-style:" class="page-header">Hi

              <?php 
                if(isset($_SESSION['status']))
                {
                  echo $_SESSION['unm']; 
                }
                else
                { 
                  echo 'error';
                }
              ?>



          </h1>

<?php

     $q="select * from staff where Name='$_SESSION[unm]'";
     $res=mysqli_query($conn,$q) or die("Can't Execute Query...");

      $row=mysqli_fetch_assoc($res);

      $q2 = "select Subject_code from subjects where SubjectName='$row[Subject]' ";
      $res2=mysqli_query($conn,$q2) or die("Can't Execute Query...");

      $rowx=mysqli_fetch_assoc($res2);
  
              
      echo "
      <div class='tb3'>           
      <p><h4><b>Your Email ID : </b> $row[Email]</h4></p>
      <p><h4><b>Your Role : </b> $row[Options]</h4></p>
      <p><h4><b>Semester : </b>$row[Sem]</h4></p>
      <p><h4><b>Subject : </b>$row[Subject]</h4></p>
      <p><h4><b>Subject Code : </b> $rowx[Subject_code]</h4></p>
      </div>
     ";              
  

      ?>
				</div></div></div>

        

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<?php 

} else {
	header('location:logout.php');
}
?>