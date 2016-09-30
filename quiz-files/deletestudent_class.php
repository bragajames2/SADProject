<?php
session_start();
include('connect_instructor.php');

$userid=$_GET['userid'];

//$passKey = $_GET['passKey'];
$passKey = $_SESSION['passKey'];


$query = "delete from $_SESSION[passKey] where userid = '$userid'"; 

	if(mysqli_query($conn1,$query)or die(mysqli_error()))
	{
	echo '<script type="text/javascript">'
	, 'alert("Student Account Successfully Deleted!");'
	, 'window.location.href = "myclass.php?passKey='.$passKey.'";'
	, '</script>'
	;
	
	} 
	else
	{ 
	echo '<script type="text/javascript">'
	, 'alert("Failed to Delete Account!");'
	, '</script>'
	;
	}
			   
?>	 
