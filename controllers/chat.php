<?php

class Chat extends SessionController{
    private $user;
    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();;
    }

    function render(){
        $this->view->render('chat/index',[
            'user'                 => $this->user
        ]);
    }
}

?>