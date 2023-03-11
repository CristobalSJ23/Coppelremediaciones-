<?php
class indicadoresModel{
    public function __construct(){
        require_once('connection/connection.php');
        $con = new Connection();
        $this->con = $con->connection();

    }

    public function getAvanceDiario(){
        $query = "SELECT CONCAT(u.nombre,' ',u.apt_pat, ' ',u.apt_mat) AS nombreCompleto,
        SUM(s.total_pdc) AS TotalPDC,
        SUM(s.resuelto_pdc) AS Resueltos,
        SUM(s.aprobados_pdc) AS Aprobados, (SUM(s.resuelto_pdc)/ (SUM(s.total_pdc)) * 100) AS PorcentajeResueltos,
        (SUM(s.aprobados_pdc)/ (SUM(s.resuelto_pdc)) * 100) AS PorcentajeAprobados
        FROM co_sistemas s
        INNER JOIN co_r_sist_usu su ON s.id_sistema = su.id_sistema
        INNER JOIN co_usuarios u ON su.id_prog_asignado = u.id_usuario GROUP BY u.id_usuario";

        $res = mysqli_query($this->con, $query);
        $count = 0;
        if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){
                $data['nombre'][$count] = $row['nombreCompleto'];
                $data['total'][$count] = $row['TotalPDC'];
                $data['resuelto'][$count] = $row['Resueltos'];
                $data['aprobados'][$count] = $row['Aprobados'];
                $data['pResuelto'][$count] = $row['PorcentajeResueltos'];
                $data['pAprobados'][$count] = $row['PorcentajeAprobados'];
                $count++;
            }
        }

        return $data;
    }
    
}

?>