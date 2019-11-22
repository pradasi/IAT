
<?php session_start();
include "Connection.php"; 

if($_SESSION['status'] == true && $_SESSION['type'] == "CI" ){
	

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
     .theme-showcase > p > .btn {
  margin: 4px 0;
  color: white;
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

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li ><a href="CIHome.php">Your Details <span class="sr-only">(current)</span></a></li>
            <li><a href="AddQuestionPaper.php">Add Question Paper</a></li>
            <li class="active" ><a href="#">Uploaded question papers</a></li>
            <li><a href="ChangesSentByCCI.php">Changes Suggested by CCI</a></li>
          </ul>
        </div>
       
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Hi


                  <?php 
                if(isset($_SESSION['status']))
                {
                  echo $_SESSION['unm']; 
                }
                else
                { 
                  echo ' error';
                }
              ?>


          </h1>

          <?php

         

          $q="select * from staff where Email='$_SESSION[email]'";
          $res=mysqli_query($conn,$q) or die("Can't Execute Query...");

          $row=mysqli_fetch_assoc($res);

          $CI_Id = $row['Staff_id'];

          $q2 = "Select * from question_paper where CI_Id='$CI_Id'";

           $res2=mysqli_query($conn,$q2) or die("Can't Execute Query...");
           
           

 
//<embed src='http:../".$row2['QP']."' type='application/pdf' width='100%' height='1500px;'>
//<object data='$path' type='application/pdf' style='pointer-events: none;'  width='100%' height='1500px;' /></object>
//."#toolbar=0&navpanes=0&scrollbar=0";

          while ($row2=mysqli_fetch_assoc($res2) ) {
          $q3 = "select * from subjects where Subject_code='$row2[Subject_code]'";
           $res3=mysqli_query($conn,$q3) or die("Can't Execute Query...");

						//$path = "http:../".$row2['QP'];
            $row3=mysqli_fetch_assoc($res3) ;
						
            
               echo"
							 	<br>
								<br>
								<h4>
									Subject : $row3[SubjectName]
									<br>
									<br>
									Subject Code : $row2[Subject_code]
									<br>
									<br>
									Question Paper Code : $row2[QP_code]
									<br>
									<br>	
									<a href='viewpdf.php?path=../".$row2['QP']."#toolbar=0&navpanes=0&scrollbar=0"."' target='_blank' class='btn btn-primary' >view</a>";
						if($row2['Confirmed'] != 1){
								echo"
									<a href='deletepdf.php?path=../".$row2['QP']."&code=".$row2['QP_code']."' class='btn btn-primary'>delete</a>";
						}
               	echo"
										<br>
							 			</h4>";

           }

          ?>
          <!--				This can be used to download replace it for embed tag-->
<!--	<a href='download.php?path= ../".$row2['QP']."' target='_blank' class='btn btn-primary' >Download</a>		-->
				</div>

			</div>
		</div>






         <!--  <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div> -->

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