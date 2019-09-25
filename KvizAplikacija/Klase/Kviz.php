<?php  
	class Kviz{
		public static function getQuestion($db,$razina){
			// Prepare sql to take questions  according to level selected and limit to 15
			$query 		= $db->prepare("SELECT * FROM pitanja  WHERE pitanja.PitanjeRazinaId = :razinaid  LIMIT 15");
			$query->bindParam(":razinaid",$razina, PDO::PARAM_INT);
			$query->execute();
			// Fetch results returned
			$pitanja 	= $query->fetchAll();
			return $pitanja;
		}
		public static function getAnswers($db,$pitanje){
			// Do the same for answers according to question id
			$query		= $db->prepare("SELECT * FROM odgovori WHERE odgovori.OdgovorPitanjeId = :pitanjeid");
			$query->bindParam(":pitanjeid",$pitanje,PDO::PARAM_INT);
			$query->execute();
			$odgovori 	= $query->fetchAll();
			return $odgovori;
		}
		public static function getQuizInfo($db,$pitanje,$razina){
			$query 			= $db->prepare("SELECT * FROM quiz WHERE quiz.questionId = :pitanjeid AND  quiz.razina = :razina");
			$query->bindParam(":pitanjeid",$pitanje,PDO::PARAM_INT);
			$query->bindParam(":razina",$razina,PDO::PARAM_INT);
			$query->execute();
			$informacije	= $query->fetchAll();
			return $informacije;
		}
		public static function getPoints($db,$razina){
			$query			= $db->query("SELECT answersCorrect from quiz where razina = {$razina}");
			$points 		= $query->fetchAll();
			$pointsCombined = [];
			for ($i=0,$count = count($points); $i < $count; $i++) { 
				$pointsCombined[] = $points[$i]->answersCorrect;
			}
			return array_sum($pointsCombined);
		}
		public static function deleteQuizInfo($db,$razina){
			$query 			= $db->query("DELETE FROM quiz WHERE razina = {$razina}");
		}
		public static function getLastQuestion($db,$razina){
			$query 			= $db->prepare("SELECT quiz.questionId FROM quiz WHERE quiz.razina = :razina ORDER BY quiz.questionId DESC LIMIT 1");
			$query->bindParam(":razina",$razina,PDO::PARAM_INT);
			$query->execute();
			$lastQuestion 	= $query->fetch();
			return $lastQuestion;
		}
		public static function deleteAllQuizInfo($db){
			$query 			= $db->query("TRUNCATE TABLE quiz");
		}

	}