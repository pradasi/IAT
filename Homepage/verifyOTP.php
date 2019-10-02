<?php
	session_start();
if($_SESSION['generated']){
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
  <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script>
     var timeLeft = 60;
    function countdown() {
         var elem = document.getElementById('someId');
         var timerId = setInterval(countdown, 1000);

          if (timeLeft != 0) {
                 elem.innerHTML = 'Time Left is  '+timeLeft + ' seconds <br>';
            timeLeft--;
            clearTimeout(timerId);

          }
        else {
                  clearTimeout(timerId);
        }
    }
      </script>
    <style type="text/css">
     
     h4{
      font-style:Times New Roman;
          border-radius: 25px;
    border: 2px solid #73AD21;
    padding: 20px; 
    width: 700px;
    height: 150px; 
     }
			
			.hide{
				display: none;
			}
        
        #dlink{
            margin-top: 200px ;
            margin-left:200px ;
            
            border: 1px solid blue ;
            padding: 5px ;
        }
        
        #errorOTP{
            margin-left:200px ;
            background-color: red ;
            border: 1px solid black ;
            
        }
        
          #otpBlock{
      font-style:Times New Roman;
          border-radius: 5px;
        border: 2px solid #418BCA;
       padding: 10px ;
        width: 75% ;
      transition: all 0.3s;
       
            color: black;
       
         
        
         
     } 
        #otpBlock:hover{
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
        
        
        }

    </style>

   
   <script>
     
       $(window).on('load', function () {
            $('#myModal').modal('show');
 });

    </script>
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
          <a class="navbar-brand" href="#">Question Paper Management System
              


          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
           <!--  <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li> -->
            <li><a href="http://localhost/IAT2/Homepage/logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li ><a href="#">Your Details <span class="sr-only">(current)</span></a></li>
            <?php if($_SESSION['status'] == true && $_SESSION['type'] == "CCI"){?>
            <li class="active"><a href="view_download_qp.php">View/Download Question Paper</a></li>
            <li><a href="suggestchanges.php">Suggest Changes</a></li>
             <li><a href="nochanges.php">Final selection for IAT</a></li>
              <li><a href="deleteconfirm.php">Remove Final selection for IAT</a></li>
              <li><a href="selectedqp.php"> Selected Question Paper for IAT</a></li>
              <?php } else{ ?>
              <li><a href="downloadpaper.php">Download Question Paper</a></li>
              <?php }?>
          </ul>
        </div>
        <div  class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          

 <form method="post" style="margin-left: 0px; margin-top: 10%" action="verifyOTP2.php">
  <div class="form-group" id="otpBlock" style="width:70% ;" >
    <p><b>Validate OTP (One Time Password)</b> </p>
    <p>An OTP( One Time Password ) has been sent to your Email ID.<br> Please Enter the OTP to Verify in the given text below </p>
     <p>OTP expires in 60 seconds</p>
     <?php echo "<script>countdown()</script>";
						echo "<div id='someId'></div>";
						if($_SESSION['status'] == true && $_SESSION['type'] == "CCI"){
					  echo "<script>setTimeout(function() {
										window.location = 'view_download_qp.php'
												}, 60000);</script>" ;
						} else  if($_SESSION['status'] == true && $_SESSION['type'] == "TC") {
														 echo "<script>setTimeout(function() {
                                    window.location = 'downloadpaper.php'
                                        }, 30000);</script>" ;
													 }
														 
			?>
      
<!--    <label for="exampleInputEmail1">Enter OTP</label>-->
    <input type="number" class="form-control col-sm-4" placeholder="OTP" name="verotp">
 
            <br> <br>
        <button type="submit" class="btn btn-primary" name="verify">Submit</button>
       </div>
</form>


				</div>
			</div>
		</div>
		
		
		
    


 

    <!-- Bootstrap core JavaScript
   / ================================================== -->
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
<?php } else {
	
	if($_SESSION['type'] == "CCI"){
	header('location:view_download_qp.php');
	} else if($_SESSION['type'] == "TC"){
		header('location:downloadpaper.php');	
	} else {
		header('location:logout.php');
	}
}?>