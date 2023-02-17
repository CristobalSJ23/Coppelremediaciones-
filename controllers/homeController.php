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
            echo "<pre>";
            var_dump($menu);
            foreach($menu as $i=>$men){
            echo $men[$i]['json_submenu'];
            // $decode = json_decode($men['json_submenu'][$i]);
            // // echo $decode->id;
            // $id_submenu = explode(",",$decode->id);
            // foreach($id_submenu as $id){
            //     $submenu = $this->menu->getSubMenu($id);
                
            //     }
            }
            // var_dump($id_submenu);
            exit;
            require_once("views/templates/header.php");
            require_once("views/templates/menu.php");
            require_once("views/home.php");
            require_once("views/templates/footer.php");
        }
        
    }

?>