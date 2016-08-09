<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("Cado.php");
class Periodo extends clsAccesoDatos{
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


}
?>
