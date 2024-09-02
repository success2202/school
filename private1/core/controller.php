<?php
//main contoller class
class controller{
    //getting the controller class name
    public function controller_name(){
        return get_class($this);
    }

    public function view($view,$data = array()){
        extract($data);
        if(file_exists("../private1/views/" . $view . ".view.php")){
            require("../private1/views/" . $view . ".view.php");
        }else{
            require("../private1/views/404.view.php");
        }
    }

    public function load_model($model){
        if(file_exists("../private1/models/".ucfirst($model).".php")){
            require("../private1/models/".ucfirst($model).".php");
            return $model = new $model();
        }
        return false;
    }
   
    public function redirect($link){
        header("location: ". ROOT . "/".trim($link,"/"));
        die;

    }
}