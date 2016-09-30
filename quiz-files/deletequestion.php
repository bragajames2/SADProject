<?php
session_start();
include("connect_quizdb.php");


$qName = $_SESSION['qName'];
$_SESSION['qName'] = $qName;

$questionid = $_GET['questionid'];

mysqli_query($conn5,"DELETE from quizdb.$qName where questionid = '$questionid' ")or die (mysqli_error());


include "deletequestion_exec.html";

$qName = $_SESSION['qName'];
$_SESSION['qName'] = $qName;

header ("location:addquiz.php?qName=".$qName."");


mysqli_close($conn5);
?>
