<html lang="en">
<?php
session_start();
include("connect_instructor.php"); //conn
include("connect_quizdb.php"); //conn1

$passKey = $_SESSION['passKey'];
$_SESSION['passKey']=$passKey;

$userid = $_SESSION['userid'];
$_SESSION['userid']=$userid;

$qName = $_SESSION['qName'];
$_SESSION['qName'] = $qName;

$quizName = $_SESSION['quizName'];
$_SESSION['quizName'] = $quizName;

$sql="SELECT userid, lname, fname FROM instructor.$_SESSION[passKey] ";
$sql1 = "SELECT subjectCode, classCode FROM instructor.class WHERE passKey='$_SESSION[passKey]' ";

//$sql2 = "SELECT * FROM quizdb.$_SESSION[qName]";
//$sql3 = "SELECT quizName FROM quizdb.quiznames WHERE qName = '$_SESSION[qName]'";

$records=mysqli_query($conn1,$sql) or die(mysqli_error());
$records1=mysqli_query($conn1,$sql1)or die(mysqli_error());
//$records2=mysqli_query($sql2)or die(mysqli_error());
//$records3=mysqli_query($sql3)or die(mysqli_error());




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
					<br><br><br><br><br>
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
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                         

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

echo "<tr>".$row["subjectCode"]."</tr>";?><label>&ensp;-&ensp;</label><?php
echo "<tr>".$row["classCode"]."</tr>";
?><br><label>Quiz Name:&ensp; </label><?php
echo "<tr>".$quizName."</tr>"; 
} 

?>
                </h3>
                        </div>
<br>
                    <div class="title_right">
                            <div class="col-md-4 col-sm-4 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
									
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

                                

                                   <form name="addtorfquestion.php" data-parsley-validate class="form-horizontal form-label-left" action="addtorfquestion_exec.php" method="post">

                                        <div class="form-group">
                                            <label class="control-label col-md-2 col-sm-1 col-xs-12" for="first-name">Question No.<span class="required">*</span>
                                            </label>
                                            <div class="col-md-1 col-sm-1 col-xs-12">
                                                <input type="text" required="required" class="form-control col-md-1 col-xs-1" name="questionid" value="<?php $sql2 = "SELECT * FROM quizdb.$qName where questionid = '$_GET[questionid]' ";
$records2=mysqli_query($conn5,$sql2) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($records2);
 echo $row2['questionid'];?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2 col-sm-1 col-xs-12" for="last-name">Question<span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="question" value="<?php $sql2 = "SELECT * FROM quizdb.$qName where questionid = '$_GET[questionid]' ";
$records2=mysqli_query($conn5,$sql2) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($records2);
 echo $row2['question'];?>">
                                            </div>
                                        </div>
										<input type="hidden"  class="form-control col-md-7 col-xs-12" name="question_type" value="fb">
										
                                       
										<div class="form-group">
                                            <label class="control-label col-md-2 col-sm-1 col-xs-12">Correct Answer <span class="required">*</span></label>
                                            <div class="col-md-1 col-sm-1 col-xs-12">
                                                <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="answer" autocomplete="on" value="<?php $sql2 = "SELECT * FROM quizdb.$qName where questionid = '$_GET[questionid]' ";
$records2=mysqli_query($conn5,$sql2) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($records2);
 echo $row2['answer'];?>">
												
                                            </div>
											 </div>
										<div class="form-group">
                                            <label class="control-label col-md-2 col-sm-1 col-xs-12">Point(s) <span class="required">*</span></label>
                                            <div class="col-md-1 col-sm-1 col-xs-12">
                                                <input type="text" required="required" class="form-control col-md-1 col-xs-1" name="points" value="<?php $sql2 = "SELECT * FROM quizdb.$qName where questionid = '$_GET[questionid]' ";
$records2=mysqli_query($conn5,$sql2) or die(mysqli_error());
$row2 = mysqli_fetch_assoc($records2);
 echo $row2['points'];?>">
                                            </div>
											 </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                       
                                                <button type="submit" class="btn btn-success">Add Question</button>
                                            </div>
                                        </div>

                                    </form>
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
