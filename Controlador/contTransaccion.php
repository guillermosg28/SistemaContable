<?php
if(isset($_POST["accion"])){

  if(!isset($_SESSION)){
    session_start();
    $periodo = $_SESSION['s_periodo'];
  }

  include("../Negocio/clsTransaccion.php");
  $objTransaccion = new Transaccion();
  $accion=$_POST["accion"];

  if ($accion=="IngresarDebe") {
    $rsT = $objTransaccion->Ver_Ultima_Transaccion($periodo);
    $dataT = $rsT->fetchObject();
    $transaccion = $dataT->verificar;
    $objTransaccion->Agregar_Debe_Movimiento($_POST['codigoD'],$transaccion,$_POST['montoD']);
  }

  if ($accion=="IngresarHaber") {
    $rsT = $objTransaccion->Ver_Ultima_Transaccion($periodo);
    $dataT = $rsT->fetchObject();
    $transaccion = $dataT->verificar;
    $objTransaccion->Agregar_Haber_Movimiento($_POST['codigoH'],$transaccion,$_POST['montoH']);
  }

  if ($accion=="IngresarTransaccion") {

    $usuario = 1;
    $rsAsiento = $objTransaccion->verificar_Transaccion($periodo);
    $dataAsiento = $rsAsiento->fetchObject();
    if (!$dataAsiento->verificar) {
      $asiento = 1;
    }else{
      $asiento = $dataAsiento->verificar+1;
    }
    $objTransaccion->agregarTransaccion($_POST['total'],$_POST['nombre'],$asiento,$periodo,$usuario);
  }

  //INGRESAR AJUSTE DEBE
  if ($accion=="IngresarAjusteDebe") {
    $objTransaccion->Agregar_Ajuste_Debe($_POST['codigoD'],$periodo,$_POST['montoD'],$_POST['nombreD']);
  }

  if ($accion=="IngresarAjusteHaber") {
    $objTransaccion->Agregar_Ajuste_Haber($_POST['codigoH'],$periodo,$_POST['montoH'],$_POST['nombreH']);
  }

}
?>
