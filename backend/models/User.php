<?php

  class User  {
    //estos son los campos que tenemos en la base de datos
    private $id;
    private $nombre;
    private $calle;
    private $no_ext;
    private $no_int;
    private $colonia;
    private $cp; //codigo postal
    private $ciudad;
    private $estado;
    private $telefono;
    private $correo;
    private $rfc;
    private $usuario;
    private $password;

    //creamos el constructor para inicializar los valores
    public function __construct ($nombre, $calle, $no_ext, $no_int, $colonia, $cp, $ciudad, $estado, $telefono, $correo, $rfc, $usuario, $password) {
      $this->nombre = $nombre;
      $this->calle = $calle;
      $this->no_ext = $no_ext;
      $this->no_int = $no_int;
      $this->colonia = $colonia;
      $this->cp = $cp;
      $this->ciudad = $ciudad;
      $this->estado = $estado;
      $this->telefono = $telefono;
      $this->correo = $correo;
      $this->rfc = $rfc;
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

    public function getApaterno() {
      return $this->apaterno;
    }

    public function getAmaterno() {
      return $this->amaterno;
    }

    public function getDireccion() {
      return $this->direccion;
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

    public function setApaterno($apaterno) {
      $this->apaterno = $apaterno;
    }

    public function setAmaterno($amaterno) {
      $this->amaterno = $amaterno;
    }

    public function setDireccion($direccion) {
      $this->direccion = $direccion;
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