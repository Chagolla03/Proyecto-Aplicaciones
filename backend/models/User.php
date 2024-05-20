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

    public function getCalle() {
      return $this->calle;
    }

    public function getNo_ext() {
      return $this->no_ext;
    }

    public function getNo_int() {
      return $this->no_int;
    }

    public function getColonia() {
      return $this->colonia;
    }

    public function getCp() {
      return $this->cp;
    }

    public function getCiudad() {
      return $this->ciudad;
    }

    public function getEstado() {
      return $this->estado;
    }

    public function getTelefono() {
      return $this->telefono;
    }

    public function getCorreo() {
      return $this->correo;
    }

    public function getRfc() {
      return $this->rfc;
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

    public function setCalle($calle) {
      $this->calle = $calle;
    }

    public function setNo_ext($no_ext) {
      $this->no_ext = $no_ext;
    }

    public function setNo_int($no_int) {
      $this->no_int = $no_int;
    }

    public function setColonia($colonia) {
      $this->colonia = $colonia;
    }

    public function setCp($cp) {
      $this->cp = $cp;
    }

    public function setCiudad($ciudad) {
      $this->ciudad = $ciudad;
    }

    public function setEstado($estado) {
      $this->estado = $estado;
    }

    public function setTelefono($telefono) {
      $this->telefono = $telefono;
    }

    public function setCorreo($correo) {
      $this->correo = $correo;
    }

    public function setRfc($rfc) {
      $this->rfc = $rfc;
    }

    public function setUsuario($usuario) {
      $this->usuario = $usuario;
    }

    public function setPassword($password) {
      $this->password = $password;
    }

}
?>