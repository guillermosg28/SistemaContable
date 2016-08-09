<?php
session_start();
require("./Negocio/clsUsuario.php");
//Creando Objetos
$objUsuario=new Usuario;
?>
<?php
if(isset($_POST['Ingreso_Sistema'])){
  $Respuesta ="Si";
  $username=$_POST['u_usuario'];
  $password=$_POST['u_contrasena'];
  $rsComprobar=$objUsuario->Logeo($username,$password);
  $dataComprobar=$rsComprobar->fetchObject();
  if($dataComprobar->verificar){
    $rsUsuario = $objUsuario->Logeado($username,$password);
    while ($dataUsuario = $rsUsuario->fetchObject()) {
      $_SESSION["ss_usuario"] = $dataUsuario->usuario_usuario;
      $_SESSION["ss_permiso"] = $dataUsuario->usuario_permisos;
      header('Location: index.php');
    }


    }else{
      $msg ="Contraseña incorrecta";
    }

  }
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>SISTEMA CONTABLES UNACEM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

	<!-- Open Sans font from Google CDN -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin" rel="stylesheet" type="text/css">

	<!-- CSS -->
	<link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="plugins/bootstrap/css/pixel-admin.min.css" rel="stylesheet" type="text/css">
	<link href="plugins/bootstrap/css/widgets.min.css" rel="stylesheet" type="text/css">
	<link href="plugins/bootstrap/css/pages.min.css" rel="stylesheet" type="text/css">
	<link href="plugins/bootstrap/css/rtl.min.css" rel="stylesheet" type="text/css">
	<link href="plugins/bootstrap/css/themes.min.css" rel="stylesheet" type="text/css"></head>



<!-- 1. $BODY ======================================================================================

	Body

	Classes:
	* 'theme-{THEME NAME}'
	* 'right-to-left'     - Sets text direction to right-to-left
-->
<body class="theme-default page-signin-alt">
<!-- Demo script --> <script src="assets/demo/demo.js"></script> <!-- / Demo script -->



<!-- 2. $MAIN_NAVIGATION ===========================================================================

	Main navigation
-->
	<div class="signin-header">
		<a href="#" class="logo">
			<strong>UNACEM</strong> SISTEMA CONTABLES
		</a> <!-- / .logo -->
	</div> <!-- / .header -->

	<h1 class="form-header">Ingresar al panel</h1>


	<!-- Form -->

	<form method="POST" action="Login.php" role="form" class="panel">
		<div class="form-group">
			<input type="text" name="u_usuario"  class="form-control input-lg" required>
		</div> <!-- / Username -->

		<div class="form-group signin-password">
			<input type="password" name="u_contrasena"  class="form-control input-lg" required>
		</div> <!-- / Password -->

		<div class="form-actions">
			<button type="submit" name="Ingreso_Sistema" class="btn btn-primary btn-block btn-lg">Ingresar</button>
		</div> <!-- / .form-actions -->
	</form>
	<!-- / Form -->



</body>
</html>
