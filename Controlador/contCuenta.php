<?php
if(isset($_POST["accion"])){

  if(!isset($_SESSION)){
    session_start();
  }

  include("../Negocio/clsCuenta.php");
  include("../Negocio/clsElemento.php");
  require_once("../Negocio/clsCatalago.php");
  $objCuenta = new Cuenta();
  $objElemento = new Elemento();
  $objCatalago= new Catalago;
  $accion=$_POST["accion"];

  if ($accion=="eliminarCuenta") {
    $ejecutar=$objCatalago->Eliminar_Cuenta($_POST['codigo']);

  }

  if ($accion=="listarTipos") {
    $rs=$objElemento->listarElementos();
    echo '<option></option>';
    while($dato=$rs->fetchObject()){
      echo '<option value="'.$dato->elemento_codigo.'">['.$dato->elemento_codigo.'] '.$dato->elemento_descripcion.'</option>';
    }
  }

  if ($accion=="ListarCuentas") {
    $rs=$objCuenta->listarCuentas($_POST['tipo']);
    echo '<option></option>';
    while($dato=$rs->fetchObject()){
      echo '<option value="'.$dato->cuenta_codigo.'">['.$dato->cuenta_codigo.'] '.$dato->cuenta_nombre.'</option>';
    }
  }

  if ($accion=="ListarSubCuentas") {
    $rs=$objCuenta->listarSubCuentas($_POST['cuenta']);
    echo '<option></option>';
    while($dato=$rs->fetchObject()){
      echo '<option value="'.$dato->cuenta_codigo.'">['.$dato->cuenta_codigo.'] '.$dato->cuenta_nombre.'</option>';
    }
  }

  if ($accion=="ListarSubCuentasC") {
    $rs=$objCuenta->listarSubCuentas($_POST['cuenta']);
    while($dato=$rs->fetchObject()){
      echo "<li><a href=\"javascript:void(0);\" onclick=\"abrirDivisionaria('".$dato->cuenta_codigo."','".$dato->cuenta_nombre."');\"><span class=\"badge badge-danger\">".$dato->cuenta_codigo."</span> ".$dato->cuenta_nombre."</a></li>";

    }
  }

  if ($accion=="ListarDivisionaria") {
    $rs=$objCuenta->listarSubCuentas($_POST['subcuenta']);
    echo '<option></option>';
    while($dato=$rs->fetchObject()){
      echo '<option value="'.$dato->cuenta_codigo.'">['.$dato->cuenta_codigo.'] '.$dato->cuenta_nombre.'</option>';
    }
  }

  if ($accion=="ListarDivisionariaC") {
    $rs=$objCuenta->listarSubCuentas($_POST['subcuenta']);
    while($dato=$rs->fetchObject()){
      echo "<li><a href=\"javascript:void(0);\" onclick=\"abrirSubDivisionaria('".$dato->cuenta_codigo."','".$dato->cuenta_nombre."');\"><span class=\"badge badge-warning\">".$dato->cuenta_codigo."</span> ".$dato->cuenta_nombre."</a></li>";

    }
  }

  if ($accion=="ListarSubDivisionariaC") {
    $rs=$objCuenta->listarSubCuentas($_POST['subcuenta']);
    while($dato=$rs->fetchObject()){
      echo "<li><a href=\"javascript:void(0);\" onclick=\"abrirFin('".$dato->cuenta_codigo."','".$dato->cuenta_nombre."');\"><span class=\"badge badge-info\">".$dato->cuenta_codigo."</span> ".$dato->cuenta_nombre."</a></li>";

    }
  }

}
?>
