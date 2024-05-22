<?php

require_once '../backend/models/User.php';
require_once '../backend/db/Database.php';
require_once '../backend/interfaces/UserInterface.php';

class UserService Implements UserInterface {
  
  private $db;

  public function __construct($db){
    $this->db = $db;
  }


  public function registrarUsuario($usuario){
    $nombre = $usuario->getNombre();
    $calle = $usuario->getCalle();
    $no_ext = $usuario->getNo_ext();
    $no_int = $usuario->getNo_int();
    $colonia = $usuario->getColonia();
    $cp = $usuario->getCp();
    $ciudad = $usuario->getCiudad();
    $estado = $usuario->getEstado();
    $telefono = $usuario->getTelefono();
    $correo = $usuario->getCorreo();
    $rfc = $usuario->getRfc();
    $username = $usuario->getUsuario();
    //encriptamos la constraseña
    $password = password_hash($usuario->getPassword(), PASSWORD_DEFAULT);  

    //Hacemos la consulta SQL para evitar inyecciones
    $sql_insertar = "INSERT INTO cliente(cli_id, cli_nombre, cli_dir_calle, cli_dir_no_ext, cli_dir_no_int, cli_dir_col, cli_dir_cp, cli_dir_ciudad, cli_dir_estado, cli_telefono, cli_correo, cli_rfc, cli_usuario, cli_contra)
                      VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    //Preparamos la sentencia para ejecutar la consulta
    $stm = $this->db->prepare($sql_insertar);

     //si 'prepare' falla retornamos false.
    if($stm === false){
      //Error al preparar la consulta
      error_log("Error preparando la consulta: " . $this->db->error);
      return false;
    }

    //Vinculamos los parámetros de la consulta preparada
    // 's' indica que el parámetro es una cadena
    $stm->bind_param('sssssssssssss', $nombre, $calle, $no_ext, $no_int, $colonia, $cp, $ciudad, $estado, $telefono, $correo, $rfc, $username, $password);

    //Ejecutamos la consulta
    if($stm->execute()){
      return true;
    } else {
      return false;
    }

    //cerramos la consulta para liberar recursos
    $stm->close();
    
} 


//Función por probar
public function login($usuario, $password){
  $sql_usuario = "SELECT * FROM cliente WHERE cli_usuario = '$usuario'";

  $result = $this->db->query($sql_usuario);
  if ($result->num_rows == 1){ //si encontro al usuario devuelve solo 1 fila
    $user = $result->fetch_assoc(); //se obtienen los datos del usuario en forma de array asociativo.
    if(password_verify($password, $user['cli_contra'])){ //comparamos la contraseña proporcionada con la contraseña almacenada en la base de datos
      return $user;
    }
  }
  return false;
}

}

?>


