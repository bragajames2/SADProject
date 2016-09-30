<?php
error_reporting(-1);
ini_set('display_errors', 'On');

//Check for empty fields
if(empty($_POST['question'])||
    empty($_POST['correct_answer']))
{
    echo "Please complete all fields";
    exit();
}

//Create short variables
$question = $_POST['question'];
$correct_answer = ($_POST['correct_answer']);
$wrong_answer1 = ($_POST['wrong_answer1']);
$wrong_answer2 = ($_POST['wrong_answer2']);
$wrong_answer3 = ($_POST['wrong_answer3']);

//connect to the database
require_once('connect_quizdb.php');

//Create the insert query
$query = "INSERT INTO questions
			-- (questionid, question_type, name, choice1, choice2, choice3, answer)
			 VALUES (NULL, 'fnb','".$question."','".$wrong_answer1."','".$wrong_answer2."','".$wrong_answer3."','".$correct_answer."')";

$result = mysqli_query($conn5,$query);

if($result){
    
    echo '<script type="text/javascript">'
	, 'alert("Your Quiz has been Saved!");'
	, '</script>'
	;
	header("Location:addquiz.php");
} else {
    echo '<script type="text/javascript">'
	, 'alert("Error Saving Quiz!");'
	, '</script>'
	;
}
mysqli_close($conn5);

?>

