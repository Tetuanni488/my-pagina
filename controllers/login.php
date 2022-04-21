<?php

class Login extends Controller {

	public function __construct() {
		parent::__construct();
		$this->view->message = "";
        // Session::init();
	}
	
	
	function render(){
        $this->view->render('login/index');
		$this->run();
    }
	
	function run()
	{
		$this->model->run();

		// if ($res == false){
		// 	$this->accessError();
		// }
	}

	function accessError(){
		$this->view->message = "Usuario no valido.";
	}
	
	
	/* logging out the user */
	function logout()
	{
		Session::destroy();
		header('location: index');
		exit;
	}
}