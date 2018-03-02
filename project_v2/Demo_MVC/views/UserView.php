<?php
class UserView {
	public function index(){
		require_once('../Demo_MVC/templates/Login.php');
	}

	public function fromAddUser()
	{
		require_once('../Demo_MVC/templates/register.php');
	}

	public function listUsers($users)
	{
		require_once('../Demo_MVC/templates/ListUser.php');
	}

	public function editUser($user)
	{
		require_once('../Demo_MVC/templates/editUser.php');
	}

}

