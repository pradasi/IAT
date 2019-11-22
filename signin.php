<?php session_start();
include "./Homepage/Connection.php"; 


if( isset($_POST['Email']) and isset($_POST['Password']) ) {
		
		$Email=$_POST['Email'];
		$Password=md5($_POST['Password']);
		$_SESSION['email'] = $Email;
 
		$ret=mysqli_query( $conn, "select * from  staff where Email='$Email' and Password='$Password'") or die("Could not execute query: " .mysqli_error($conn));
		$row = mysqli_fetch_assoc($ret);
		
		$Options = mysqli_query( $conn ,"select Options from staff where Email='$Email' and Password='$Password'") or die("Could not execute query: " .mysqli_error($conn));
		$rowx =mysqli_fetch_assoc($Options);
		if(!$row) {
			header("Location:index.html");
		 }
		
		else if($rowx['Options']=="Course Instructor - CI"){

					$_SESSION=array();
					$_SESSION['unm']=$row['Name'];
					$_SESSION['type'] = "CI";
					$_SESSION['status']=true;
					$_SESSION['email'] = $Email;

			header("Location:./Homepage/CIHome.php");
		}
		
		else if($rowx['Options']=="Chief Course Instructor - CCI"){

			$_SESSION=array();
					$_SESSION['unm']=$row['Name'];
					$_SESSION['type'] = "CCI";
					$_SESSION['status']=true;
					$_SESSION['email'] = $Email;
			header("Location:./Homepage/CCIHome.php");
		}
		
		else if($rowx['Options']=="Test Coordinator - TC"){

			$_SESSION=array();
					$_SESSION['unm']=$row['Name'];
					$_SESSION['type'] = "TC";
					$_SESSION['status']=true;
					$_SESSION['email'] = $Email;
			header("Location:./Homepage/TCHome.php");
		}
		else if ($rowx['Options']=="Admin") {
			$_SESSION=array();
					$_SESSION['unm']=$row['Name'];
					$_SESSION['type'] = "Admin";
					$_SESSION['status']=true;
					$_SESSION['email'] = $Email;
			header("Location:./admin/");
		}

		// else{
		// 	header("Location:../index.php");
		// }

}

?>
