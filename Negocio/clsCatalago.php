<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("Cado.php");
class Catalago extends clsAccesoDatos{
    // Constructor de la clase
    public function __construct(){
        parent::__construct();
    }

    public function Listar_Catalagos(){
        $sql = "SELECT *
        FROM sc_catalago scca
        INNER JOIN sc_cuenta scc ON scc.cuenta_codigo=scca.cuenta_codigo
        ORDER BY scca.cuenta_codigo ASC";
        return clsAccesoDatos::obtenerDataSQL($sql);
    }


    public function Agregar_Catalago($codigo,$periodo){
      $sql ="INSERT INTO sc_catalago(cuenta_codigo,periodo_codigo)
      VALUES ('$codigo','$periodo')";
      return clsAccesoDatos::ejecutarSQL($sql);
    }

    public function Eliminar_Cuenta($codigo){
      $sql ="DELETE FROM sc_catalago
      WHERE catalago_codigo='$codigo'";
      return clsAccesoDatos::ejecutarSQL($sql);
    }

}
?>
