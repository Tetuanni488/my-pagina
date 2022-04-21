<?php

class Database{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host     = "localhost";
        $this->db       = "mi_base_de_datos";
        $this->user     = "root";
        $this->password = "password";
        // $this->charset  = constant('CHARSET');
    }

    function connect(){
    
        try{
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->password, $options);
    
            return $pdo;

        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }   
    }
}

?>