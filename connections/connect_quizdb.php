<?php 

//Set the database access information as constants
$conn5 = mysqli_connect("localhost", "root", "","quizdb");

if (mysqli_connect_error()){
	
	echo '<script type="text/javascript">'
	, 'alert("Could not connect to MySql. Please try again");'
	, '</script>'
	;
	
	exit();
}

?>
