<?php

class Login extends SessionController {

    private $user;

	public function __construct() {
		parent::__construct();
		$this->view->error = "";
        $this->user = $this->getUserSessionData();
	}
	
	
	function render(){
        $this->view->render('login/index');
    }

	function authenticate(){
        $data = [
            "email" => "",
            "password" => "",
            "emailError" => "",
            "passwordError" => "",
        ];

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $_POST = filter_input_array(preg_replace('/[^a-zA-Z0-9 ]/', '', INPUT_POST));

            $data = [
                "email" => trim($this->getPost('email')),
                "password" => trim($this->getPost('password')),
                "emailError" => "",
                "passwordError" => "",

            ];
            
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validar email
            if(empty($data["email"])){
                $data["emailError"] = 'Please enter a email.';
            }elseif(!filter_var($data["email"], FILTER_VALIDATE_EMAIL)){
                $data["emailError"] = 'Please enter the correct format. example: user@example.com';
            }

            //Validar contraseña
            if(empty($data["password"])){
                $data["passwordError"] = 'Please enter a password.';
            }

            if(empty($data["emailError"]) && empty($data["passwordError"])){
                //Iniciar sesion
                $user = $this->model->login($data["email"], $data["password"]);
                if($user != NULL){
                    $this->initialize($user);
                }else{
                    $data["emailError"] = 'The email or password are incorrect.';
                    $this->view->render('login/index',$data);
                }
            }else{
                $this->view->render('login/index',$data);
            }
        }else{
            // error, cargar vista con errores
            //$this->errorAtLogin('Error al procesar solicitud');
            error_log('Login::authenticate() error with params');
            $this->redirect('', ['error' => Errors::ERROR_LOGIN_AUTHENTICATE]);
        }
    }
	
	/* logging out the user */
	function logout()
	{
		Session::destroy();
		header('location: index');
		exit;
	}
}