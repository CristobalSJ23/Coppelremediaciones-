<?php
class planpruebasModel{
    public function __construct(){
        require_once('connection/connection.php');
        $con = new Connection();
        $this->con = $con->connection();
    }
       public function getPlan(){
        $query = "SELECT DISTINCT p.id_pdp AS idpdp,ce.id_estatus AS idest, ce.estatus AS est ,ca.nombre AS nm,
        'prueba' AS descripcion, cs.url AS urlSis, 
        ca.id_arquitecto AS arquitecto,
        rel.id_prog_asignado AS programador, 
        rel.id_tester_asignado AS tester,
        rel.id_gerente_asignado AS gerente,
        rel.id_usuario_asignado AS usuario,
        rel.id_jefe_area_asignado AS jefeArea,
        p.fecha_pdp AS fepdp,
        cs.id_sistema
        FROM pdp p 
        INNER JOIN co_sistemas cs ON p.id_sis_pdp = cs.id_sistema 
        INNER JOIN co_catalogo_estatus ce ON cs.id_cat_estatus = ce.id_estatus
        INNER JOIN co_aps ca ON cs.id_aps = ca.id_aps
        INNER JOIN co_r_sist_usu rel ON rel.id_sistema = cs.id_sistema
        ORDER BY p.id_pdp";
        $res = mysqli_query($this->con, $query);
        $i = 0;
        if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){
                $data['idpdp'][$i] = $row['idpdp'];
                $data['idestatus'][$i] = $row['idest'];
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
                $data['idsistema'][$i] = $row['id_sistema'];
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
        $query_pdp = "UPDATE pdp SET
        fecha_pdp='".$datos['fecha_pdp']."', 
        fecha_pruebas_pdp='".$datos['fecha_pruebas_pdp']."',
        fecha_aprobacion_pdp='".$datos['fecha_aprobacion_pdp']."', 
        nueva_version_pdp='".$datos['nueva_version_pdp']."',
        version_anterior_pdp='".$datos['version_anterior_pdp']."', 
        resultado_pdp='".$datos['resutado_pdp']."',
        notas_asignacion_pdp='".$datos['notas_asignacion_pdp']."', 
        bitacora_pdp='".$datos['bitacora_pdp']."',
        version_historial_pdp='".((int)$datos['version_historial_pdp']+1)."' 
        WHERE id_pdp='".$datos['id']."'";
        
        $query_sis = "UPDATE co_sistemas SET
        id_cat_estatus='".$datos['selectEstatus']."'
        WHERE id_sistema='".$datos['idsis']."'";
        
        $query_sist_usu = "UPDATE co_r_sist_usu SET
        id_prog_asignado='".$datos['selectProg']."',
        id_tester_asignado='".$datos['selectTest']."',
        id_gerente_asignado='".$datos['selectGer']."',
        id_jefe_area_asignado='".$datos['selectJefe']."',
        id_usuario_asignado='".$datos['selectUsuario']."'
        WHERE id_sistema='".$datos['idsis']."'";
        
        mysqli_query($this->con,$query_pdp);
        mysqli_query($this->con,$query_sis);
        mysqli_query($this->con,$query_sist_usu);
        return true;
    }

    public function delete(){
        
    }
}
?>