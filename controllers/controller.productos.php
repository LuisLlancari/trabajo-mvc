<?php

require_once '../models/Productos.php';

if (isset($_POST['operacion'])){
  $producto = new Productos();


  if($_POST['operacion'] == 'listar'){
    $datosObtenidos = $producto->listarProductos();

   
     
     
    $numeroFila = 1;
    if(count($datosObtenidos)>0){
      
      

      foreach($datosObtenidos as $producto){
       
        echo"
        <tr>
          <td>{$numeroFila}</td>
          <td>{$producto['nombreproducto']}</td>
          <td>{$producto['categoria']}</td>
          <td>{$producto['proveedor']}</td>
          <td>{$producto['descripcion']}</td>
          <td>{$producto['formato']}</td>
          <td>{$producto['restricciones']}</td>
          <td>{$producto['stock']}</td>
          <td>{$producto['precio']}</td>
          <td>
            <a href='#' data-idproducto='{$producto['idproducto']}' class='btn btn-danger btn-sm eliminar'><i class='bi bi-trash3'></i></a>
            <a href='#' data-idproducto='{$producto['idproducto']}' class='btn btn-info btn-sm editar'><i class='bi bi-pencil-fill'></i></a>
          </td>
        </tr>
      ";
      $numeroFila++;

      }
    }
 
    
  }

  if ($_POST['operacion'] == 'registrar'){
    $datosForm = [
      "nombreproducto"=> $_POST['nombreproducto'],
      "categoria"     => $_POST['categoria'],
      "proveedor"     => $_POST['proveedor'],
      "descripcion"   => $_POST['descripcion'],
      "formato"       => $_POST['formato'],
      "restricciones" => $_POST['restricciones'],
      "stock"         => $_POST['stock'],
      "precio"        => $_POST['precio'],
    ];

    //paso 2: Enviar arreglo con el prarmetro
    $producto->registrarProductos($datosForm);
  }

  if ($_POST['operacion'] == 'eliminar'){
    $producto->eliminarProducto($_POST['idproducto']);
  }  

}