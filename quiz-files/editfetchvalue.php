<?php
session_start();
include("connect_quizdb.php");

$qName = $_SESSION['qName'];
$_SESSION['qName'] = $qName;

$sql2 = "SELECT * FROM quizdb.$qName where questionid = '$_GET[questionid]' ";
$records2=mysqli_query($conn5,$sql2) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($records2);
?>