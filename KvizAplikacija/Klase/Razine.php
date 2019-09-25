<?php  
	class Razine{
		public static function fetch($db){
			// Get levels from table 'razina'
			$query = $db->query("SELECT * FROM razina");
			// Fetch data into object 
			$razine = $query->fetchAll();
			return $razine;
		}
	}