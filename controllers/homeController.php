<?php
    session_start();
    class HomeController{
        public function __construct(){
            
            if(isset($_SESSION) && ($_SESSION['id']) != 0) {
               require_once("models/menuModel.php");
                $this->menu = new  MenuModel();

            } else {
                header("Location: index.php");
            }
        }

        public function home(){
            $menu = $this->menu->getMenu($_SESSION['rol']);
            require_once("views/templates/header.php");
            require_once("views/templates/menu.php");
            require_once("views/home.php");
            require_once("views/templates/footer.php");
        }
        
    }

?>