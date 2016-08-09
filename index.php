<?php
session_start();
require_once("./Negocio/clsEmpresa.php");
require_once("./Negocio/clsPeriodo.php");
require_once("./Negocio/clsCuenta.php");
require_once("./Negocio/clsElemento.php");
require_once("./Negocio/clsTransaccion.php");
require_once("./Negocio/clsCatalago.php");
require_once("./Negocio/clsUsuario.php");

$objEmpresa = new Empresa;
$objPeriodo = new Periodo;
$objCuenta = new Cuenta;
$objElemento = new Elemento;
$objTransaccion = new Transaccion;
$objCatalago= new Catalago;
$objUsuario= new Usuario;

//SESSIONES
$_SESSION['s_periodo']="1";

if ($_SESSION["ss_usuario"]){
?>
	<!DOCTYPE html>
	<html class="gt-ie8 gt-ie9 not-ie">
	<head>
		<?php
		@include_once("HTML/head.php");
		?>
	</head>

	<body class="theme-default main-menu-animated page-search">

		<script>var init = [];</script>


		<div id="main-wrapper">

			<!-- 2. $MAIN_NAVIGATION ===========================================================================
			Main navigation
		-->
		<?php
		@include_once("HTML/main_n.php");
		?>

		<?php
		@include_once("HTML/menu.php");
		?>
		<!-- /2. $END_MAIN_NAVIGATION -->


		<!-- 4. $MAIN_MENU ====================-->
		<?php
		@include_once("HTML/main_menu.php");
		?>
		<!-- /4. $MAIN_MENU -->


		<div id="content-wrapper">


			<?php
			$dato =isset($_GET['menu']) ? $_GET['menu'] : null;
			if ($dato) {
				if ($dato=="registrarPeriodo" || $dato=="listarPeriodo") {
					include_once("Vista/$dato.php");
				}
				if ($dato=="registrarCuenta" || $dato=="registrarSubCuenta" || $dato=="registrarDivisionaria" || $dato=="registrarSubDivisionaria") {
					include_once("Vista/$dato.php");
				}
				if ($dato=="registrarTransaccion") {
					include_once("Vista/$dato.php");
				}
				if ($dato=="libroDiario") {
					include_once("Vista/$dato.php");
				}
				if ($dato=="libroMayor") {
					include_once("Vista/$dato.php");
				}
				if ($dato=="registrarCatalago" || $dato=="listarCatalago") {
					include_once("Vista/$dato.php");
				}
				if ($dato=="BalanzaCADA") {
					include_once("Vista/$dato.php");
				}
				if ($dato=="registrarUsuario" || $dato=="listarUsuario") {
					include_once("Vista/$dato.php");
				}
				if ($dato=="ajustes") {
					include_once("Vista/$dato.php");
				}
				if ($dato=="balanzaComprobacionAjustada") {
					include_once("Vista/$dato.php");
				}
			}else{
				include_once("Vista/inicio.php");
			}

			?>
		</div> <!-- / #content-wrapper -->
		<div id="main-menu-bg"></div>
	</div> <!-- / #main-wrapper -->

	<?php
	@include_once("HTML/footer.php");
	?>

	<script src="Js/SubCuenta.js"></script>
	<script src="Js/Divisionaria.js"></script>
	<script src="Js/SubDivisionaria.js"></script>

</body>
</html>
<?php
}else {
	header('Location: login.php');
}
?>
