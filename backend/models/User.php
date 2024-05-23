<?php

  class User  {
    //estos son los campos que tenemos en la base de datos
    private $id;
    private $nombre;
    private $apellido;
    private $telefono;
    private $correo;
    private $usuario;
    private $password;

    //creamos el constructor para inicializar los valores
    public function __construct ($nombre, $apellido, $telefono, $correo, $usuario, $password) {
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->telefono = $telefono;
      $this->correo = $correo;
      $this->usuario = $usuario;
      $this->password = $password;
    }

    //Getters para cada una de las propiedades
    public function getId() {
      return $this->id;
    }

    public function getNombre() {
      return $this->nombre;
    }

    public function getApellido() {
      return $this->apellido;
    }

    public function getTelefono() {
      return $this->telefono;
    }

    public function getCorreo() {
      return $this->correo;
    }

    public function getUsuario() {
      return $this->usuario;
    }

    public function getPassword() {
      return $this->password;
    }



    //Setters para cada una de las propiedades
    public function setId($id) {
      $this->id = $id;
    }

    public function setNombre($nombre) {
      $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
      $this->apellido = $apellido;
    }

    public function setTelefono($telefono) {
      $this->telefono = $telefono;
    }

    public function setCorreo($correo) {
      $this->correo = $correo;
    }
  
    public function setUsuario($usuario) {
      $this->usuario = $usuario;
    }

    public function setPassword($password) {
      $this->password = $password;
    }

}
?>