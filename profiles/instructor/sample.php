<?php
session_start();
include("connect_mcvc-quiz.php");
$sql="SELECT * FROM instructor_view WHERE instructorID='2012101631' ";

$records=mysqli_query($conn,$sql);

?>

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