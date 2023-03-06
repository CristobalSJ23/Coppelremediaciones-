<?php
require_once(__DIR__.'/../core/coreController.php');
class puntoscambioController extends coreController{
    public function __construct(){
        parent::__construct();
        $this->js='../assets/js/puntoscambio.js';
        require_once('models/puntoscambioModel.php');
        $this->puntos = new puntoscambioModel();
    }

    public function puntos(){
        $resLenguajes = $this->puntos->readLenguajes();
        $resPalabras = $this->puntos->readPalabras();
        require_once("views/templates/header.php");
        require_once("views/templates/menu.php");
        require_once("views/puntoscambio.php");
        require_once("views/templates/footer.php");
    }

    public function update(){
        $res = $this->puntos->update($_POST);
        $data['res'] = 'Tu registro se ha actualizado correctamente';
        echo json_encode($data);
    }

    public function crearSelect(){
        $res = $this->puntos->getLenguajes();
        echo json_encode($res);
    }

    public function delete(){
        $res = $this->puntos->delete($_POST["id"]);
        echo json_encode("Tu registro ha sido eliminado");
    }

    public function savePalabra(){
        $res = $this->puntos->savePalabra($_POST);
        echo json_encode("Tu registro ha sido creado");
    }

    public function saveLanguage(){
        $res = $this->puntos->saveLanguage($_POST);
        echo json_encode("Tu registro ha sido creado");
    }

    public function leerZip(){
        $path_completo = $_FILES['envioarchivos']['name'];
    $path_completo = str_replace('.zip', '', $path_completo);
   
    $ruta = $_FILES['envioarchivos']["tmp_name"];

    // Función descomprimir 
    $zip = new ZipArchive;
    if ($zip->open($ruta) === TRUE) {
        //función para extraer el ZIP
        $extraido = $zip->extractTo('uploads/');  
        $zip->close();
        $dir = opendir('uploads/'.$path_completo);
       $getPalabras = $this->puntos->getPalabrasExtension('php');

       global $resultados;
       $nombreCarpeta = 'uploads/'.$path_completo;

       $contadorPC = 0;
       $tabla = null;
       $crearTabla = array();
            if (is_dir($nombreCarpeta)) {
                if ($dh = opendir($nombreCarpeta)) {
                    $tabla.='<table class=table border=1>';
                    $tabla.="<tr><th>Nombre Archivo";
                    foreach ($getPalabras as $i => $palabra ) {
                        $crearTabla['palabra'][$i] = $palabra;
                    }
                    //$tabla.= "</tr>";
                    while (($archivo = readdir($dh)) ) {
                        if($archivo != "." && $archivo != "..") {
                            $rutaArchivo = $nombreCarpeta."/".$archivo;
                            $contenido = file_get_contents($rutaArchivo);
                            $result = array_fill_keys($getPalabras, 0);
                            foreach ($getPalabras as $palabra) {
                                $result[$palabra] = substr_count($contenido, $palabra);  
                            }
                            $tabla.="<tr><td>".$rutaArchivo;
                            foreach ($result as $palabra => $count) {
                                $tabla.="<td>".$count;
                            }
                            //$tabla .= "</tr>";
                        $resultados[] = array(
                                'archivo' => $rutaArchivo,
                                'resultados' => $result,
                                'contadorPC' => $contadorPC,
                            );
                        }
                        
                    }
                    //$tabla .= "</table>";
                    closedir($dh);
                }
            }

           }
           echo json_encode($crearTabla);
        }
 
    }
  
?>