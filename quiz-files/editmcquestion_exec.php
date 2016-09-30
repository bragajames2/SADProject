<?php
error_reporting(0);
session_start();
include("connect_quizdb.php");

$qName = $_SESSION['qName'];


$questionid=$_POST['questionid'];
$question=$_POST['question'];
$A=$_POST['A'];
$B=$_POST['B'];
$C=$_POST['C'];
$D=$_POST['D'];
$answer=$_POST['answer'];
$points=$_POST['points'];


$result=mysqli_query($conn5,"UPDATE $qName SET question='$question',A='$A', B='$B',C='$C',D='$D',answer='$answer',points='$points' WHERE questionid = '$questionid'");
mysqli_query($query);
if ($result){
	echo '<script type="text/javascript">'
	, 'alert("Successful!");'
	, '</script>'
	;
}
header("location: addquiz.php?qName=".$qName."");


mysqli_close($conn5);
?>