
<?php session_start();
include "Connection.php";

if($_SESSION['status'] == true && $_SESSION['type'] == "Admin" ){
	
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
		<link href="./fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <!-- Custom styles for this template -->
    <link href="../Homepage/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>

    <style type="text/css">
			
			.btn-twitter {
    		background: #33BBF3;
    		color: #fff;
			}
			.btn-youtube {
    		background: #D6464B;
    		color: #fff;
			}
     
      .tb3{
        font-style:Times New Roman;
        border-radius: 5px;
        border: 2px solid #418BCA;
        padding: 20px; 
				color: #418BCA;
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
      .head{
         color: #418BCA ;
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
            <li><a href="../Homepage/logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="./">Your Details <span class="sr-only">(current)</span></a></li>
            <li><a href="ChangePassword.php">Change password</a></li>
            <li><a href="RegisterStaff.php">Register Staff</a></li>
            <li class="active"><a href="Allteachers.php">View Staff Details</a></li>
            <li><a href="AddSubject.php">Add Subject</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header head"> All Staffs </h1>
          <?php
						$sql = "SELECT * FROM staff";
						$res = mysqli_query($conn,$sql);
						if($res -> num_rows > 0){
							while($row = mysqli_fetch_assoc($res)){?>
							<div class="tb3">
								<div>
								<p>
									<b>Name:</b> <?=$row['Name']?>
								</p>
							</div>
							<div>
								<p><b>Email:</b> <?=$row['Email']?></p>
							</div>
							<div>
								<p><b>Role:</b> <?=$row['Options']?></p>
							</div>
							<div>
								<p>
									<b>Subject:</b> <?=$row['Subject']?>
								</p>
							</div>
							<div>
							<?php $link = "EditStaff.php?id=".$row['Staff_id']; ?>
							<a  class="btn btn-twitter m-b-xs" href=<?=$link?>><i class="fa fa-pencil"></i></a>
							<?php $link = "DeleteStaff.php?id=".$row['Staff_id']; ?>
							<a onclick="return confirm('Delete this Staff?')"  class="btn btn-youtube m-b-xs" href=<?=$link?>><i class="fa fa-trash-o"></i></a>	
							</div>
								
							</div>
							<br><br>
								
							<?php }
						}
					?>
          
				</div>
			</div>
		</div>

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
    <script>
      var check = function() {
      var button = document.getElementById('subbut')
      if (document.getElementById('password').value ==
        document.getElementById('confirm_password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'matching';
        button.disabled = false;
      } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'not matching';
        button.disabled = true;
      }
    }
    </script>
  </body>
</html>
<?php 
} else {
	
	header('location:/');
}


?>