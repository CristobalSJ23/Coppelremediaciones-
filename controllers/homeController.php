<?php
    session_start();
    class homeController{
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
            foreach($menu['id_rol'] as $i=>$men) {
                $decode = json_decode($menu['json_submenu'][$i]);
                $id_submenu = explode(",",$decode->id);
                
                foreach($id_submenu as $id) {
                    $submenu = $this->menu->getSubMenu(implode(",", $id_submenu));               
                    $menu['submenu'][$i] = $submenu;                    
                }             
            }
            require_once("views/templates/header.php");
            require_once("views/templates/menu.php");
            require_once("views/home.php");
            require_once("views/templates/footer.php");
        }
        
    }

?>