<?php 
require_once('../Demo_MVC/views/UserView.php');
require_once('../Demo_MVC/models/UserModel.php');
require_once('../Demo_MVC/libs/Session.php');
class UsersController {

	public function getUsers() {
		Session::init();
		$logged = Session::get('loggedIn');
		if($logged==false)
		{
			Session::destroy();
			header('location: ?controller=UsersController&action=index');
			exit;
		}
		$users = UserModel::getUser();
		$view = new UserView();
		$view->listUsers($users);
	
		
	}

	public function index()
	{
		$view = new UserView();
		$view->index();
	}

	public function formAdd()
	{
		Session::init();
		$logged = Session::get('loggedIn');
		if($logged==false)
		{
			Session::destroy();
			header('location: ?controller=UsersController&action=index');
			exit;		
		}
		else{
			$view = new UserView();
			$view->fromAddUser();
		}
		
	}

	public function edit()
	{
		Session::init();
		if(Session::get('role')!='admin' || Session::get('loggedIn')==false)
		{
			header('location: ?controller=UsersController&action=getUsers');
			exit;
		}
		else
		{
			$id = $_GET['id'];
			$user = UserModel::findUserById($id);
			$view = new UserView();
			$view->editUser($user);
		}	
	}

	public function delete()
	{
		Session::init();
		if(Session::get('role')!='admin' || Session::get('loggedIn')==false)
		{
			header('location: ?controller=UsersController&action=getUsers');
			exit;
		}
		else
		{
			if(isset($_GET['id'])) {
		  		UserModel::deleteById($_GET['id']);
		 		header('location: ?controller=UsersController&action=getUsers');
		 	}
			else
			{
				 header('location:.');
			}
		}
	
	}

	public function login()
	{
		if(isset($_POST['email'],$_POST['password']))
		{
			$email = $_POST['email'];
			$password = $_POST['password'];
			$data = UserModel::login($email,$password);
			if(is_array($data) == true)
			{
				Session::init();
				Session::set('loggedIn',true);
				Session::set('role',$data['roles']);
				Session::set('name',$data['name']);
				header('location: ?controller=UsersController&action=getUsers');
			}
			else {
				header('location: ?controller=UsersController&action=index');
			}
		}
		else
		{
			echo "Thất bại";
		}
		
	}

	public function doAdd() 
	{
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password_1'];
		$roles = $_POST['role'];

		$date = array(
			'name' => $name,
			'phone' => $phone,
			'email' =>$email,
			'password' => $password,
			'roles' => $roles,
		);

		$user = UserModel::insertUser($date);
		header('location: ?controller=UsersController&action=getUsers');
	}

	public function logout()
	{
		session::init();
		Session::destroy();
		header('location: ?controller=UsersController&action=index');
		exit;
	}

	public function update()
	{
		session::init();
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$password = $_POST['password_1'];
		$roles = $_POST['role'];
		$id = $_POST['id'];

		$data = array(
			'id' => $id,
			'name' => $name,
			'phone' => $phone,
			'email' =>$email,
			'password' => $password,
			'roles' => $roles,
		);

		if(Session::get('role')!='admin' || Session::get('loggedIn')==false)
		{
			header('location: ?controller=UsersController&action=getUsers');
			exit;
		}
		else
		{
			$user = UserModel::updateUserById($data);
			header('location: ?controller=UsersController&action=getUsers');
		}		
	}
}

?>