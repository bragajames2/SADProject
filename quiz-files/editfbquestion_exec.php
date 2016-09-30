<?php
session_start();
include("connect_quizdb.php");

$qName = $_SESSION['qName'];


$questionid=$_POST['questionid'];
$question=$_POST['question'];
$answer=$_POST['answer'];
$points=$_POST['points'];


$result = mysqli_query($conn5,"UPDATE $qName SET  question='$question',answer='$answer',points='$points' WHERE questionid='$questionid'");

if ($result or die(mysqli_error())){
	echo '<script type="text/javascript">'
	, 'alert("Successful!");'
	, '</script>'
	;
}
header("location: addquiz.php?qName=".$qName."");


mysqli_close($conn5);
?>