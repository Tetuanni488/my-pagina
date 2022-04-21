<?php

class Login_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function run()
	{
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$username=$_POST['username'];
			$password=md5($_POST['password']);
			
			$query = $this->db->connect()->prepare("SELECT FROM users WHERE username = :username AND password = :password");

            $query->execute([':username' => $id, ':password' => $password]);
			if ($row = $query->fetch()) {

				// Session::setValue('role', "user");
				// Session::setValue('loggedIn', true);
				// Session::setValue('user_name', $username);
				// Session::setValue('password', $res[0]['password']);
				header('location: '.$URL.'index');
			} 
			else {
				// Session::setValue('loggedIn', false);
				header('location: '.$URL.'login');
			}
		}
	}
		
}