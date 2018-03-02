
<?php 
require_once('../Demo_MVC/config/database.php');
if(isset($_GET['controller'],$_GET['action'])) {
	$controller = $_GET['controller'];
	$action = $_GET['action'];
}else {
	$controller = 'UsersController';
	$action = 'index';
	
}
require_once('../Demo_MVC/controllers/'.$controller .'.php');	
	$controller = new $controller();
	$controller->$action();


