
<?php

class Controller{

    function __construct(){
        $this->view = new View();
        //echo "<p>Controlador principal</p>";
    }

    function loadModel($model){
        $url = 'models/'.$model.'_model.php';

        if(file_exists($url)){
            require $url;
            
            $modelName = $model.'_Model';
            $this->model = new $modelName();
        }
    }
}

?>