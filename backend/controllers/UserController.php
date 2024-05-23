<?php
require_once '../backend/services/UserService.php';

class UserController {
  private $userService;

  //obtenemos la conexión de la base de datos 
  public function __construct() {
    $db = (new Database()) ->getConnection();
    $this->userService = new UserService($db);
  }

  public function registrar(){

    //definimos los datos que se envian desde el formulario html, en 'name'
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if(!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
      echo json_encode(array("success" => false, "message" => "Correo no válido"));
      return;
    }

    $usuarioNuevo = new User ($nombre, $apellido, $telefono, $correo, $usuario, $password);
    $resultado = $this->userService->registrarUsuario($usuarioNuevo);

    if($resultado){
      echo json_encode(array("success" => true, "message" => "Usuario Registrado Satisfactoriamente"));
    } else {
      echo json_encode(array("success" => false, "message" => "Error al registrar usuario"));
    }
  }

}

?>