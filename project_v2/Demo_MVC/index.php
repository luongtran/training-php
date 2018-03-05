
<?php
// echo  $_GET['controller'];
// echo $_GET['action'];
require_once('./libs/helper.php');
require_once('./config/database.php');
require_once('./libs/Session.php');
Session::init();

if(isset($_GET['controller'],$_GET['action'])) {
	$controller = $_GET['controller'];
	$action = $_GET['action'];
}else {
	$controller = 'UsersController';
	$action = 'index';	
}

require_once('../Demo_MVC/controllers/'.$controller .'.php');	
$url = new $controller;
$url->$action();
