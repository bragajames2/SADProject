<?php 

$userID = $_POST['userID'];
$password = $_POST['password'];

include("../connections/connect_mcvc-quiz.php");

$sql = "SELECT userID, password, userType FROM users WHERE userID='$userID' and password='$password' ";

$records = mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($records)){
	if($row['userType']=='instructor'){
		header ("location: ../profiles/instructor/home.html");
	}
	else if($row['userType']=='student'){
		header ("location: ../profiles/student/home.html");
	}
}

?>