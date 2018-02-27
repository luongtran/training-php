<?php
class user{
  private $id;
  private $name;
  private $phone;
  private $email;
  Private $password;
  Private $roles;

  public function __construct($name,$phone,$email,$password,$roles){
    $this->name = $name;
    $this->phone = $phone;
    $this->email = $email;
    $this->password = $password;
    $this->roles = $roles;
  }

  public function getId(){return $this->id;}
  public function getName(){return $this->name;}
  public function getPhone(){return $this->phone;}
  public function getEmail(){return $this->email;}
  public function getPassword(){return $this->password;}
  public function getRoles(){return $this->roles;}

  public function setId($value){$this->id = $value;}
  public function setName($value){$this->name = $value;}
  public function setPhone($value){$this->phone = $value;}
  public function setEmail($value){$this->email = $value;}
  public function setPassword($value){$this->password = $value;}
  public function setRoles($value){$this->roles = $value;}
}

class users_db{

    public static function getAllUsers(){
      $db=Database::getDB();
      $query='SELECT * FROM users ORDER BY email DESC';
      $statement=$db->prepare($query);
      $statement->execute();
      $result=$statement->fetchAll();
      $statement->closeCursor();
      foreach($result as $value){
        $user= new user($value['name'],
                $value['phone'],
                $value['email'],
                $value['password'],
                $value['roles']);
        $user->setId($value['id']);
        $users[]=$user;//Add user to Array of users
      }
      return $users;
    }

    public static function loginUser($email, $password){
      $db=Database::getDB();//open connection database
      $query = 'SELECT * FROM users
                WHERE email = :email and password = :password';
      $statement = $db->prepare($query);
      $statement->bindValue(':email', $email);
      $statement->bindValue(':password', $password);
      $statement->execute();
      $result = $statement->fetchAll();
      $users = array();
      foreach($result as $value){
        $user= new user($value['name'],
                $value['phone'],
                $value['email'],
                $value['password'],
                $value['roles']);
        $user->setId($value['id']);
        $users[]=$user;
      }
      return $users;
    } 

    public static function addUser($name,$phone,$email, $password,$roles){
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

    public static function updateUser($id,$name,$phone,$email,$password,$roles){
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

    public static function deleteUser($id){
      $db=Database::getDB();
      $query = 'DELETE FROM users WHERE id=:id';
      $statement = $db-> prepare($query);
      $statement->bindValue(':id',$id);
      $statement->execute();
      $statement->closeCursor();
    }

    public static function FindUser($id){
      $db=Database::getDB();
      $query = 'SELECT * FROM users WHERE id=:id';
      $statement = $db->prepare($query);
      $statement->bindValue(':id',$id);
      $statement->execute();
      $user = $statement-> fetch();
      $statement->closeCursor();
      $result= new user($user['name'],
                        $user['phone'],
                        $user['email'],
                        $user['password'],
                        $user['roles']);
      $result->setId($user['id']);
      return $result;
    }
}
?>