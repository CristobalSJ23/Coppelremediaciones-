<?php
session_start();
class RolController{
    public function __construct(){
        if(isset($_SESSION) && ($_SESSION['id']) != 0) {
            require_once("models/menuModel.php");
            require_once("models/rolModel.php");
            $this->menu = new  MenuModel();
            $this->rol = new  RolModel();

         } else {
             header("Location: index.php");
         }
    }

    public function rol($datos = null){
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
        require_once("views/rol.php");
        require_once("views/templates/footer.php");
    }

    public function saveRol($datos){
        if(empty($datos['nombre'])){
            $data['errorRol'] = 'Error. Debe escribir un nombre para el rol';
            return $data;
        }
        $res = $this->rol->saveRol($datos['nombre']);
        return $res;
    }
}
?>