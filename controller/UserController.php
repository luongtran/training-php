<?php 
	require_once('../model/database.php');
	require_once('../model/users_db.php');
	$errors=array();
	session_start();
	$action = filter_input(INPUT_POST,'action');
	if(empty($action))
	{
		$action=filter_input(INPUT_GET,'action');
	}

	switch ($action) {
		case 'login':
					$email = filter_input(INPUT_POST, 'email');
					$password = filter_input(INPUT_POST, 'password');
					$users = users_db::loginUser($email,$password);
					if(count($users)>0){
						foreach ($users as $value) {
							$_SESSION['idUser']=$value->getId();
							$us = users_db::FindUser($value->getId());
							if($us->getRoles()=='customer')
							{
								include('../view/userInformation.php');	
								break;							
							}
							$users = users_db::getAllUsers();
							include('../view/listUser.php');
						}
					}
					else{

                    	echo "Email : ".$email." Và Password :". $password."Không tồn tại";
                	}
			break;
		case 'register':
					include('../view/register.php');
			break;
		case 'add_user':
					$name = filter_input(INPUT_POST, 'name');
					if (empty($name)){
		                $errors[]="Name is reqire";
		            }
					$phone = filter_input(INPUT_POST, 'phone');
					if (empty($phone)){
		                $errors[]="Phone is reqire";
		            }
					$email = filter_input(INPUT_POST,'email');
					if (empty($email)){
		                $errors[]="Email is reqire";
		            }
					$password1 = filter_input(INPUT_POST,'password_1');
					if (empty($password1)){
		                $errors[]="Password is reqire";
		            }
					$role = filter_input(INPUT_POST, 'role');
					if (empty($errors)){
						$users = users_db::getAllUsers();
						$dem = 0;
						foreach ($users as $value ) {
							if($value->getEmail()==$email)
							{
								$dem++;	
								break;
							}
						}
						if($dem == 0)
						{
							users_db::addUser($name,$phone,$email,$password1,$role);
							$us = users_db::FindUser($_SESSION['idUser']);
							include('..\view\listUser.php');
						}
						else
						{
							echo "email tồn tại";
						}
						
					}else{
						include('..\view\editUser.php');
					}

			break;
		case 'edit':
					$id=filter_input(INPUT_GET,'id');
            		include('..\view\editUser.php'); 
			break;
		case 'update_user':
					$id=filter_input(INPUT_POST,'userID');
					$us = users_db::FindUser($_SESSION['idUser']);
					$name = filter_input(INPUT_POST, 'name');
					if (empty($name)){
		                $errors[]="Name is reqire";
		            }

					$phone = filter_input(INPUT_POST, 'phone');
					if (empty($phone)){
		                $errors[]="Phone is reqire";
		            }

					$email = filter_input(INPUT_POST,'email');
					if (empty($email)){
		                $errors[]="Email is reqire";
		            }

					$password1 = filter_input(INPUT_POST,'password_1');
					if (empty($password1)){
		                $errors[]="Password is reqire";
		            }

					$role = filter_input(INPUT_POST, 'role');

					if (empty($errors) && $us->getRoles()=='admin'){
						users_db::updateUser($id,$name,$phone,$email,$password1,$role);
						include('..\view\listUser.php');
					}
					else{
		                include('..\view\editUser.php');
		            }
			break;
		case 'delete':
			        $id=filter_input(INPUT_GET,'id');
			        users_db::deleteUser($id);
			        $us = users_db::FindUser($_SESSION['idUser']);
			        include('..\view\listUser.php');
        	break;

        case 'information':
        			$id=filter_input(INPUT_GET,'idUser');
					$us = users_db::FindUser($id);
					include('../view/userInformation.php');	
        	break;	
		
		case 'logout':
					unset($_SESSION['idUser']);
					include('..\view\login.php');
			break;
		default:
			include('..\view\login.php');
            break;
			
	}
?>