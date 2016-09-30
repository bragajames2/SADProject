<html lang="en">
<?php
session_start();
include("connect_instructor.php");
include("connect_quizdb.php");


$sql="SELECT userid, lname, fname FROM instructor.$_SESSION[passKey] ";
$sql1 = "SELECT subjectCode, classCode FROM instructor.class WHERE passKey='$_SESSION[passKey]' ";

$sql2 = "SELECT * FROM quizdb.$_GET[qName]";
$sql3 = "SELECT quizName FROM quizdb.quiznames WHERE qName = '$_GET[qName]'";

$records=mysqli_query($conn1,$sql) or die(mysqli_error());
$records1=mysqli_query($conn1,$sql1)or die(mysqli_error());
$records2=mysqli_query($conn5,$sql2)or die(mysqli_error());
$records3=mysqli_query($conn5,$sql3)or die(mysqli_error());


$qName = $_GET['qName'];
$_SESSION['qName'] = $qName;

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

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="css/icheck/flat/green.css" rel="stylesheet" />
    <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />

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
   return confirm("Are you sure you want to Delete question?");
}
</script>
</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"> <span>CEA-CpE QuizPortal</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile"> 	 	 
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>
<?php
echo $_SESSION["fname"];
?><br>&ensp;&ensp;
<?php
echo $_SESSION["lname"];
?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />
					<br><br><br><br><br><br><br>
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						
                        <div class="menu_section">
                            
                            <ul class="nav side-menu">
                                <li><a href="instructor.php"><i class="fa fa-home"></i>My Class</a>    
                                </li>
                                
                                <li><a href="createclass.php"><i class="fa fa-edit"></i>Create Class</a>
                                    
                                </li>
								<li><a href="files.php"><i class="fa fa-file-o"></i>Files</a>
                                    <ul class="nav child_menu" style="display: none">           
                                    </ul>
                                </li>
								<li><a href="instructorpass.php"><i class="fa fa-edit"></i>Change Password</a>
                                    <ul class="nav child_menu" style="display: none">           
                                    </ul>
                                </li>
                                <li><a href="loggout.php"><i class="glyphicon glyphicon-off"></i>&ensp;Logout</a>
                                    <ul class="nav child_menu" style="display: none">           
                                    </ul>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="menu_section">
                            
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
					<div class="">
                        <p>&emsp;&emsp;&ensp;
						Powered by Team JQUAD <br>&emsp;&emsp;&ensp;JEBB.JNBO.SJDA.JHCT <br> &emsp;&emsp;&emsp;&ensp;| Credits to Kimlabs | 
                        </p>
                    </div>
                    <div class="clearfix"></div>
                        <a >
                            <span class="glyphicon glyphicon-cog" aria-hidden="false" style="visibility: hidden;"></span>
                        </a>
                        <a >
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="false" style="visibility: hidden;"></span>
                        </a>
                        <a >
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="false" style="visibility: hidden;"></span>
                        </a>
                        <a >
                            <span class="glyphicon glyphicon-off" aria-hidden="false" style="visibility: hidden;"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                         

                        <ul class="nav navbar-nav navbar-right">
                            <li class=""><br>
                                <object>
									<embed src="http://www.clocktag.com/cs/dt91bold.swf" width="185" height="25"  wmode="transparent" type="application/x-shockwave-flash"></embed>
								</object>  

                                
                            </li>

                            

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->


            <!-- page content -->
            <div class="right_col" role="main">

                <!-- top tiles -->
                <div class="row tile_count">
                 <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>
<?php
while($row=mysqli_fetch_assoc($records1))
{
while($row3=mysqli_fetch_assoc($records3))
{

echo "<tr>".$row["subjectCode"]."</tr>";?><label>&ensp;-&ensp;</label><?php
echo "<tr>".$row["classCode"]."</tr>";
?><br><label>Quiz Name:&ensp; </label><?php
echo "<tr>".$row3["quizName"]."</tr>"; 
$quizName=$row3['quizName'];
$_SESSION['quizName']=$quizName;
} 
}
?>
                </h3>
                        </div>
