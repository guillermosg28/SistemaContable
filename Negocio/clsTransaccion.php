<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("Cado.php");
class Transaccion extends clsAccesoDatos{
    // Constructor de la clase
    public function __construct(){
        parent::__construct();
    }

    public function verificar_Transaccion($periodo){
      $sql = "SELECT COUNT(transaccion_codigo) AS verificar
      FROM sc_transaccion
      WHERE periodo_codigo='$periodo'";
      return clsAccesoDatos::obtenerDataSQL($sql);
    }

    public function Ver_Ultima_Transaccion($periodo){
      $sql = "SELECT transaccion_codigo AS verificar
      FROM sc_transaccion
      WHERE periodo_codigo='$periodo'
      ORDER BY transaccion_codigo DESC";
      return clsAccesoDatos::obtenerDataSQL($sql);
    }

    public function agregarTransaccion($total,$nombre,$asiento,$periodo,$usuario){
      $fecha = date("Y-m-d");
      $sql="INSERT INTO sc_transaccion(transaccion_asiento,transaccion_fecha,transaccion_montototal,transaccion_nombre,periodo_codigo,usuario_codigo)
      VALUES('$asiento','$fecha','$total','$nombre','$periodo','$usuario')";
      return clsAccesoDatos::ejecutarSQL($sql);
    }

    public function Agregar_Debe_Movimiento($codigo,$transaccion,$monto){
      $sql ="INSERT INTO sc_movimiento(cuenta_codigo,transaccion_codigo,movimiento_monto,movimiento_tipo)
      VALUES ('$codigo','$transaccion','$monto','D')";
      return clsAccesoDatos::ejecutarSQL($sql);
    }

    public function Agregar_Haber_Movimiento($codigo,$transaccion,$monto){
      $sql ="INSERT INTO sc_movimiento(cuenta_codigo,transaccion_codigo,movimiento_monto,movimiento_tipo)
      VALUES ('$codigo','$transaccion','$monto','H')";
      return clsAccesoDatos::ejecutarSQL($sql);
    }

    public function Libro_Diario_Transacciones($periodo){
      $sql="SELECT *
      FROM sc_transaccion
      WHERE periodo_codigo='$periodo'
      ORDER BY transaccion_fecha ASC";
      return clsAccesoDatos::obtenerDataSQL($sql);
    }

    public function Total_Movimientos_T($transaccion){
      $sql = "SELECT COUNT(movimiento_codigo) AS verificar
      FROM sc_movimiento
      WHERE transaccion_codigo='$transaccion'";
      return clsAccesoDatos::obtenerDataSQL($sql);
    }

    public function Lista_Movimientos($transaccion){
      $sql = "SELECT *
      FROM sc_movimiento scm
      INNER JOIN sc_cuenta scc ON scc.cuenta_codigo=scm.cuenta_codigo
      WHERE transaccion_codigo='$transaccion'";
      return clsAccesoDatos::obtenerDataSQL($sql);
    }

    public function Lista_Movimiento_Mayor($cuenta){
      $sql = "SELECT *
      FROM sc_movimiento scm
      INNER JOIN sc_transaccion sct ON sct.transaccion_codigo=scm.transaccion_codigo
      WHERE cuenta_codigo='$cuenta'
      ORDER BY movimiento_codigo ASC";
      return clsAccesoDatos::obtenerDataSQL($sql);
    }

    public function Agregar_Ajuste_Debe($codigo,$periodo,$monto,$nombre){
      $sql ="INSERT INTO sc_ajustes(cuenta_codigo,periodo_codigo,ajuste_monto,ajuste_tipo,ajuste_descripcion)
      VALUES ('$codigo','$periodo','$monto','D','$nombre')";
      return clsAccesoDatos::ejecutarSQL($sql);
    }

    public function Agregar_Ajuste_Haber($codigo,$periodo,$monto,$nombre){
      $sql ="INSERT INTO sc_ajustes(cuenta_codigo,periodo_codigo,ajuste_monto,ajuste_tipo,ajuste_descripcion)
      VALUES ('$codigo','$periodo','$monto','H','$nombre')";
      return clsAccesoDatos::ejecutarSQL($sql);
    }



}
?>
