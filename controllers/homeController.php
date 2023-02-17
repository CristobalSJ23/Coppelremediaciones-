<?php

class HomeController{
    public function __construct(){
        
    }

    public function home(){
        require_once("views/templates/header.php");
        require_once("views/templates/menu.php");
        require_once("views/home.php");
        require_once("views/templates/footer.php");
    }
    
}

?>