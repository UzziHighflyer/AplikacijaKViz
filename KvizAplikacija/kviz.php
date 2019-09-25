<?php 
	session_start(); 
	// include config file for database connection information
	require "config.php";
	// include autoload file for autoloading all classes
	require "Klase/autoload.php";

	global $conn;
	$conn 	= Konekcija::get();
?><!DOCTYPE html>
<html>
<head>
	<title>NBA kviz by UZZI</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Blinker:400,700&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="assets/script.js"></script>
</head>
<body>
	<?php  
		// Get questions and answets according to level from get variable
		if(is_numeric($_GET['razina']) && isset($_GET['razina'])){
			$razina 	= $_GET['razina'];
		}else{
			$razina 	= 0;
		}
		

		// Declare $pitanje variable and assign value from get parameter
		$pitanje 			= $_GET['pitanje'];
		$brojpitanja 		= $pitanje + 1;
		// Get Array of questions from database as objects
		$pitanja 			= $_SESSION['kvizpitanja'];
		// Get last queston id 
		$lastQuestion 		= Kviz::getLastQuestion($conn,$razina);
		if(!empty($lastQuestion)){
			$lastQuestionId		= $lastQuestion->questionId;
		}else{
			$lastQuestionId	 	= 0;
		}
		// Prevent user from accessing all questions without answering previous first
		if(($pitanje - $lastQuestionId) > 1 && $pitanje !== 0){
			header("location:kviz.php?razina={$razina}&pitanje={$lastQuestionId}");
		}
		$countPitanja		= count($pitanja);

		if($brojpitanja > $countPitanja){
			$points 		= Kviz::getPoints($conn,$razina);
			$percentage 	= ($points*100) / count($pitanja) ;
			die("Score: {$points}/{$countPitanja} ". ceil($percentage) . "%");
		}
		// Get information about quiz and questions that were answered	
		$informacije 		= Kviz::getQuizInfo($conn,$pitanje,$razina);
		// Get full url and process it to cut pitanje parameter
		$fullUrl 			= $_SERVER['REQUEST_URI'];
		$fullUrlExplode 	= explode('&',$fullUrl);
		$url 				= $fullUrlExplode[0];
		?>
			<a href="startkviz.php?razina=<?=$razina?>">Go back</a>
		<?php
		// Check if $pitanja array is not empty 
		if(!empty($pitanja)){
			echo "<p>Pitanje " . $brojpitanja . " / " . count($pitanja) ."</p>";
			echo "<h2>{$pitanja[$pitanje]->PitanjeSadrzaj}</h2>";
			echo "<form  method='post' id='answerQuestionForm' action='DatabaseProcessing/answerquestion.php'>";
			echo "<input type='hidden' name='pageurl' value='{$fullUrl}'>";
			echo "<input type='hidden' name='rightAnswer' value='{$pitanja[$pitanje]->TacanOdgovor}'>";
			echo "<input type='hidden' name='questionNumber' value='{$pitanje}'>";
			echo "<input type='hidden' name='razina' value='{$razina}'>";
			$odgovori = Kviz::getAnswers($conn,$pitanja[$pitanje]->PitanjeId);
			// Print all answer options (disable them if question was alredy answered)
			for($j = 0,$countAnswers = count($odgovori);$j < $countAnswers;$j++){
				?>
					<input type='radio' name='answer' <?=(isset($informacije) && !empty($informacije))?"disabled":""?> <?=(isset($informacije)&& !empty($informacije)) && ($informacije[0]->answerSelected == $odgovori[$j]->OdgovorSadrzaj)?'checked':''?>  value='<?=$odgovori[$j]->OdgovorSadrzaj?>'> <span style='<?= (isset($informacije)&& !empty($informacije)) && ($informacije[0]->correctAnswer == $odgovori[$j]->OdgovorSadrzaj)?'color:green':''?>'><?=$odgovori[$j]->OdgovorSadrzaj?></span><br>	
				<?php
			}
			?>
			<input type='submit' name='odgovori' value='Answer' style='display:<?=(isset($informacije)&& !empty($informacije))?"none":"block"?>'>
			</form>
			<button id='nextButton' style='display:<?=(isset($informacije)&& !empty($informacije))?"block":"none"?>'><a href='<?= $url . "&pitanje=" . $brojpitanja?>'>Next</a></button>
			<?php
		// If empty
		}else{
			echo "NO questions";
		}
	?>
		<div id="success" style="display:none;border:2px solid green;<?=(isset($informacije)&& !empty($informacije)) && ($informacije[0]->correctAnswer == $informacije[0]->answerSelected)?'display:block;':''?>">Vec ste odgovorili tacno.</div>
		<div id="error" style="display:none;border:2px solid red;<?=(isset($informacije)&& !empty($informacije)) && ($informacije[0]->correctAnswer != $informacije[0]->answerSelected)?'display:block;':''?>">Vec ste odgovorili netacno</div>
</body>
</html>