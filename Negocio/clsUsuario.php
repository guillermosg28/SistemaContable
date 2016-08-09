<?php
if(!isset($_SESSION)){
    session_start();
}
include_once("Cado.php");
class Usuario extends clsAccesoDatos{
    // Constructor de la clase
    public function __construct(){
        parent::__construct();
    }

    public function listarPermisos(){
        $sql = "SELECT *
        from sc_usuariospermisos
        ORDER BY usuariospermisos_nombre ASC";
        return clsAccesoDatos::obtenerDataSQL($sql);
    }

}
?>
