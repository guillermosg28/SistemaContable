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

    public function Logeo($user,$pass){
		$sql = "SELECT COUNT(usuario_usuario) AS verificar
		FROM sc_usuarios
		WHERE usuario_usuario='$user' AND usuario_contrasena='$pass'";
		return clsAccesoDatos::obtenerDataSQL($sql);
	}

	public function Logeado($user,$pass){
		$sql = "SELECT *
        FROM sc_usuarios
        WHERE usuario_usuario='$user' AND usuario_contrasena='$pass'";
        return clsAccesoDatos::obtenerDataSQL($sql);
	}



}
?>
