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
    $calle = $_POST['calle'];
    $no_ext = $_POST['no_ext'];
    $no_int = $_POST['no_int'];
    $colonia = $_POST['colonia'];
    $cp = $_POST['cp'];
    $estado = $_POST['estado'];
    $ciudad = $_POST['ciudad'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $rfc = $_POST['rfc'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $usuarioNuevo = new User ($nombre, $calle, $no_ext, $no_int, $colonia, $cp, $ciudad, $estado, $telefono, $correo, $rfc, $usuario, $password);
    $resultado = $this->userService->registrarUsuario($usuarioNuevo);

    if($resultado){
      echo json_encode(array("success" => true, "message" => "Usuario Registrado Satisfactoriamente"));
    } else {
      echo json_encode(array("success" => false, "message" => "Error al registrar usuario"));
    }
  }

}

?>