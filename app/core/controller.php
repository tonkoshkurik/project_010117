<?php 
class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{
		$this->view = new View();
	}
	
	function action_index()
	{

	}
	public function db()
	{
		return App::getInstance()->getComponent('db');
	}

	public function check_user_role(){
		$user = App::getInstance()->getComponent('auth')->getCurrentUser();
		if ($user){
			return $user->role;
		}
		return false;
	}
}
?>
