<?php
class planpruebasModel{
    public function __construct(){
        require_once('connection/connection.php');
        $con = new Connection();
        $this->con = $con->connection();
    }
       public function getPlan(){
        $query = "SELECT ce.estatus,ca.nombre,'prueba' AS descripcion, cs.url, 
        'arquitecto' AS arquitecto,'programador' AS programador, 'tester' AS tester,
        'gerente' AS gerente,'usuario' AS usuario,'Jefe de area' AS Jefearea,
        p.fecha_pdp
        FROM pdp p 
        INNER JOIN co_sistemas cs ON p.id_sis_pdp = cs.id_sistema 
        INNER JOIN co_catalogo_estatus ce ON cs.id_cat_estatus = ce.id_estatus
        INNER JOIN co_aps ca ON cs.id_aps = ca.id_aps 
        "
       }
    public function create(){
        
    }

    public function update(){
        
    }

    public function delete(){
        
    }
}
?>