<?php
class Db{
    public function connect(){
        try {
            return new PDO('mysql:host=localhost;dbname=gestioncontacts', 'root', ""  );
        } catch (err) {
            return null;
        }
    }
}

class user extends Db{
  private $username;
  private $password;

  public function __construct($username,$password){
    $this->username=$username;
    $this->password=$password;
  }

  public function getUsername(){
  return $this->username;
  }
  public function setUsername($username){
  $this->username=$username;
  }
  public function getPassword(){
  return $this->password;
  }
  public function setPassword($password){
  $this->password=$password;
  }
  

  public function signup(){
    try{   
        $db = $this->connect();
        if($db == null) return null;
        $query = "INSERT INTO user(username, password) values(:username, :password)";
        $stm = $db->prepare($query);
        $stm->execute([
            ':username'=>$this->username,
            ':password'=>$this->password
        ]);
    }
    catch(Exception $e){
        return $e->getMessage();
    }
    
  }           


  public function login(){
    try{    
        $db = $this->connect();
        if($db == null) return null;
        $query = "SELECT * FROM user WHERE username = :username AND password = :password";
        $stm = $db->prepare($query);
        $stm->execute([
            ':username'=>$this->username,
            ':password'=>$this->password
        ]);
        $myUser = $stm->fetchAll(PDO::FETCH_ASSOC);
        if(count($myUser) == 0) return null;
        return $myUser[0];
    }
    catch(Exception $e){
    return $e->getMessage();
    }

        
  }


}

class contacts extends Db{
    private $id;
    private $name;
    private $phone;
    private $address;
    private $email;

    public function __construct(){}

    public function getId(){
        return $this->id;
    }
    public function setID($id){
    $this->id=$id;
    }
    public function getName(){
    return $this->name;
    }
    public function setName($name){
    $this->name=$name;
    }
    public function getPhone(){
    return $this->phone;
    }
    public function setPhone($phone){
    $this->phone=$phone;
    }
    public function getAddress(){
    return $this->address;
    }
    public function setAddress($address){
    $this->address=$address;
    }
    public function getEmail(){
    return $this->email;
    }
    public function setEmail($email){
    $this->email=$email;
    }
    
    public function fetchAll(){
        try{   
            $db = $this->connect();
            if($db == null) return null;
            $query = "SELECT * FROM contacts WHERE id_user = :idUser";
            $stm = $db->prepare($query);
            $stm->execute([':idUser'=>$_SESSION["id"]]);
            return $stm->fetchAll();
        }
        catch(Exception $e){
            return $e->getMessage(); 
        }

    }

    public function createCmpt(){
        try{   
            $db = $this->connect();
            if($db == null) return null;
            $query = "INSERT INTO contacts(name,phone,email,address,id_user) values(:name, :phone, :email, :address, :id_user) ";
            $stm = $db->prepare($query);
            $stm->execute([
                ':name'=>$this->name,
                ':phone'=>$this->phone,
                ':email'=>$this->email,
                ':address'=>$this->address,
                ':id_user'=>$_SESSION["id"]
            ]);
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteCmpt(){
        try{   
            $db = $this->connect();
            if($db == null) return null;
            $query = "DELETE FROM contacts WHERE id=?";
            $stm = $db->prepare($query);
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        }
        catch(Exception $e){
        return $e->getMessage();
        }
    }

    public function updateCmpt(){
        try{   
            $db = $this->connect();
            if($db == null) return null;
            $query = "UPDATE contacts SET name=?,phone=?,email=?,address=? WHERE id=?";
            $stm = $db->prepare($query);
            $stm->execute([
                $this->name,
                $this->phone,
                $this->email,
                $this->address,
                $this->id
            ]);
            return $stm->fetchAll();
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
    
    public function getContactById($idConatct){
        try{   
            $db = $this->connect();
            if($db == null) return null;
            $query = "SELECT * FROM contacts WHERE id = :id";
            $stm = $db->prepare($query);
            $stm->execute([
                ':id'=> $idConatct
            ]);
            return $stm->fetchAll(PDO::FETCH_ASSOC)[0];
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

}

?>