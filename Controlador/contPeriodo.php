<?php
if(isset($_POST["accion"])){

  if(!isset($_SESSION)){
    session_start();
  }

  include("../Negocio/clsPeriodo.php");
  $objPeriodo = new Periodo();
  $accion=$_POST["accion"];

  if ($accion=="Aperturar") {
    $objPeriodo->Aperturar($_POST['id']);
  }

}
?>
