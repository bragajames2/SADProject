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
f
//Create short variables
$question = $_POST['question'];
$correct_answer = $_POST['correct_answer'];

//connect to the database
require_once('connect_quizdb.php');

//Create the insert query
$query = "INSERT INTO questions
			-- (questionid, question_type, name, choice1, choice2, choice3, choice4)
			 VALUES (NULL, 'torf','".$question."', '','','','".$correct_answer."')";

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

