<?php

require_once '../backend/controllers/UserController.php';

//creamos una instancia de la clase UserController
$userControler = new UserController();

switch ($_SERVER["REQUEST_METHOD"]) {
  case "POST":
    $accion = $_POST['accion'];
    if($accion == 'registrar'){
      $userControler->registrar();
    }
    break;
}



?>