<?php
require_once("controllers/loginController.php");
$inc = new LoginController();
$peticion = $_SERVER["REQUEST_METHOD"];

if($peticion == "GET"){
    $inc->login();
}else{
     $respuesta = $inc->validate($_POST);
     $inc->login($respuesta);
}
?>