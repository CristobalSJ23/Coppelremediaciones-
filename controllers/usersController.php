<?php
    session_start();
 class usersController{
    public function __construct()
    {
        $this->js='../assets/js/user.js';
        require_once("models/menuModel.php");
        $this->menu = new  MenuModel();
        
        require_once("models/userModel.php");
        $this->users = new userModel();

        require_once("models/rolModel.php");
        $this->rol = new RolModel();
    }

    public function list(){

        $menu = $this->menu->getMenu($_SESSION['rol']);
        foreach($menu['id_rol'] as $i=>$men) {
            $decode = json_decode($menu['json_submenu'][$i]);
            $id_submenu = explode(",",$decode->id);
            
            foreach($id_submenu as $id) {
                $submenu = $this->menu->getSubMenu(implode(",", $id_submenu));
                $menu['submenu'][$i] = $submenu;                    
            }             
        }

        $resMenu=$this->menu->getAllMenu();  
        foreach($resMenu['id'] as $i=>$rm) {          
            $resMenu['submenu'][$i] = $this->menu->getAllSubmenu($rm);  
        }
        $roles = $this->rol->read();
        $res = $this->users->getusers();
        require_once("views/templates/header.php");
        require_once("views/templates/menu.php");
        require_once("views/user.php");
        require_once("views/templates/footer.php");

    }


    public function update(){
        
        $res = $this->users->update($_POST);
      $data["res"] = "Tu registro se ha actualizado correctamente";
      echo json_encode($data); 
    }

    public function save() {
        $id = $this->users->saveUser($_POST);
        $res = $this->users->saveUserRol($id,$_POST["rol"]);
        $data["res"] = "Registro agregado correctamente";
        echo json_encode($data);
    }

    public function delete() {
        $res = $this->users->deleteUser($_POST["idUser"]);
        echo json_encode($res);
    }


 }
?>