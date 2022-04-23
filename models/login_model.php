<?php

class Login_Model extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function login($username, $password){
        // insertar datos en la BD
        try{
            //$query = $this->db->connect()->prepare('SELECT * FROM users WHERE username = :username');
            $query = $this->prepare('SELECT * FROM users WHERE username = :username');
            $query->execute(['username' => $username]);
            
            if($query->rowCount() == 1){
                $item = $query->fetch(PDO::FETCH_ASSOC); 

                $user = new User_Model();
                $user->from($item);

                error_log('login: user id '.$user->getId());
                error_log($user->getRole());

                if(md5($password) == $user->getPassword()){
                    error_log('login: success');
                    //return ['id' => $item['id'], 'username' => $item['username'], 'role' => $item['role']];
                    return $user;
                    //return $user->getId();
                }else{
                    return NULL;
                }
            }
        }catch(PDOException $e){
            return NULL;
        }
    }

    

}

?>