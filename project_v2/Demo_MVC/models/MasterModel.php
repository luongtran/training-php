<?php 

class MasterModel {

	  public static function getAllFrom($table) {
      $db=Database::getDB();
      $query="SELECT * FROM $table";
      $statement=$db->prepare($query);
      $statement->execute();
      $result=$statement->fetchAll();
      $statement ->closeCursor();
      return $result;
    }

   	  public static function addUser($name,$phone,$email, $password,$roles) {
      $db=Database::getDB();
      $query='INSERT INTO users (name,phone,email,password,roles) VALUES (:name,:phone,:email, :password, :roles)';
      $statement = $db->prepare($query);
      $statement ->bindValue(':name',$name);
      $statement ->bindValue(':phone',$phone);
      $statement ->bindValue(':email',$email);
      $statement ->bindValue(':password',$password);
      $statement ->bindValue(':roles',$roles);
      $statement ->execute();
      $statement ->closeCursor();
    }

     public static function findUser($table,$column,$id) {
      $db=Database::getDB();
      $query="SELECT * FROM $table WHERE $column=:id";
      $statement=$db->prepare($query);
      $statement ->bindValue(':id',$id);
      $statement ->execute();
      $result = $statement->fetch();
      $statement->closeCursor();
      return $result;
    }

      public static function loginUser($email, $password){
      $db=Database::getDB();//open connection database
      $query = 'SELECT id,name,roles FROM users
                WHERE email = :email and password=:password';
      $statement = $db->prepare($query);
      $statement->bindValue(':email', $email);
      $statement->bindValue(':password', $password);
      $statement->execute();
      $result = $statement->fetch();
      return $result;
    }

    public function update($id,$name,$phone,$email, $password,$roles) {
    $db=Database::getDB();
    $query='UPDATE users 
            SET name = :name, phone = :phone, email = :email, password = :password, roles= :roles WHERE id = :id';
      $statement = $db->prepare($query);
      $statement ->bindValue(':id',$id);
      $statement ->bindValue(':name',$name);
      $statement ->bindValue(':phone',$phone);
      $statement ->bindValue(':email',$email);
      $statement ->bindValue(':password',$password);
      $statement ->bindValue(':roles',$roles);
      $statement ->execute();
      $statement ->closeCursor();    
    }

    public static function delete($table,$column,$id) {
      $db = Database::getDB();
      $query = "DELETE FROM $table WHERE $column =:id ";
      $statement = $db->prepare($query);
      $statement->bindValue(':id', $id);
      $statement->execute();
      $statement->closeCursor();
    }

}

