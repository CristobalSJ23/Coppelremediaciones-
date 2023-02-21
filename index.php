<?php
require_once("config/config.php");
require_once("routes/router.php");
$routes = new Router();
$peticion = $_SERVER["REQUEST_METHOD"];
if($peticion == "GET"){
    $datos = $_GET;
}else{
    $datos = $_POST;
}
$routes->run($datos);

// require_once("controllers/loginController.php");
// $inc = new LoginController();

?>