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
</head>
<body>
	<a href="index.php">Go back</a>
	<h2>Dodaj pitanje</h2>
	<form method="post" action="DatabaseProcessing/addquestions.php">
		<input type="hidden" name="pageurl" value="<?=$_SERVER['REQUEST_URI']?>">
		Sadrzaj Pitanja: <input type="text" name="pitanje" required> <br>
		<select name="razina" required>
			<?php 
			$razine = Razine::fetch($conn); 
			// Show all levels in option tag
			for ($i=0,$brojrazina = count($razine); $i < $brojrazina ; $i++) { 
				?>
					<option value="<?=$razine[$i]->RazinaId?>"><?=$razine[$i]->RazinaNaziv?></option>
				<?php
			}
			?>
		</select> <br>
		Odgovori: <br>
		<input type="radio" name="tacan" value="odgovor1"><input type="text" name="odgovor1"> <br>
		<input type="radio" name="tacan" value="odgovor2"><input type="text" name="odgovor2"> <br>
		<input type="radio" name="tacan" value="odgovor3"><input type="text" name="odgovor3"> <br>
		<input type="radio" name="tacan" value="odgovor4"><input type="text" name="odgovor4"> <br>
		<input type="submit" name="dodajpitanje" value="Dodaj pitanje">
	</form>
</body>
</html>