<?php
	require "../config.php";
	require "../Klase/autoload.php";
	
	
	// Check if answer was set
	if(isset($_POST['answer'])){
		// Set variable for every data sent through form
		$answer 			= $_POST['answer'];
		$pageurl 			= $_POST['pageurl'];
		$questionNumber 	= $_POST['questionNumber'];
		$rightAnswer		= $_POST['rightAnswer'];
		$razina 			= $_POST['razina'];

		$conn 				= Konekcija::get();

		//Check if answer was already answered 
		$check 			= $conn->query("SELECT * FROM quiz WHERE questionId = {$questionNumber} and razina = {$razina}");
		$checkQuestion  = $check->fetchAll();
		if(empty($checkQuestion)){
			if($rightAnswer === $answer){
				$query 		= $conn->query("INSERT INTO quiz VALUES(null,{$questionNumber},1,{$razina},'{$answer}','{$answer}')");
				echo "bravo";
			}else{
				$query 		= $conn->query("INSERT INTO quiz VALUES(null,{$questionNumber},0,{$razina},'{$rightAnswer}','{$answer}')");
				echo "steta";
			}
		}else{
			echo "nemoze";
		}
	}else{
		echo "notset";
	}