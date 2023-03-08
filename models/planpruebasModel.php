<?php
class planpruebasModel{
    public function __construct(){
        require_once('connection/connection.php');
        $con = new Connection();
        $this->con = $con->connection();
    }
       public function getPlan(){
        $query = "SELECT DISTINCT p.id_pdp AS idpdp, ce.estatus AS est ,ca.nombre AS nm,'prueba' AS descripcion, cs.url AS urlSis, 
        'arquitecto' AS arquitecto,'programador' AS programador, 'tester' AS tester,
        'gerente' AS gerente,'usuario' AS usuario,'Jefe de area' AS jefeArea,
        p.fecha_pdp AS fepdp
        FROM pdp p 
        INNER JOIN co_sistemas cs ON p.id_sis_pdp = cs.id_sistema 
        INNER JOIN co_catalogo_estatus ce ON cs.id_cat_estatus = ce.id_estatus
        INNER JOIN co_aps ca ON cs.id_aps = ca.id_aps 
        ORDER BY p.id_pdp";
        $res = mysqli_query($this->con, $query);
        $i = 0;
        if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){
                $data['idpdp'][$i] = $row['idpdp'];
                $data['estatus'][$i] = $row['est'];
                $data['nombre'][$i] = $row['nm'];
                $data['descripcion'][$i] = $row['descripcion'];
                $data['url'][$i] = $row['urlSis'];
                $data['arquitecto'][$i] = $row['arquitecto'];
                $data['programador'][$i] = $row['programador'];
                $data['tester'][$i] = $row['tester'];
                $data['gerente'][$i] = $row['gerente'];
                $data['usuario'][$i] = $row['usuario'];
                $data['jefeArea'][$i] = $row['jefeArea'];
                $data['fecha_pdp'][$i] = $row['fepdp'];
                $i++;

            }
        }
        return $data;
       }
    public function create(){
        
    }

    public function update(){
        
    }

    public function delete(){
        
    }
}
?>