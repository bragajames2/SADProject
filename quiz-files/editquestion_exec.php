<?php

session_start();
include("connect_quizdb.php");

$qName = $_SESSION['qName'];
$questionid = $_GET['questionid'];

$sql = "SELECT question_type FROM $qName";

$passKey = $_SESSION['passKey'];
$_SESSION['passKey']=$passKey;

$userid = $_SESSION['userid'];
$_SESSION['userid']=$userid;

$qName = $_SESSION['qName'];
$_SESSION['qName'] = $qName;

$quizName = $_SESSION['quizName'];
$_SESSION['quizName'] = $quizName;


$record = mysqli_query($conn5,$sql)or die(mysqli_error());

while ($row = mysqli_fetch_assoc($record))
{
	if($row['question_type'] == 'mul' ) 
	{
		header ("location:editmcquestion.php?questionid=".$questionid."");
	}
	else if ($row['question_type'] == 'torf' ){
		header ("location:edittorfquestion.php?questionid=".$questionid."");
	}
	//
	
	else if ($row['question_type'] == 'fb' ){
		header ("location:editfbquestion.php?questionid=".$questionid."");
	}
	//
	
}	
?>