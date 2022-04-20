<?php
	/*
		Clase de conexión a MySQL con PDO
		Marko Robles
		Códigos de Programación
	*/
	class Connection extends PDO
	{
		private $host = 'localhost';
		private $database = 'mi_base_de_datos';
		private $username = 'root';
		private $password = 'password';
		private $message = "";
		
		public function __construct()
		{
			try  
			{  
				$connect = new PDO("mysql:host=$this->host; dbname=$this->database", $this->username, $this->password);  
				$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
				if(isset($_POST["login"]))  
				{  
					if(empty($_POST["username"]) || empty($_POST["password"]))  
					{  
							$message = '<label>All fields are required</label>';
							printf($message);
					}  
					else  
					{  
							$query = "SELECT * FROM users WHERE username = :username AND password = :password";  
							$statement = $connect->prepare($query);  
							$statement->execute(  
								array(  
									'username'     =>     $_POST["username"],  
									'password'     =>     $_POST["password"]  
								)  
							);  
							$count = $statement->rowCount();  
							if($count > 0)  
							{  
								$_SESSION["username"] = $_POST["username"];  
								header("location:login_success.php");  
							}  
							else  
							{  
								$message = '<label>Wrong Data</label>';  
							}  
					}  
				}  
			}  
			catch(PDOException $error)  
			{  
				$message = $error->getMessage();  
			}
		}
	}
?>