<br>
                    <div class="title_right">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
									<form method="get" id="form1" action="viewquiz.php"></form>
									<button class="btn btn-success" type="submit" id="viewquiz" form="form1" >View Quizzes</button>
									<button data-toggle="dropdown" class="btn btn-warning dropdown-toggle " type="button" aria-expanded="false">Add Question <span class="caret"></span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="addmcquestion.php">Multiple Choice</a>
                                        </li>
                                        <li><a href="addtorfquestion.php">True or False</a>
                                        </li>
                                        <li><a href="addfbquestion.php">Fill in the Blank</a>
                                        </li>
                                    </ul>
							
								
                                </div>
								
									
                            </div>
                        </div>
					
                    <div class="row">

                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                
                             
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                                

                                    <table class="table table-striped responsive-utilities jambo_table bulk_action" style=" table-layout:fixed; font-size: 9pt; word-break:break-all;">
                                        <thead>
                                            <tr class="headings">
												
                                                <th class="column-title">Question</th>
                                                <th class="column-title">A/True</th>
                                                <th class="column-title">B/False</th>
                                                <th class="column-title">C</th>
                                                <th class="column-title">D</th>
                                                <th class="column-title">Right Answer</th>
                                                <th class="column-title">Point(s)</th>
                                                <th class="column-title">Edit</th>
                                                <th class="column-title">Delete</th>
												
											</tr>
										</thead>

                            <tbody>
                                <?php
			while($class=mysqli_fetch_assoc($records2)){
			
				echo "<tr>";
				echo "<td style='overflow: hidden;' >".$class['question']."</td>";
				echo "<td style='overflow: hidden;'>".$class['A']."</td>";
				echo "<td style='overflow: hidden;'>".$class['B']."</td>";
				echo "<td style='overflow: hidden;'>".$class['C']."</td>";
				echo "<td style='overflow: hidden;'>".$class['D']."</td>";
				echo "<td style='overflow: hidden;'>".$class['answer']."</td>";
				echo "<td style='overflow: hidden;'>".$class['points']."</td>";
				echo "<td style='overflow: hidden;'><a href=\"editquestion.php?questionid=".$class['questionid']."\">Edit</a></td>";
				echo "<td style='overflow: hidden;'><a onClick='return confirmDelete()' href=\"deletequestion.php?questionid=".$class['questionid']."\">Delete</a></td>";
				echo "</tr>";
			}
			mysqli_close($conn1);
            mysqli_close($conn5);
		?>
							</tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                </div>
                <!-- /top tiles -->

                
                <br />

                <div class="row">


                   
                    
                   
                </div>


                <div class="row">
                    
                    
                        
                          



                   

                </div>
				
				<div class="row">
                    
                    
                        
                          



                   

                </div>
				
				<div class="row">
                    
                    
                        
                          



                   

                </div>

                <!-- footer content -->

                
                <!-- /footer content -->
            </div>
            <!-- /page content -->

        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="js/bootstrap.min.js"></script>

    <!-- gauge js -->
    <script type="text/javascript" src="js/gauge/gauge.min.js"></script>
    <script type="text/javascript" src="js/gauge/gauge_demo.js"></script>
    <!-- chart js -->
    <script src="js/chartjs/chart.min.js"></script>
    <!-- bootstrap progress js -->
    <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
    <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- icheck -->
    <script src="js/icheck/icheck.min.js"></script>
    <!-- daterangepicker -->
    <script type="text/javascript" src="js/moment.min.js"></script>
    <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>

    <script src="js/custom.js"></script>

    <!-- flot js -->
    <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
    <script type="text/javascript" src="js/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
    <script type="text/javascript" src="js/flot/date.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
    <script type="text/javascript" src="js/flot/curvedLines.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script>
    
    <!-- /datepicker -->
    <!-- /footer content -->
</body>

</html>
