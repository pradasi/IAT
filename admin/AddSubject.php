
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

    <!-- Custom styles for this template -->
    <link href="../Homepage/dashboard.css" rel="stylesheet">

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
            <li  ><a href="RegisterStaff.php">Register Staff</a></li>
            <li><a href="Allteachers.php">View Staff Details</a></li>
            <li class="active"><a href="AddSubject.php">Add Subject</a></li>

          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header head"> Register

          </h1>
          <form class="contact-form php-mail-form" role="form" method="POST" action="Add_subject.php">


            <div class="form-group">
              <label for="contact-name" style="color: #418BCA ;">Subject Name</label>
              <input type="name" name="name" class="form-control" id="contact-name" placeholder="Subject Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required >
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <label for="contact-email" style="color: #418BCA ;" >Subject Code</label>
              <input type="text" name="code" class="form-control"  placeholder="Subject Code"  required>
              <div class="validate"></div>
            </div>

       

         

      



      <div class="form-group">

       <label class=" control-label" style="color: #418BCA ;" >Choose Semester</label>
        <div class="selectContainer">
        <div class="input-group">
         <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
         <select name="sem" class="form-control selectpicker" required>
                <option value="">Select one</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
        </select>
      </div>
      </div>
      </div>

       
      
        

        <div class="form-group">
        <div ><br><br><center>
        <button id="subbut" name="submit" type="submit" class="btn btn-primary"> SUBMIT <span class="glyphicon glyphicon-send"></span></button></center>
        </div>
        </div>


    </form>
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
  
  </body>
</html>
<?php 
} else {
	
	header('location:/');
}


?>