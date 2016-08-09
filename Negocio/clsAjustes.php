<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("Cado.php");
class Ajustes extends clsAccesoDatos{
    // Constructor de la clase
    public function __construct(){
        parent::__construct();
    }

    public function verificar_Ajustes($cuenta){
      $sql = "SELECT COUNT(ajuste_codigo) AS verificar
      FROM sc_ajustes
      WHERE cuenta_codigo='$cuenta'";
      return clsAccesoDatos::obtenerDataSQL($sql);
    }

    public function cuenta_Ajustes($cuenta){
      $sql = "SELECT *
      FROM sc_ajustes
      WHERE cuenta_codigo='$cuenta'";
      return clsAccesoDatos::obtenerDataSQL($sql);
    }

    public function listar_Ajustes(){
      $sql="SELECT *
      FROM sc_ajustes sca
      LEFT JOIN sc_catalago scc ON sca.cuenta_codigo=scc.cuenta_codigo
      INNER JOIN sc_cuenta sccu ON sccu.cuenta_codigo=sca.cuenta_codigo
      WHERE scc.cuenta_codigo IS NULL";
      return clsAccesoDatos::obtenerDataSQL($sql);
    }





}
?>
