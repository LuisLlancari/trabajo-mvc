<?php

require_once "Conexion.php";

class Productos extends Conexion{

  private $accesoBD;


// Preparamos las consultas
// con los procedimientos almacenasdos hechos
  public function __CONSTRUCT(){
    $this->accesoBD = parent::getConexion();
  }

  public function listarProductos(){
    try{
      $consulta = $this->accesoBD->prepare("CALL spu_productos_listar()");
      $consulta->execute();

       return $consulta->fetchALL(PDO::FETCH_ASSOC);
     // return json_encode('{"name":"junior"}');

    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function registrarProductos($datos = []){
    try{
      // 1. Preparamos la consulta
      $consulta = $this->accesoBD->prepare("CALL spu_productos_registrar(?,?,?,?,?,?,?,?)");
      // 2. ejecutamos la consulta
      $consulta->execute(
        array(
          $datos["nombreproducto"],
          $datos["categoria"],
          $datos["proveedor"],
          $datos["descripcion"],
          $datos["formato"],
          $datos["restricciones"],
          $datos["stock"],
          $datos["precio"]
          )
      );
    }
    catch(Exception $e){
      die($e->getMessage());
    }
    
  }

  public function eliminarProducto($idcurso = 0){
    try{
      $consulta = $this->accesoBD->prepare("CALL spu_productos_eliminar(?)");
      $consulta->execute(array($idcurso));
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}