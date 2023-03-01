<?php
require_once(__DIR__.'/../core/coreController.php');
class sistemaController extends coreController{
    public function __construct()
    {
        parent::__construct();
        $this->js='../assets/js/sistema.js';

        require_once("models/sistemaModel.php");
        $this->sistema = new sistemaModel();
    }
    public function readSistema(){
        $res = $this->sistema->getSistema();
        require_once("views/templates/header.php");
        require_once("views/templates/menu.php");
        require_once("views/sistema.php");
        require_once("views/templates/footer.php");
    }
}
?>