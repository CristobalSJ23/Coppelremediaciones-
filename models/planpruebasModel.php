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
    
    public function getEstatusNotas($id){
        $query = "SELECT nueva_version_pdp, version_anterior_pdp, resultado_pdp, notas_asignacion_pdp, 
        bitacora_pdp, version_historial_pdp, fecha_pruebas_pdp, fecha_aprobacion_pdp
        FROM pdp WHERE id_pdp = $id";
        $res = mysqli_query($this->con,$query);
        $row = mysqli_fetch_assoc($res);
        $data['nueva_version'] = $row['nueva_version_pdp'];
        $data['version_anterior'] = $row['version_anterior_pdp'];
        $data['resultado'] = $row['resultado_pdp'];
        $data['notas'] = $row['notas_asignacion_pdp'];
        $data['bitacora'] = $row['bitacora_pdp'];
        $data['version'] = $row['version_historial_pdp'];
        $data['fecha_realizacion'] = $row['fecha_pruebas_pdp'];
        $data['fecha_aprobacion'] = $row['fecha_aprobacion_pdp'];
        return $data;
    }

    public function create(){
        
    }

    public function update($datos){
        $query = "UPDATE pdp SET
        fecha_pdp='".$datos['fecha_pdp']."', fecha_pruebas_pdp='".$datos['fecha_pruebas_pdp']."',
        fecha_aprobacion_pdp='".$datos['fecha_aprobacion_pdp']."', nueva_version_pdp='".$datos['nueva_version_pdp']."',
        version_anterior_pdp='".$datos['version_anterior_pdp']."', resultado_pdp='".$datos['resutado_pdp']."',
        notas_asignacion_pdp='".$datos['notas_asignacion_pdp']."', bitacora_pdp='".$datos['bitacora_pdp']."',
        version_historial_pdp='".((int)$datos['version_historial_pdp']+1)."' WHERE id_pdp='".$datos['id']."'";
        mysqli_query($this->con,$query);
        return true;
    }

    public function delete(){
        
    }
}
?>