<?php
class apsModel{
    public function __construct(){
        require_once('connection/connection.php');
        $con = new Connection();
        $this->con = $con->connection();
    }

    public function listAps(){
        $query = "SELECT *, if(estatus = 1, 'ACTIVO', 'INACTIVO') AS estatus_aps, if(estatus = 1, 'bg-success', 'bg-warning') AS colores_aps FROM co_aps";
        $res = mysqli_query($this->con,$query);
        $count = 0;
        if(mysqli_num_rows($res)){
        while($row=mysqli_fetch_assoc($res)){
            $data['id'][$count] = $row['id_aps'];
            $data['nombre'][$count] = $row['nombre'];
            $data['estatus_aps'][$count] = $row['estatus_aps'];
            $data['colores_aps'][$count] = $row['colores_aps'];
            $count++;
        }
    }
        return $data;
    }
}
?>