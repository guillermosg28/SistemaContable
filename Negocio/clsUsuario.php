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

  public function Registrar_Usuario($usuario,$contrasena,$permisos){
  			$sql = "INSERT INTO sc_usuarios (usuario_usuario, usuario_contrasena,usuario_permisos) VALUES ('$usuario','$contrasena','$permisos')";
        return clsAccesoDatos::ejecutarSQL($sql);

  }
  public function Listar_Usuarios(){
      $sql = "SELECT *
      FROM sc_usuarios us
      ORDER BY us.usuario_codigo ASC";
      return clsAccesoDatos::obtenerDataSQL($sql);
  }

  public function Eliminar_Usuario($codigo){
    $sql ="DELETE FROM sc_usuarios
    WHERE usuario_codigo='$codigo'";
    echo $sql;
    return clsAccesoDatos::ejecutarSQL($sql);
  }

}
?>
