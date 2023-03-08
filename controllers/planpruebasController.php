<?php
require_once(__DIR__.'/../core/coreController.php');
class planpruebasController extends coreController{
    public function __construct(){
        parent::__construct();
        $this->js='../assets/js/planpruebas.js';
        require_once('models/planpruebasModel.php');
        $this->plan = new planpruebasModel();
    }

    public function read(){
        $res = $this->plan->getPlan();
        require_once("views/templates/header.php");
        require_once("views/templates/menu.php");
        require_once("views/planpruebas.php");
        require_once("views/templates/footer.php");

    }

    public function create(){
        
    }

    public function update(){
        
    }

    public function delete(){
        
    }
}
?>