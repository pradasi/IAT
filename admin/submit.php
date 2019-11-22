<?php

if(isset($_POST['submit'])){
	include("Connection.php");

	$email=mysqli_escape_string($conn,$_POST['email']);

	$Password=mysqli_escape_string($conn,$_POST['Password']);
	$Password = md5($Password);
	$name=mysqli_escape_string($conn,$_POST['name']);

	$options=mysqli_escape_string($conn,$_POST['options']);

	$sem=mysqli_escape_string($conn,$_POST['sem']);

	$subject= mysqli_escape_string($conn,$_POST['subject']);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql ="INSERT Into staff(Email,Password,Name,Sem,Options,Subject) values('$email',
'$Password',
'$name',
$sem,
'$options','$subject')";

if ($conn->query($sql) === TRUE) {
    header("Location:index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}


// $conn->close();
?>