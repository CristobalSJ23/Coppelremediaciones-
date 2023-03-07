<?php
class planpruebasModel{
    public function read(){
        require_once('connection/connection.php');
        $con = new Connection();
        $this->con = $con->connection();
    }

    public function create(){
        
    }

    public function update(){
        
    }

    public function delete(){
        
    }
}
?>