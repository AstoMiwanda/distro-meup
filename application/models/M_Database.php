<?php
/**
 * 
 */
class M_Database extends CI_Model
{
	
	public static $host = "localhost";
	public static $dbName = "distro";
	public static $username = "root";
	public static $password = "";

	private static function connect() {

		$pdo = new PDO("mysql:host=".self::$host."; dbname=".self::$dbName."; charset=utf8", self::$username, self::$password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;

	}

	public function query($query, $params = array()) {

		$statement = self::connect()->prepare($query);
		$statement->execute($params);
		if(explode(' ', $query)[0] == 'SELECT') {
			$data = $statement->fetchAll();
			return $data;
		}

	}

}
?>