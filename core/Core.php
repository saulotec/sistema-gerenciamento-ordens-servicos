<?php
class Core {
    public function rum() {
       
        $url = '/';
        if(isset($_GET['url'])) { // se a URL estiver definida, eu vou concatenar ela com uma /, exemplo /url, caso não tiver nada na url, minha url é uma /.
            $url .= $_GET['url'];
        }

        $params = array();  
        if(!empty($url) && $url != '/') { // se a url não estiver vazia e for diferente de uma /barra segue o bloco de  comando.
            $url = explode('/',$url);
             array_shift($url);

             $currentController = $url[0].'Controller';

             array_shift($url); // como eu já peguei meu Controller, eu elimino ele em seguida para poder pegar meu action, que será minha $url[0].

            if(isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
                array_shift($url);
            }else{
                $currentAction ='index';
            }

            if(count($url) > 0){
                $params = $url[0];
            }
           

        }else{ //caso contrário defino minhas variáveis conforme abaixo, a parte inicial do meu sistema/site controller com home e action cmo index.
            $currentController = 'homeController';
            $currentAction = 'index';
        }

        if(!file_exists('controllers/'.$currentController.'.php') || !method_exists($currentController, $currentAction)) {
            $currentController = 'notfoundController';
            $currentAction = 'index';
        }

        //print_r($url);

        //echo "<hr>";

        //echo "CONTROLLER: ".$currentController."<br/>";
        //echo "ACTION: ".$currentAction."<br/>";
        //echo "PARAMS: ".print_r($params[0], true)."<br/>";

        $c = new $currentController();

        call_user_func(array($c, $currentAction), $params);
    }
}