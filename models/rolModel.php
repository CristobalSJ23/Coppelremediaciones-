<?php
class RolModel{
    public function __construct(){
        require_once("connection/connection.php");
        $con = new Connection();
        $this->con = $con->connection();
    }
    public function saveRol($rol){
        $query = "INSERT INTO co_roles (nombre, fecha_reg, estatus)
                  VALUES('$rol', CURDATE(), 1)";
        $res = mysqli_query($this->con,$query);
        return $data['guardado']=$res;
    }
}
?>