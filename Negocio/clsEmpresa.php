<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("Cado.php");
class Empresa extends clsAccesoDatos{
    // Constructor de la clase
    public function __construct(){
        parent::__construct();
    }

    public function listarTiposEmpresas(){
        $sql = "SELECT *
        from sc_tiposempresa
        ORDER BY tiposempresa_descripcion ASC";
        return clsAccesoDatos::obtenerDataSQL($sql);
    }

}
?>
