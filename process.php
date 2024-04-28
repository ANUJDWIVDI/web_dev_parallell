<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 

    // this below code is to check if the score is set or not
	if (!isset($_SESSION['score'])){
	   $_SESSION['score'] = 0;
	}

//Check if form was submitted
if($_POST){
	$number = $_POST['number'];
	$selected_choice = $_POST['choice'];
	$next=$number+1;
	$total = 3;


	//Get total number of questions from database
	$query="SELECT * FROM `questions`";
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total=$results->num_rows;

	//Get correct choice from database
	$q = "select * from `choices` where question_number = $number and is_correct=1";
	$result = $mysqli->query($q) or die($mysqli->error.__LINE__);
	$row = $result->fetch_assoc();
	$correct_choice=$row['id'];



	//compare answer with result and increment score if correct
	if($correct_choice == $selected_choice){
		$_SESSION['score']++;
	}

	if($number == $total){
		header("Location: final.php"); // this will redirect to the final page
		exit();
	} else {
	        header("Location: question.php?n=".$next."&score=".$_SESSION['score']); // this will redirect to the next question
	}
}
?>