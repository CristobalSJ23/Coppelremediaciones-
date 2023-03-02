<?php
class sistemaModel{
    public function __construct()
    {
        require_once("connection/connection.php");
        $con = new Connection();
        $this->con = $con->connection();
    }
    public function getSistema(){
        $query = "SELECT * FROM co_sistemas s INNER JOIN co_catalogo_estatus ce ON s.id_cat_estatus = ce.id_estatus";
        $res = mysqli_query($this->con, $query);
        $i = 0;
        if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){
                $data['id'][$i] = $row['id_sistema'];
                $data['nombre'][$i] = $row['nombre'];
                $data['url'][$i] = $row['url'];
                $data['checkmarx'][$i] = $row['checkmarx'];
                $data['estatus'][$i] = $row['estatus'];
                $data['id_catE'][$i] = $row['id_cat_estatus'];
                $data['aprovado'][$i] = $row['vobo'];
                $data['fuente'][$i] = $row['fuente'];
                $data['observacion'][$i] = $row['observacion'];
                $i++;
            }
        }
        return $data;
    }

    public function updateSistema($idSistema,$idEstatus) {
        $query = "UPDATE co_sistemas SET id_cat_estatus = $idEstatus WHERE id_sistema = $idSistema";
        $res = mysqli_query($this->con, $query);
        return true;
    }
}
?>