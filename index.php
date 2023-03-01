<?php
require_once("config/config.php");
$url = explode("/",URL);
require_once("routes/router.php");
if($url[0] == "" && $url[1] == ""){
     header("location: login/login");
}
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