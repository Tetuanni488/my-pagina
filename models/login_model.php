<?php

class Login_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function run()
	{
		
		$username=$_POST['username'];
		$password=md5($_POST['password']);

		echo $_POST['password'];
		
		$res= $this->db->select("users",["username", "=", $username]);		
		if ($res->count()) {

			Session::setValue('role', "user");
			Session::setValue('loggedIn', true);
			Session::setValue('user_name', $username);
			Session::setValue('password', $res[0]['password']);
			header('location: '.URL.'index/index');
		} 
		else {
			echo "no";  
			Session::setValue('loggedIn', false);
			header('location: '.URL);
		}
		
		
	}
		
}