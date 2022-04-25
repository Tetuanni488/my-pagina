<?php

class App
{
    function __construct(){
        $url = isset($_GET['url'])? $_GET['url']: null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);


        //Check if the url ain't empty
        if(empty($url[0])){
            $archivoController = 'controllers/login.php';
            require $archivoController;
            $controller = new Login();
            $controller->loadModel('login');
            $controller->render();
            return false;
        }else{
            $archivoController = 'controllers/' . $url[0] . '.php';
        }

        //Checj if url file exist
        if(file_exists($archivoController)){
            require $archivoController;

            $controller = new $url[0];
            $controller->loadModel($url[0]);

            // Se obtienen el número de param
            $nparam = sizeof($url);
            // si se llama a un método
            if(isset($url[1])){
                if(method_exists($controller, $url[1])){
                    if(isset($url[2])){
                        //el método tiene parámetros
                        //sacamos e # de parametros
                        $nparam = sizeof($url) - 2;
                        //crear un arreglo con los parametros
                        $params = [];
                        //iterar
                        for($i = 0; $i < $nparam; $i++){
                            array_push($params, $url[$i + 2]);
                        }
                        //pasarlos al metodo   
                        $controller->{$url[1]}($params);
                    }else{
                        $controller->{$url[1]}();    
                    }
                }else{
                    require 'controllers/errors_.php';
                    $controller = new Errors_(); 
                }
            }else{
                $controller->render();
            }
        }else{
            require 'controllers/errors_.php';
            $controller = new Errors_();
        }
    }
    
}
?>