<?php
	class Database {
		private static $dsn = "mysql:host=localhost;dbname=dbuser;charset=utf8;";
		private static $username="root";
		private static $password = "";
		private static $db;
		private static $options = array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET CHARACTER SET utf8",PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
	);


		private function __construct(){}
		public static function getDB(){
			if(!isset(self::$db))
				{
					try {
						self::$db = new PDO (self::$dsn,self::$username,self::$password,self::$options);
					} catch (Exception $e) {
						$error_message = $e->getMessage();
						print_r($error_message);
						exit();
					}
				}
			return self::$db;	
		}
	}
 ?>

 
