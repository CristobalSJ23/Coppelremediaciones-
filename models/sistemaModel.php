<?php
class sistemaModel{
    public function __construct()
    {
        require_once("connection/connection.php");
        $con = new Connection();
        $this->con = $con->connection();
    }
    public function getSistema(){
        $query = "SELECT * FROM co_sistemas";
        $res = mysqli_query($this->con, $query);
        $i = 0;
        if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){
                $data['id'][$i] = $row['id_sistema'];
                $data['nombre'][$i] = $row['nombre'];
                $data['url'][$i] = $row['url'];
                $data['checkmarx'][$i] = $row['checkmarx'];
                $data['estatus'][$i] = $row['estatus'];
                $data['aprovado'][$i] = $row['vobo'];
                $data['fuente'][$i] = $row['fuente'];
                $data['observacion'][$i] = $row['observacion'];
                $i++;
            }
        }
        return $data;

    }
}
?>