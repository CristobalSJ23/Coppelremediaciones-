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
        $res_roles = mysqli_query($this->con,$query_roles);

        $query_get_total_roles = "SELECT count(id_rol) FROM co_roles";
        $res_total_roles = mysqli_query($this->con,$query_get_total_roles);
        $arreglo_total_roles = mysqli_fetch_assoc($res_total_roles);
        $total_roles = (int)$arreglo_total_roles["count(id_rol)"];

        $query_base = "INSERT INTO co_rel_rol_menu (id_rol, id_menu, json_submenu) VALUES";
        foreach($menus as $i=>$elem){
            $query_get_menu_id = 
            "SELECT id_menu 
             FROM co_menus 
             WHERE nombre='".$elem."'";
            $res_get_menu_id = mysqli_query($this->con,$query_get_menu_id);
            $arreglo_get_menu_id = mysqli_fetch_assoc($res_get_menu_id);
            $menu_id = $arreglo_get_menu_id['id_menu'];

            $submenus_arr = array();
            foreach($submenus as $j=>$sub){
                $query_get_info_submenu = 
                "SELECT id_submenu
                 FROM co_submenus 
                 WHERE nombre='".$sub."' 
                 AND id_menu='".$menu_id."'";
                $res_get_info_submenu = mysqli_query($this->con,$query_get_info_submenu);
                $arreglo_get_info_submenu = mysqli_fetch_assoc($res_get_info_submenu);
                
                if($arreglo_get_info_submenu != NULL){
                    array_push($submenus_arr,$arreglo_get_info_submenu["id_submenu"]);
                }
            }

            $csv = implode(",",$submenus_arr);
            $submenus_json = json_encode(array('id' => $csv));
            $query_menus = "('$total_roles','$menu_id','$submenus_json')";
            $res = mysqli_query($this->con,$query_base.$query_menus);
            if(!$res){
                echo "fallo de insersion";
            }
        }
        return $data['guardado']=$res;
    }


    public function read(){

        $query= "SELECT *, if(estatus=1,'ACTIVO','INACTIVO') AS estatus_rol,
                    if(estatus=1,'bg-success','bg-warning') AS estyles_rol
                    FROM co_roles;";
        $res = mysqli_query($this->con,$query);
        $i=0;
        if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_assoc($res)){
            $data['id'][$i] = $row['id_rol'];
            $data['nombre'][$i] = $row['nombre'];
            $data['fecha_reg'][$i] = $row['fecha_reg'];
            $data['fecha_up'][$i] = $row['fecha_up'];
            $data['fecha_de'][$i] = $row['fecha_de'];
            $data['estatus'][$i] = $row['estatus_rol'];
            $data['bg'][$i] = $row['estyles_rol'];
            $i++;
        }
    }
        return $data;
    }
     public function update($datos){
       
        $fecha = getdate();
        $fecha_update = $fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];
        $query = "UPDATE co_roles SET nombre='".$datos['nombre']."', estatus=".$datos['estatus'].", fecha_up='".$fecha_update."' WHERE id_rol='".$datos['id']."'";
        
        $res = mysqli_query($this->con, $query);
        return true;
    }


   /*  public function getAllMenu(){
        $query "SELECT * FROM co_menus";
        $res=mysqli_query($this->con,$query);
        

    } */
}
?>