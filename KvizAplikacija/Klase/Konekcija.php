<?php 
	class Konekcija{
		private static $db;
		public static function get(){
			if(!self::$db){
				try{	
					self::$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME,DBUSER,DBPASSWORD);
					self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
				}catch(PDOException $e){
					echo "Connection failed" . $e->getMessage();
				}
				return self::$db;
			}
		}

	}