<?php
session_start();
class RolController{
    public function __construct(){
        if(isset($_SESSION) && ($_SESSION['id']) != 0) {
            require_once("models/menuModel.php");
            require_once("models/rolModel.php");

            $this->menu = new  MenuModel();
            $this->rol = new  RolModel();
            $this->js='../assets/js/rol.js';

         } else {
             header("Location: index.php");
         }

         
    }

    public function add($datos = null){
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
        }
        if(empty($datos['menusPrincipales'])){
            $data['errorMenus'] = 'Error. Debe seleccionar al menos un menú';
        }
        if(empty($datos['menusSecundarios'])){
            $data['errorSubMenus'] = 'Error. Debe seleccionar al menos un menú secundario';
        }
        if(isset($data)){
            return $data;
        }
        $res = $this->rol->saveRol($datos['nombre'],$datos['menusPrincipales'],$datos['menusSecundarios']);
        return $res;
    }

    public function read($datos){
        $menu = $this->menu->getMenu($_SESSION['rol']);
        foreach($menu['id_rol'] as $i=>$men) {
            $decode = json_decode($menu['json_submenu'][$i]);
            $id_submenu = explode(",",$decode->id);
            
            foreach($id_submenu as $id) {
                $submenu = $this->menu->getSubMenu(implode(",", $id_submenu));
                $menu['submenu'][$i] = $submenu;                    
            }             
        }

        $res = $this->rol->read($datos);
        $resMenu=$this->menu->getAllMenu();      
        //$resSubmenu = $this->menu->getAllSubmenu($resMenu['id']);       
        /* echo "<pre>"; 
        var_dump($resSubmenu);
        exit(); */

        require_once("views/templates/header.php");
        require_once("views/templates/menu.php");
        require_once("views/read.php");
        require_once("views/templates/footer.php");

        //return $res;
    }

    public function edit() {
      $res = $this->rol->update($_POST);
      $data["res"] = "Tu registro se ha actualizado correctamente";
      echo json_encode($data); 
    }


    public function save(){
        var_dump($_POST);
        
        
    }
}


?>