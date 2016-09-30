<?php
session_start();
include("connect_quizdb.php");

$qName = $_SESSION['qName'];


$questionid=$_POST['questionid'];
$question_type=$_POST['question_type'];
$question=$_POST['question'];
$answer=$_POST['answer'];
$points=$_POST['points'];


if (mysqli_query($conn5,"INSERT INTO $qName(questionid, question_type,question,answer,points)VALUES('$questionid','$question_type','$question','$answer','$points')")or die(mysqli_error()))
{
	echo '<script type="text/javascript">'
	, 'alert("Question Added!");'
	, '</script>'
	;
header("location: addquiz.php?qName=".$qName."");
}
else{
	echo '<script type="text/javascript">'
	, 'alert("Failed to Add Question!");'
	, '</script>'
	;
}
mysqli_close($conn5);
?>