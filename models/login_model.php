<?php

class Login_Model extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function login($email, $password){
        // insertar datos en la BD
        try{
            $query = $this->prepare('SELECT * FROM users WHERE email = :email');
            $query->execute(['email' => $email]);
            
            if($query->rowCount() == 1){
                $item = $query->fetch(PDO::FETCH_ASSOC); 

                $user = new User_Model();
                $user->from($item);

                error_log('login: user id '.$user->getId());

                if(password_verify($password,$user->getPassword())){
                    error_log('login: success');
                    return $user;
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