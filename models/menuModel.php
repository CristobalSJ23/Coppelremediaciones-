<?php 
    class MenuModel {
        public function __construct() {
            require_once("connection/connection.php");
            $con = new Connection();
            $this->con = $con->connection();
        } 

        public function getMenu($rol) {
            // $prueba=[];
            // array_push($prueba,array('id'=>1));
            // array_push($prueba,array('id'=>2));
            // array_push($prueba,array('id'=>3));
            // $prueba2= json_encode($prueba);
            // // $var = array('id'=>1,'id'=>2,'id'=>3);
            // // $var1 = json_encode($var);
            // $query = "INSERT INTO prueba (json) VALUES ('$prueba2')";
            // $res = mysqli_query($this->con,$query);
            // exit;
            $query = "SELECT 
                    cm.nombre AS nombre, cm.orden AS orden, crrm.json_submenu AS json_submenu 
            FROM co_rel_rol_menu crrm 
            INNER JOIN co_menus cm ON crrm.id_menu = cm.id_menu
            WHERE crrm.id_rol = $rol AND cm.estatus = 1";
            $res = mysqli_query($this->con,$query);
            $i = 0;
            while($row = mysqli_fetch_assoc($res)) {
                $data['nombre_menu'][$i] = $row['nombre'];
                $data['orden_menu'][$i] = $row['orden'];
                $data['json_submenu'][$i] = $row['json_submenu'];
                $i++;
            }

            return $data;
        }
    }

?>