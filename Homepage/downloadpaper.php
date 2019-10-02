<?php session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "IAT";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if($_SESSION['status'] == true && $_SESSION['type'] == "TC" ){
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
     
   #mydiv{
      font-style:Times New Roman;
          border-radius: 5px;
        border: 2px solid #1263a7;
       padding: 10px ;
        width: 75% ;
      transition: all 0.3s;
        background-color: #418BCA ;
            color: white ;
       
         
        
         
     } 
        #mydiv:hover{
            transform: scale(1.01);
        }
        #mygenbtn{
           
             color: #418BCA ;
              background-color: white ;
              
        }
        
        #mygenbtn:hover{
           transform: scale(1.02) ;
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

            <li><a href="http://localhost/IAT2/Homepage/logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="TCHome.php">Your Details <span class="sr-only">(current)</span></a></li>
            <li class="active" ><a href="#">Download Question Paper</a></li>
            
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
           
          // $q="select * from Staff where Name='$_SESSION[unm]'";
          // $res=mysqli_query($conn,$q) or die("Can't Execute Query...");

          // $row=mysqli_fetch_assoc($res);

          // $CI_Id = $row['Staff_id'];

          $q2 = "Select * from Question_paper where Confirmed =1";

          $res2=mysqli_query($conn,$q2) or die("Can't Execute Query...");


          while ($row2=mysqli_fetch_assoc($res2) ) {
          


          $q3 = "select * from Subjects where Subject_code='$row2[Subject_code]'";

          $res3=mysqli_query($conn,$q3) or die("Can't Execute Query...");

           $row3=mysqli_fetch_assoc($res3);



              // echo" <br><br><h4>Subject : $row3[SubjectName]<br><br>Subject Code : $row2[Subject_code]<br><br>";
							 echo" <br><br><div id='mydiv'><b>Subject : </b>$row3[SubjectName]<br><br><b>Subject Code : </b>$row2[Subject_code]<br><br>

               <form method='post' action='GenerateOTP.php'>
						 	<button type='submit' class='btn btn-lg btn-info' id='mygenbtn' value='http:../$row2[QP]' name='otp'>  Generate OTP</button><br></div>
                            </form>";

           }

      

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