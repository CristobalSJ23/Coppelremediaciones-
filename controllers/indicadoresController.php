<?php
require_once(__DIR__.'/../core/coreController.php');
class indicadoresController extends coreController{
    public function __construct(){
        parent::__construct();
        require_once("models/indicadoresModel.php");
        $this->indicadores = new indicadoresModel();
    }

    public function avanceDiario(){
        $res = $this->indicadores->getAvanceDiario();
        require_once("views/templates/header.php");
        require_once("views/templates/menu.php");
        require_once("views/avance.php");
        require_once("views/templates/footer.php");
    }

    public function indicadores(){
        require_once("views/templates/header.php");
        require_once("views/templates/menu.php");
        require_once("views/indicadores.php");
        require_once("views/templates/footer.php");
    }


}


?>