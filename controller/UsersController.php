<?php
require_once('model/database.php');
require_once('model/users_db.php');
require_once('Controller.php');

class UsersController extends Controller {

	public function __construct() {

	}

	public function index() {
		$users = UserDb::getAllUsers();
		$this->setView('listUser.php', $users);
	} 
}


