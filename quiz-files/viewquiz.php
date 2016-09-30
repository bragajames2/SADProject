	<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("connect_quizdb.php"); //conn
include("connect_instructor.php"); //conn1
$sql="SELECT qName, quizName FROM quiznames where userid = '$_SESSION[userid]' and passKey='$_SESSION[passKey]'";
$sql1 = "SELECT subjectCode, classCode, userid FROM class WHERE passKey='$_SESSION[passKey]' ";

$records=mysqli_query($conn5,$sql);
$records1=mysqli_query($conn1,$sql1);

$passKey = $_SESSION['passKey'];
$_SESSION['passKey']=$passKey;

$userid = $_SESSION['userid'];
$_SESSION['userid']=$userid;
?>	

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CEA-CpE QuizPortal</title>

    <script src="js/jquery.min.js"></script>
    <script src="js/nprogress.js"></script>
    <script>
        NProgress.start();
    </script>
    
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
<script type='text/javascript'>
function confirmDelete()
{
   return confirm("Are you sure you want to delete Quiz?");
}
</script>
</head>


<body>

<span>Welcome,</span>
<h2> <?php echo $_SESSION["fname"]; ?><br> <?php echo $_SESSION["lname"]; ?></h2>

    <li><a>My Class</a>    
    </li>
    <li><a href="createclass.php">Create Class</a>
    </li>
    <li><a href="files.php">Files</a>
    </li>
    <li><a href="instructorpass.php">Change Password</a>
    </li>
    <li><a href="loggout.php">Logout</a>
    </li>


<h3>
<?php
while($row=mysqli_fetch_assoc($records1))
{
echo "<tr>".$row["subjectCode"]."</tr>";?><label>&ensp;-&ensp;</label><?php
echo "<tr>".$row["classCode"]."</tr>";
} 
?>
    </h3>

                        
						<form name="addquizfile" id="addquizfile" method="post">
						<button class="btn btn-warning" type="submit" id="addquiz">Create Quiz</button>
						<button class="btn btn-success" type="submit" id="viewquiz">View Quizzes</button>
						<button class="btn btn-info" type="submit" id="addfile">Upload File</button>
						<button class="btn btn-primary" type="submit" id="classrecord">Class Record</button>
						<script>

				$('#addquiz').click(function(){
					var form = document.getElementById("addquizfile")
					form.action = "createquiz.php";
					form.submit();
					});
				
				$('#viewquiz').click(function(){
					var form = document.getElementById("addquizfile")
					form.action = "viewquiz.php";
					form.submit();
					});
					
				$('#classrecord').click(function(){
					var form = document.getElementById("addquizfile")
					form.action = "classrecord.php";
					form.submit();
					});
					
				$('#addfile').click(function(){
					var form = document.getElementById("addquizfile")
					form.action = "uploadfile.php";
					form.submit();

					});

				</script>
						</form>
					


                        <table>
                            <thead>
                                <tr>
									
                                    <th class="column-title">Quiz Name</th>
                                    <th class="column-title">View Quiz</th>
                                    <th class="column-title">Delete Quiz</th>
                                    <th class="column-title">View Results</th>
									
								</tr>
							</thead>

                <tbody>
                    <?php

while($class=mysqli_fetch_assoc($records)){

	echo "<tr>";
	echo "<td>".$class['quizName']."</td>";
	echo "<td><a href=\"addquiz.php?qName=".$class['qName']."\">View</a></td>";
	echo "<td><a onClick='return confirmDelete()' href=\"deletequiz.php?qName=".$class['qName']."\">Delete</a></td>";
	echo "<td><a href=\"viewresult.php?qName=".$class['qName']."\">View</a></td>";
	echo "</tr>";
}

mysqli_close($conn5);
mysqli_close($conn1);
?>
				</tbody>
                        </table>
</body>

</html>
