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
        if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){
                $data['id'][$count] = $row['id_aps'];
                $data['nombre'][$count] = $row['nombre'];
                $data['estatus_aps'][$count] = $row['estatus_aps'];
                $data['colores_aps'][$count] = $row['colores_aps'];
                $data['fecha_reg'][$count] = $row['fecha_reg'];
                $count++;
            }
        }
        return $data;
    }

    public function editAps($datos) {
        $query = "UPDATE co_aps SET nombre = '".$datos['nombre']."', estatus = '".$datos['estatus']."' WHERE id_aps = '".$datos["id"]."' ";
        $res = mysqli_query($this->con, $query);
        return true;
    }

    public function deleteAps($datos) { 
        $query = "UPDATE co_aps SET estatus = 0 WHERE id_aps =".$datos['idAps'];
        $res = mysqli_query($this->con,$query);
        return true;
    }

    public function saveAps($datos){
        $fecha = getdate();
        $fecha = $fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];
        $query = "INSERT INTO co_aps (nombre,estatus,fecha_reg) VALUES ('".$datos['nombre']."', 1, '$fecha')";
        $res=mysqli_query($this->con, $query);
        return true;
    }
}
?>