<?php
if(isset($_POST["accion"])){

  if(!isset($_SESSION)){
    session_start();
  }

  include("../Negocio/clsUsuario.php");
  $objUsuario= new Usuario();
  $accion=$_POST["accion"];

  if ($accion=="eliminarCuenta") {
    $objUsuario->Eliminar_Usuario($_POST['codigo']);
  }

}
?>
