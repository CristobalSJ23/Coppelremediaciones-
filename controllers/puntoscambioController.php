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

    
}
?>