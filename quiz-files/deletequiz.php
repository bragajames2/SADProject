<?php
session_start();
include("connect_quizdb.php"); //conn
include("connect_cr.php"); //conn1

$qName=$_GET['qName'];

$query = "DROP TABLE IF EXISTS quizdb.$qName";
$query1 = "delete from quizdb.quiznames where qName = '$qName'";
$query2 = "DROP TABLE IF EXISTS classrecord.$qName";
if(mysqli_query($conn5,$query1)or die (mysqli_error()))
{
	if(mysqli_query($conn5,$query)or die (mysqli_error()))
	{ 
	if(mysqli_query($conn3,$query2)or die (mysqli_error()))
	{
		echo '<script type="text/javascript">'
	, 'alert("Successfully Deleted Quiz!");'
	, 'window.location = "viewquiz.php";'
	, '</script>'
	;
	
	}
	else
	{ 
	echo '<script type="text/javascript">'
	, 'alert("Failed to Delete Quiz!");'
	, '</script>'
	;
	}
	}
}
else
{ 
	echo '<script type="text/javascript">'
	, 'alert("Failed to Delete Quiz!");'
	, '</script>'
	;
	}	
?>	