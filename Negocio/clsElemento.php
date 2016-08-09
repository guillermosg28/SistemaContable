<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("Cado.php");
class Elemento extends clsAccesoDatos{
    // Constructor de la clase
    public function __construct(){
        parent::__construct();
    }

    public function listarElementos(){
        $sql = "SELECT *
        from sc_elemento
        ORDER BY elemento_codigo ASC";
        return clsAccesoDatos::obtenerDataSQL($sql);
    }

}
?>
