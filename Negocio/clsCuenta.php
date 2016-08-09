<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("Cado.php");
class Cuenta extends clsAccesoDatos{
    // Constructor de la clase
    public function __construct(){
        parent::__construct();
    }

    public function Listar_Periodos(){
        $sql = "SELECT *
        FROM sc_periodo scp
        INNER JOIN sc_periodoestado scpe ON scp.periodo_estado=scpe.periodoestado_codigo
        INNER JOIN sc_cuentaestado scce ON scp.periodo_cuenta=scce.cuentaestado_codigo
        ORDER BY periodo_inicio ASC";
        return clsAccesoDatos::obtenerDataSQL($sql);
    }


    public function Registrar_Periodo($nombre,$empresa,$inicio,$fin){
      $sql ="INSERT INTO sc_periodo(periodo_empresa,tiposempresa_codigo,periodo_inicio,periodo_fin)
      VALUES ('$nombre','$empresa','$inicio','$fin')";
      return clsAccesoDatos::ejecutarSQL($sql);
    }

    public function Aperturar($id){
      $sql="UPDATE sc_periodo
      SET periodo_cuenta='3'
      WHERE periodo_codigo='$id'";
      return clsAccesoDatos::ejecutarSQL($sql);
    }

    public function verificar_Codigo($codigo){
      $sql = "SELECT COUNT(cuenta_codigo) AS verificar
      FROM sc_cuenta
      WHERE cuenta_codigo='$codigo'";
      return clsAccesoDatos::obtenerDataSQL($sql);
    }

    public function Registrar_Cuenta($codigo,$nombre,$tipo){
      $sql ="INSERT INTO sc_cuenta(cuenta_codigo,cuenta_nombre,elemento_codigo,cuenta_tipo,cuenta_padre)
      VALUES ('$codigo','$nombre','$tipo','C','0')";
      return clsAccesoDatos::ejecutarSQL($sql);
    }

    public function listarCuentas($tipo=""){
      if ($tipo!="") {
        $sql = "SELECT *
        FROM sc_cuenta
        WHERE cuenta_padre='0' AND elemento_codigo='$tipo'
        ORDER BY cuenta_codigo ASC";
      }else{
        $sql = "SELECT *
        FROM sc_cuenta
        WHERE cuenta_padre='0'
        ORDER BY cuenta_codigo ASC";
      }

      return clsAccesoDatos::obtenerDataSQL($sql);
    }

    public function listarSubCuentas($cuenta){
      $sql = "SELECT *
      FROM sc_cuenta
      WHERE cuenta_padre='$cuenta'
      ORDER BY cuenta_codigo ASC";
      return clsAccesoDatos::obtenerDataSQL($sql);
    }

    public function Registrar_SubCuenta($cuenta,$codigo,$nombre){
      $sql ="INSERT INTO sc_cuenta(cuenta_codigo,cuenta_nombre,elemento_codigo,cuenta_tipo,cuenta_padre)
      VALUES ('$codigo','$nombre','0','SC','$cuenta')";
      return clsAccesoDatos::ejecutarSQL($sql);
    }

    public function Registrar_Divsionaria($subcuenta,$codigo,$nombre){
      $sql ="INSERT INTO sc_cuenta(cuenta_codigo,cuenta_nombre,elemento_codigo,cuenta_tipo,cuenta_padre)
      VALUES ('$codigo','$nombre','0','D','$subcuenta')";
      return clsAccesoDatos::ejecutarSQL($sql);
    }

    public function Registrar_SubDivsionaria($divisionaria,$codigo,$nombre){
      $sql ="INSERT INTO sc_cuenta(cuenta_codigo,cuenta_nombre,elemento_codigo,cuenta_tipo,cuenta_padre)
      VALUES ('$codigo','$nombre','0','SD','$divisionaria')";
      return clsAccesoDatos::ejecutarSQL($sql);
    }


}
?>
