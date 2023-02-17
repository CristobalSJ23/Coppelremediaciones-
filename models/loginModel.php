<?php
class LoginModel{

    public function __construct()
    {
        require_once("connection/connection.php");
        $con = new Connection();
        $this->con = $con->connection();
    }

    public function validate($datos){
       $query = "select * from personas where mail_per = '".$datos['usuario']."' and pas_per ='".$datos['pass']."'";
       $res=mysqli_query($this->con,$query);
       if(mysqli_num_rows($res)>0){
            while($row = mysqli_fetch_assoc($res)){
                $data['mail'] = $row['mail_per'];
                $data['nombre'] = $row['nombre_per'];
                $data['rol'] = $row['fk_id_rol'];
                $data['id'] = $row['id_per'];

            }
       }else{
            $data['errorLogin'] = "Error al iniciar sesion";
       }
       return $data;
    }
}
?>