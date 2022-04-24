<?php



class Signup extends SessionController{

    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->render('login/signup');
    }

    function newUser(){
        $data = [
            "username" => "",
            "email" => "",
            "password" => "",
            "confirmPassword" => "",
            "usernameError" => "",
            "emailError" => "",
            "passwordError" => "",
            "confirmPasswordError" => "",

        ];

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $_POST = filter_input_array(preg_replace('/[^a-zA-Z0-9 ]/', '', INPUT_POST));

            $user = new User_Model();

            $data = [
                "username" => trim($this->getPost('username')),
                "email" => trim($this->getPost('email')),
                "password" => trim($this->getPost('password')),
                "confirmPassword" => trim($this->getPost('confirmPassword')),
                "usernameError" => "",
                "emailError" => "",
                "passwordError" => "",
                "confirmPasswordError" => "",

            ];
            
            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
            
            //Validar nombre de usuario
            if(empty($data["username"])){
                $data["usernameError"] = 'Please enter a name.';
            }elseif(!preg_match($nameValidation, $data["username"])){
                $data["usernameError"] = 'Name can only contain letters and numbers.';
            }

            //Validar email
            if(empty($data["email"])){
                $data["emailError"] = 'Please enter a email.';
            }elseif(!filter_var($data["email"], FILTER_VALIDATE_EMAIL)){
                $data["emailError"] = 'Please enter the correct format. example: user@example.com';
            }else{
                if($user->findUserByEmail($data["email"])){
                    $data["emailError"] = "This email is already used.";
                }
            }

            //Validar contraseña
            if(empty($data["password"])){
                $data["passwordError"] = 'Please enter a password.';
            }elseif(strlen($data["password"]) < 6){
                $data["passwordError"] = 'Password must be at least 8 characters.';
            }elseif(preg_match($passwordValidation, $data["password"])){
                $data["passwordError"] = 'Password must have at least one numeric value.';
            }

            //Validar confirmar contraseña
            if(empty($data["confirmPassword"])){
                $data["confirmPasswordError"] = 'Please enter a password.';
            }else{
                if($data["password"] != $data["confirmPassword"]){
                    $data["confirmPasswordError"] = 'Passwords do not match.';
                }
            }

            //Validar si no hay errores
            if(empty($data["usernameError"]) && empty($data["emailError"]) &&
            empty($data["passwordError"]) && empty($data["confirmPasswordError"])){
                //Asignar datos al objeto usuario
                $user->setUsername($data["username"]);
                $user->setPassword($data["password"]);
                $user->setEmail($data["email"]);
                $user->setRole("user");

                //Guardar los datos en MySQL.
                $user->save();
                $this->initialize($user);
            }else{
                $this->view->render('login/signup',$data);
            }
            
        }else{
            // error, cargar vista con errores
            //$this->errorAtSignup('Ingresa nombre de usuario y password');
            $this->redirect('signup', ['error' => Errors::ERROR_SIGNUP_NEWUSER_EXISTS]);
        }
    }
}

?>