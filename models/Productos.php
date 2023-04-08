<?php

require_once "../models/Conexion.php"

class Productos extends Conexion{

  private $accesoBD;



  public function __CONSTRUCT(){
    $this->accesoBD = parent::getConexion();
  }

  public function listarCursos(){
    try{
      $consulta = $this->accesoBD->prepare("CALL spu_productos_listar()")
      $consulta->execute();

      return $consulta->fetchALL(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}