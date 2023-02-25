<?php
class userModel{

    public function __construct()
    {
      require_once("connection/connection.php");
      $con = new Connection();
        $this->con = $con->connection();  
    }

    public function getusers(){
        $query = "SELECT *, if(estatus=1,'ACTIVO','INACTIVO') AS estatusUser, if(estatus=1, 'bg-success', 'bg-warning') AS estilosUser FROM co_usuarios";
        $res = mysqli_query($this->con, $query);
        $i = 0;
        while($row = mysqli_fetch_assoc($res)){
            $data["id_usuario"][$i]=$row['id_usuario'];
            $data["nombre"][$i]=$row['nombre'];
            $data["apt_pat"][$i]=$row['apt_pat'];
            $data["apt_mat"][$i]=$row['apt_mat'];
            $data["tipo_usuario"][$i]=$row['tipo_usuario'];
            $data["correo"][$i]=$row['correo'];
            $data["fecha_reg"][$i]=$row['fecha_reg'];
            $data["fecha_up"][$i]=$row['fecha_up'];
            $data["fecha_de"][$i]=$row['fecha_de'];
            $data["estatus"][$i]=$row['estatus'];
            $data["estatusUser"][$i]=$row['estatusUser'];
            $data["bg"][$i]=$row['estilosUser'];
            $i++;
        }
        return $data;
    }
}
?>