<?php
session_start();
class apsController{
    public function __construct(){
        $this->js='../assets/js/aps.js';
        require_once("models/menuModel.php");
        $this->menu = new  MenuModel();
        require_once('models/apsModel.php');
        $this->aps = new apsModel();
    }

    public function aps(){
        $menu = $this->menu->getMenu($_SESSION['rol']);
        foreach($menu['id_rol'] as $i=>$men) {
            $decode = json_decode($menu['json_submenu'][$i]);
            $id_submenu = explode(",",$decode->id);
            
            foreach($id_submenu as $id) {
                $submenu = $this->menu->getSubMenu(implode(",", $id_submenu));
                $menu['submenu'][$i] = $submenu;                    
            }             
        }
        $res = $this->aps->listAps();
        require_once("views/templates/header.php");
        require_once("views/templates/menu.php");
        require_once("views/aps.php");
        require_once("views/templates/footer.php");
        
    }

    public function edit() {
        $res = $this->aps->editAps($_POST);
        $data["res"] = "Tu registro se ha actualizado correctamente";
        echo json_encode($data); 
    }
}
?>