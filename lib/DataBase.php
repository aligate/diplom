<?php

class DataBase
{
	/**
	 * Подключение к базе данных mysql
	 */
	 public static $db;
	 
	public static function getDbConnection(){
		
		$config = include '/../config.php';
		$options = [

			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

		];
		
		if(!self::$db){
			self::$db = new PDO($config['dsn'], $config['user'], $config['pass'], $options);
		}
		
		return self::$db;
		
	}
	 
	
}
