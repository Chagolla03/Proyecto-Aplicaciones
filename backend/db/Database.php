<?php

class Database {
  //aatributo privado que se usará para almacenar la conexión a la base de datos
  private $conn;

  //El constructor se ejecuta automaticamente cuando se crea una instancia de la clase Database
  public function __construct () {
    $this->conn = new mysqli('localhost:8889', 'root', 'root', 'renta_carros' );

    if ($this->conn->connect_error){
      die('Error de Conexión' .$this->conn->connect_error);
    }
  }

  //Devolvemos la conexión a la base de datos
  public function getConnection() {
    return $this->conn;
  }
}

?>