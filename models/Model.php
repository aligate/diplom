<?php


class Model{

protected $db = null;

	function __construct()
	{
		include '/../lib/DataBase.php';
		$this->db = DataBase::getDbConnection();
	}
	
//Получение всех категорий
	public function findAllСategories()
	{
		$sth = $this->db->prepare("SELECT * FROM category ORDER BY category_id");
		if ($sth->execute()) {
			return $sth->fetchAll(PDO::FETCH_ASSOC);
		}
		return false;
	}
	
	public function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['users'])) {
            return $_SESSION['users'];
        }

        header("Location: ?/admin/login");
    }
	
	
	
	
	

}

?>
