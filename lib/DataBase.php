<?php

class DataBase
{
	/**
	 * Подключение к базе данных mysql
	 * @param $host адрес
	 * @param $dbname название базы
	 * @param $user пользователь
	 * @param $pass пароль
	 */
	public static $db;
	 
	public static function getDbConnection($host, $dbname, $user, $pass){
		
		if(!self::$db)
		{
			self::$db = new PDO ('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $pass);
		}
		
		return self::$db;
	}
}
