<?php

class Errors extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = "Error 404:: Page Not Found :/";
        $this->view->render('error/index');
    }
}

?>