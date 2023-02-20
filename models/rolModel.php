<?php
class RolModel{
    public function __construct(){
        require_once("connection/connection.php");
        $con = new Connection();
        $this->con = $con->connection();
    }
    public function saveRol($rol,$menus,$submenus){
        $query_roles = "INSERT INTO co_roles (nombre, fecha_reg, estatus)
                        VALUES('$rol', CURDATE(), 1)";

        $query_get_id_count = "SELECT count(id_rol) FROM co_roles";
        $res_id_count = mysqli_query($this->con,$query_get_id_count);
        $arreglo_id_count = mysqli_fetch_assoc($res_id_count);
        $id_count = (int)$arreglo_id_count["count(id_rol)"];
        $new_id = $id_count + 1;

        $query_base = "INSERT INTO co_rel_rol_menu (id_rol, id_menu, json_submenu) VALUES";
        foreach($menus as $i=>$elem){
            $query_get_menu_id = 
            "SELECT id_menu 
             FROM co_menus 
             WHERE nombre='".$elem."'";
            $res_get_menu_id = mysqli_query($this->con,$query_get_menu_id);
            $arreglo_get_menu_id = mysqli_fetch_assoc($res_get_menu_id);
            $menu_id = $arreglo_get_menu_id['id_menu'];
            
            $query_contador = 
            "SELECT count(*) as total 
             FROM co_submenus 
             WHERE id_menu='".$menu_id."'";
            $res_contador = mysqli_query($this->con,$query_contador);
            $arreglo_contador = mysqli_fetch_assoc($res_contador);
            $contador = (int)$arreglo_contador['total'];

            var_dump($contador);

            $submenus_arr = '';
            foreach($submenus as $j=>$sub){
                $query_get_info_submenu = 
                "SELECT id_submenu, id_menu 
                 FROM co_submenus 
                 WHERE nombre='".$sub."' 
                 AND id_menu='".$menu_id."'";
                $res_get_info_submenu = mysqli_query($this->con,$query_get_info_submenu);
                $arreglo_get_info_submenu = mysqli_fetch_assoc($res_get_info_submenu);
                $submenus_arr .= $arreglo_get_info_submenu["id_submenu"];
                // if($j==($contador-1)){
                //     $submenus_arr = $submenus_arr.$arreglo_get_info_submenu["id_submenu"];
                // } else {
                //     $submenus_arr = $submenus_arr.$arreglo_get_info_submenu["id_submenu"].",";
                // }
            }

            $submenus_json = json_encode(array('id' => $submenus_arr));
            $query_menus = "('$new_id','$menu_id','$submenus_json')";
            var_dump($query_menus);
        }
        exit();
        $res = mysqli_query($this->con,$query_roles);
        return $data['guardado']=$res;
    }
}
?>