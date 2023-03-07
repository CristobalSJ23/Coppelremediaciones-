<?php
require_once(__DIR__.'/../core/coreController.php');
class planpruebasController extends coreController{
    public function __construct(){
        parent::__construct();
        $this->js='../assets/js/puntoscambio.js';
        require_once('models/planpruebasModel.php');
        $this->plan = new planpruebasModel();
    }

    public function read(){

    }

    public function create(){
        
    }

    public function update(){
        
    }

    public function delete(){
        
    }
}
?>