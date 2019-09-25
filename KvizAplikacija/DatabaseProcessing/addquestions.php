<?php
	require "../config.php";
	require "../Klase/autoload.php";
	
	// Check if form was submitted
	if(isset($_POST['dodajpitanje'])){
		// Check if all input fields were filled 
		if(isset($_POST['pitanje']) && !empty($_POST['pitanje']) && isset($_POST['razina']) && !empty($_POST['razina']) && isset($_POST['tacan']) && isset($_POST['odgovor1']) && !empty($_POST['odgovor1']) && isset($_POST['odgovor2']) && !empty($_POST['odgovor2']) && isset($_POST['odgovor3']) && !empty($_POST['odgovor3']) && isset($_POST['odgovor4']) && !empty($_POST['odgovor4'])){
			// If all input fields are set
			$post 			= $_POST;
			// Set variable for every data sent through form
			$pitanje  		= $post['pitanje'];
			$razina 		= $post['razina'];
			$tacanodgovor	= $post['tacan'];
			$odgovor1 		= $post['odgovor1'];
			$odgovor2		= $post['odgovor2'];
			$odgovor3 		= $post['odgovor3'];
			$odgovor4		= $post['odgovor4'];
			$pageurl		= $post['pageurl'];
			// Establish connection 
			$conn 			= Konekcija::get();
			// Prepare and execute query for adding question to 'pitanja' table
			$pripremi		= $conn->prepare("INSERT INTO pitanja VALUES(null,:pitanje,{$razina},:tacanodgovor)");
			$izvrsi 		= $pripremi->execute(array(':pitanje'=> $pitanje,'tacanodgovor'=>$post[$tacanodgovor]));
			// Check if execution has been done
			if($izvrsi){
				//Get id of question with lastInsertId
				$pitanjeid 	= $conn->lastInsertId();
				// Prepare and execute query for adding answers to 'odgovori' table
				for($i = 1;$i < 5;$i++){
					$pripremi2  = $conn->prepare("INSERT INTO odgovori VALUES(null,:odgovorsadrzaj,{$pitanjeid})");
					$izvrsi2 	= $pripremi2->execute(array(':odgovorsadrzaj'=>$post['odgovor'.$i]));
				}
				if($izvrsi2){
					header("location:{$pageurl}");
				}else{
					die("Dodavanje pitanja nije uspesno <a href='../addquestion.php'>Idi nazad</a>");
				}
				
			}
		}else{
			// If all input fields are not set
			echo "Popunite sva polja forme";
		}
	}