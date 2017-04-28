<?php
namespace lib;

class DataBase
{
	/**
	 * Подключение к базе данных mysql
	 */
	 public static $db;
	 
	public static function getDbConnection(){
		
		$config = include '/../config.php';
		
		
		if(!self::$db){
			self::$db = new \PDO($config['dsn'], $config['user'], $config['pass'], 
					     	[\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
						\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC]);
			
		}
		
		return self::$db;
		
	}
	 
	
}
