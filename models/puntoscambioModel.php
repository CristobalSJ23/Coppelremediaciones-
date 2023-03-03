<?php
class puntoscambioModel{
    public function __construct(){
        require_once('connection/connection.php');
        $con = new Connection();
        $this->con = $con->connection();
    }

    public function readLenguajes(){
        $query = "SELECT * FROM lenguaje";
        $res = mysqli_query($this->con,$query);
        $i = 0;
        while($row = mysqli_fetch_assoc($res)){
            $data['id'][$i] = $row['id_leng'];
            $data['nombre'][$i] = $row['nombre_leng'];
            $data['extension'][$i] = $row['extension_leng'];
            $i++;
        }
        return $data;
    }

    public function readPalabras(){
        $query = "SELECT * 
                  FROM palabras p
                  INNER JOIN lenguaje l ON p.fk_id_leng = l.id_leng";
        $res = mysqli_query($this->con,$query);
        $i = 0;
        while($row = mysqli_fetch_assoc($res)){
            $data['id'][$i] = $row['id_pal'];
            $data['nombre'][$i] = $row['nombre_pal'];
            $data['idLeng'][$i] = $row['id_leng'];
            $data['lenguaje'][$i] = $row['nombre_leng'];
            $i++;
        }
        return $data;
    }

    public function update($datos){
        $query = "UPDATE palabras SET nombre_pal = '".$datos['nombre_pal']."' WHERE id_pal =".$datos['id'];
        $res = mysqli_query($this->con, $query);
        return true;
    }

    public function getLenguajes(){
        $query = "SELECT * FROM lenguaje";
        $res = mysqli_query($this->con, $query);
        $i = 0;
        while($row = mysqli_fetch_assoc($res)){
            $data['id'][$i] = $row['id_leng'];
            $data['nombre'][$i] = $row['nombre_leng'];
            $i++;
        }
        return $data;
    }
}
?>