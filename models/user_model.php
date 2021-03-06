<?php

class User_Model extends Model implements IModel{

    private $id;
    private $username;
    private $password;
    private $role;
    private $email;
    // private $budget;
    // private $photo;
    // private $name;

    public function __construct(){
        parent::__construct();

        $this->username = '';
        $this->password = '';
        $this->role = '';
        $this->email = '';
        // $this->budget = 0.0;
        // $this->photo = '';
        // $this->name = '';
    }

    
    // function updateBudget($budget, $iduser){
    //     try{
    //         $query = $this->db->connect()->prepare('UPDATE users SET budget = :val WHERE id = :id');
    //         $query->execute(['val' => $budget, 'id' => $iduser]);

    //         if($query->rowCount() > 0){
    //             return true;
    //         }else{
    //             return false;
    //         }
        
    //     }catch(PDOException $e){
    //         return NULL;
    //     }
    // }

    // function updateName($name, $iduser){
    //     try{
    //         $query = $this->db->connect()->prepare('UPDATE users SET name = :val WHERE id = :id');
    //         $query->execute(['val' => $name, 'id' => $iduser]);

    //         if($query->rowCount() > 0){
    //             return true;
    //         }else{
    //             return false;
    //         }
        
    //     }catch(PDOException $e){
    //         return NULL;
    //     }
    // }

    // function updatePhoto($name, $iduser){
    //     try{
    //         $query = $this->db->connect()->prepare('UPDATE users SET photo = :val WHERE id = :id');
    //         $query->execute(['val' => $name, 'id' => $iduser]);

    //         if($query->rowCount() > 0){
    //             return true;
    //         }else{
    //             return false;
    //         }
        
    //     }catch(PDOException $e){
    //         return NULL;
    //     }
    // }

    function updatePassword($new, $iduser){
        try{
            $hash = password_hash($new, PASSWORD_DEFAULT, ['cost' => 10]);
            $query = $this->db->connect()->prepare('UPDATE users SET password = :val WHERE id = :id');
            $query->execute(['val' => $hash, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    function comparePasswords($current, $userid){
        try{
            $query = $this->db->connect()->prepare('SELECT id, password FROM users WHERE id = :id');
            $query->execute(['id' => $userid]);
            
            if($row = $query->fetch(PDO::FETCH_ASSOC)) return password_verify($current, $row['password']);

            return NULL;
        }catch(PDOException $e){
            return NULL;
        }
    }



    public function save(){
        try{
            $query = $this->prepare('INSERT INTO users (username, password, role, email) VALUES(:username, :password, :role, :email)');
            $query->execute([
                'username'  => $this->username, 
                'password'  => $this->password,
                'role'      => $this->role,
                'email'      => $this->email,
                // 'budget'    => $this->budget,
                // 'photo'     => $this->photo,
                // 'name'      => $this->name
                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    } 

    public function getAll(){
        $items = [];

        try{
            $query = $this->query('SELECT * FROM users');

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new User_Model();
                $item->setId($p['id']);
                $item->setUsername($p['username']);
                $item->setPassword($p['password'], false);
                $item->setRole($p['role']);
                $item->setEmail($p['email']);
                // $item->setBudget($p['budget']);
                // $item->setPhoto($p['photo']);
                // $item->setName($p['name']);
                

                array_push($items, $item);
            }
            return $items;


        }catch(PDOException $e){
            echo $e;
        }
    }

    /**
     *  Gets an item
     */
    public function get($id){
        try{
            $query = $this->prepare('SELECT * FROM users WHERE id = :id');
            $query->execute([ 'id' => $id]);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            $this->id = $user['id'];
            $this->username = $user['username'];
            $this->password = $user['password'];
            $this->role = $user['role'];
            $this->email = $user['email'];
            // $this->budget = $user['budget'];
            // $this->photo = $user['photo'];
            // $this->name = $user['name'];

            return $this;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        try{
            $query = $this->prepare('DELETE FROM users WHERE id = :id');
            $query->execute([ 'id' => $id]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function update(){
        try{
            $query = $this->prepare('UPDATE users SET username = :username, password = :password, email = :email WHERE id = :id');
            $query->execute([
                'id'        => $this->id,
                'username' => $this->username, 
                'password' => $this->password,
                'email' => $this->email,
                // 'budget' => $this->budget,
                // 'photo' => $this->photo,
                // 'name' => $this->name
                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function exists($email){
        try{
            $query = $this->prepare('SELECT email FROM users WHERE email = :email');
            $query->execute( ['email' => $email]);
            
            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function findUserByEmail($email){
        try {
            $query = $this->prepare('SELECT * FROM users WHERE email = :email');
            $query->execute( ['email' => $email]);
            
            if($query->rowCount() > 0){
                $user = $query->fetch(PDO::FETCH_ASSOC);
                return $user;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    public function findUserByUsername($username){
        try {
            $query = $this->prepare('SELECT * FROM users WHERE username = :username');
            $query->execute( ['username' => $username]);
            
            if($query->rowCount() > 0){
                $user = $query->fetch(PDO::FETCH_ASSOC);
                return $user;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

    public function from($array){
        $this->id = $array['id'];
        $this->username = $array['username'];
        $this->password = $array['password'];
        $this->role = $array['role'];
        $this->email = $array['email'];
        // $this->budget = $array['budget'];
        // $this->photo = $array['photo'];
        // $this->name = $array['name'];
    }

    public function getHashedPassword($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function setUsername($username){ $this->username = $username;}
    //FIXME: validar si se requiere el parametro de hash
    public function setPassword($password, $hash = true){ 
        if($hash){
            $this->password = $this->getHashedPassword($password);
        }else{
            $this->password = $password;
        }
    }
    public function setId($id){             $this->id = $id;}
    public function setRole($role){         $this->role = $role;}
    public function setEmail($email){         $this->email = $email;}
    // public function setBudget($budget){     $this->budget = $budget;}
    // public function setPhoto($photo){       $this->photo = $photo;}
    // public function setName($name){         $this->name = $name;}

    public function getId(){        return $this->id;}
    public function getUsername(){  return $this->username;}
    public function getPassword(){  return $this->password;}
    public function getRole(){      return $this->role;}
    public function getEmail(){      return $this->email;}
    // public function getBudget(){    return $this->budget;}
    // public function getPhoto(){     return $this->photo;}
    // public function getName(){      return $this->name;}
}

?>