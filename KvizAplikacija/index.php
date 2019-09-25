<?php  
	// include config file for database connection information
	require "config.php";
	// include autoload file for autoloading all classes
	require "Klase/autoload.php";
	// Create variable for database functionality via Koenkcija class
	global $conn;
	$conn = Konekcija::get();

?><!DOCTYPE html>
<html>
<head>
	<title>NBA kviz by UZZI</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Blinker:400,700&display=swap" rel="stylesheet">
	<script
  		src="https://code.jquery.com/jquery-3.4.1.min.js"
  		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  		crossorigin="anonymous"></script>
  	<script src="assets/script.js"></script>
<body>
	<h2>Nivoi:</h2>
	<a href="addquestion.php" class="desno">Dodaj pitanja</a>
	<?php  
		// Delete all information on quiz done 
		Kviz::deleteAllQuizInfo($conn);
		// Get all levels from table with Razine class
		$razine = Razine::fetch($conn);
		// Show all levels 
		for ($i=0,$brojrazina = count($razine); $i < $brojrazina ; $i++) { 
			echo "<a href='startkviz.php?razina={$razine[$i]->RazinaId}' class='razine'>{$razine[$i]->RazinaNaziv}</a> <br>";
		}

	?>
</body>
</html>