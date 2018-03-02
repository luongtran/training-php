<?php 
require_once('../Demo_MVC/models/MasterModel.php');
class UserModel extends MasterModel {

  public function getUser() {
    return parent::getAllFrom('users');
  }

  public function insertUser($date) {
    $status = parent::addUser($date['name'],$date['phone'],$date['email'],$date['password'],$date['roles']);
    return $status;
  }

  public function findUserById($id) {
     $status =  parent::findUser('users','id',$id);
     return $status;
  }

  public function login($email,$password) {
    return $data = parent::loginUser($email,$password);
  }

  public function deleteById($id)
  {
    return parent::delete('users','id',$id);
  }

  public function updateUserById($data) {
    return parent::update($data['id'],$data['name'],$data['phone'],$data['email'],$data['password'],$data['roles']);
  }

}
	
