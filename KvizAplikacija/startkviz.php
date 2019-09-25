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
	<a href="index.php">Go back</a>
	<?php  
		// Get questions and answets according to level from get variable
		$razina 			= $_GET['razina'];
		// Delete quiz information
		Kviz::deleteQuizInfo($conn,$razina);
		// Get Array of questions from database as objects
		$pitanja 			= Kviz::getQuestion($conn,$razina);
		shuffle($pitanja);
		$_SESSION['kvizpitanja'] = $pitanja;
		echo "<a href='kviz.php?razina={$razina}&pitanje=0' class='razine'>Zapocni kviz!</a> <br>";
	?>
</body>
</html>