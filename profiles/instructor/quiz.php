<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("../../connections/connect_mcvc-quiz.php");
$sql="SELECT * FROM instructor_view WHERE userID='2012101631' ";

$records=mysqli_query($conn,$sql);

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Header Logo -->
    <link href = "../../logo-icon/scea.png" rel="icon" type="image/x-icon">
    <title>
    MCVC - Quiz</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="../../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.html">CEA Virtual Classroom</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="user-profile.html">Signed in as James Braga</a>
                    </li>

                    <li>
                        <a href="syllabus.html">Syllabus</a>
                    </li>
                    <li>
                        <a href="instructional-materials.html">Instructional Material</a>
                    </li>
                    
                    <li>
                        <a href="quiz.html"> View Quiz </a> 
                    </li>
                    <li>
                        <a href="class-record.html">Class Record</a>
                    </li>
                    <li>
                        <a href="../index.html">Log Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quiz
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.html">CEA Virtual Classroom</a>
                    </li>
                    <li class="active">Quiz</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <!-- Button trigger modal -->
                <h1 style="margin: 0 0 10px 0px;">
                <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">
                  Create Quiz
                </button>
                </h1>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Create Quiz</h4>
                      </div>
                      <div class="modal-body">
                        
                    <form class="form-horizontal">
                            <div class="form-group">

                                <label for="nameOfSubject" class="col-sm-2 control-label">Course Code</label>
                                    <div class="col-sm-10">
                                            <select class="form-control">
                                                <option>1</option>
                                            </select>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label for="nameOfSubject" class="col-sm-2 control-label">Course Title</label>
                                    <div class="col-sm-10">
                                            <select class="form-control">
                                                <option>1</option>
                                            </select>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label for="nameOfSubject" class="col-sm-2 control-label">Class Code</label>
                                    <div class="col-sm-10">
                                            <select class="form-control">
                                                <option>1</option>
                                            </select>
                                    </div>
                            </div>

                            <div class="form-group">
                                <label for="nameOfSubject" class="col-sm-2 control-label">Quiz Name</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="nameOfQuiz">
                                </div>
                            </div>                            
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger" data-dismiss="modal">Create</button>
                              </div>
                    </form>

                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Quiz Table
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body"> <!-- EXAMPLE DATA -->
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Course Code</th>
                                        <th>Course Title</th>
                                        <th>Class Code</th>
                                        <th>Pass Key</th>
                                        <th>Quiz Name</th>
                                        <th>View Quiz</th>
                                        <th>Delete Quiz</th>
                                        <th>View Results</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php
                                        while($row=mysqli_fetch_assoc($records)){
                                                        
                                            echo "<tr>";
                                            echo "<td>".$row['courseCode']."</td>";
                                            echo "<td>".$row['courseTitle']."</td>";
                                            echo "<td>".$row['classCode']."</td>";
                                            echo "<td>".$row['passKey']."</td>";
                                            echo "<td>".$row['quizName']."</td>";
                                            echo "<td>"."View"."</td>";
                                            echo "<td>"."Delete"."</td>";
                                            echo "<td>"."View"."</td>";
                                            echo "</tr>";
                                        }
                                        
                                        mysqli_close($conn);
                                    ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; MUST - CEA Virtual Classroom</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>


</body>

</html>
