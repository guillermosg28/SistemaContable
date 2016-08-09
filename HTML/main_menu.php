<?php
$permisos = $_SESSION["ss_permiso"];
$arrayPermiso = explode(",",$permisos);
$tamanoArray = count($arrayPermiso);
?>

<div id="main-menu" role="navigation" class="hidden-print">
	<div id="main-menu-inner">
		<div class="menu-content top" id="menu-content-demo">
			<!-- Menu custom content demo
			CSS:        styles/pixel-admin-less/demo.less or styles/pixel-admin-scss/_demo.scss
			Javascript: html/assets/demo/demo.js
		-->
		<div>
			<div class="text-bg"><span class="text-slim">#</span><span class="text-semibold"><?=$_SESSION['ss_usuario']?></span></div>

			<img src="./Imagenes/perfil.jpg" alt="" class="">
			<div class="btn-group">
				<a href="salir.php" class="btn btn-xs btn-warning btn-outline dark"><i class="fa fa-power-off"></i></a>
			</div>
			<a href="#" class="close">&times;</a>
		</div>
	</div>
	<ul class="navigation">
		<?php
		for ($i=0; $i < $tamanoArray; $i++) {
			if ($arrayPermiso[$i]==1) {
			?>
			<li class="mm-dropdown">
				<a href="#"><i class="menu-icon fa fa-th"></i><span class="mm-text">Plan Contable</span></a>
				<ul>
					<li><a tabindex="-1" href="registrarCuenta"><i class="menu-icon fa fa-check"></i><span class="mm-text"> Registrar Cuenta</span></a></li>
					<li><a tabindex="-1" href="registrarSubCuenta"><i class="menu-icon fa fa-check"></i><span class="mm-text"> Registrar SubCuenta</span></a></li>
					<li><a tabindex="-1" href="registrarDivisionaria"><i class="menu-icon fa fa-check"></i><span class="mm-text"> Registrar Divisionaria</span></a></li>
					<li><a tabindex="-1" href="registrarSubDivisionaria"><i class="menu-icon fa fa-check"></i><span class="mm-text"> Registrar SubDivisionaria</span></a></li>
					<li><a tabindex="-1" href="listarCuentas"><i class="menu-icon fa fa-check"></i><span class="mm-text"> Listar Cuentas</span></a></li>
				</ul>
			</li>
	 <?php 	} } ?>

	 <?php
	 for ($i=0; $i < $tamanoArray; $i++) {
		 if ($arrayPermiso[$i]==2) {
		 ?>
		 <li class="mm-dropdown">
 			<a href="#"><i class="menu-icon fa fa-th"></i><span class="mm-text">Catalago</span></a>
 			<ul>
 				<li><a tabindex="-1" href="registrarCatalago"><i class="menu-icon fa fa-check"></i><span class="mm-text"> Registrar</span></a></li>
 				<li><a tabindex="-1" href="listarCatalago"><i class="menu-icon fa fa-check"></i><span class="mm-text"> Listar</span></a></li>
 			</ul>
 		</li>
	<?php 	} } ?>

	<?php
	for ($i=0; $i < $tamanoArray; $i++) {
		if ($arrayPermiso[$i]==3) {
		?>
		<li class="mm-dropdown">
			<a href="#"><i class="menu-icon fa fa-th"></i><span class="mm-text">Periodo</span></a>
			<ul>
				<li>
					<a tabindex="-1" href="registrarPeriodo"><i class="menu-icon fa fa-check"></i><span class="mm-text"> Registrar</span></a>
				</li>
				<li>
					<a tabindex="-1" href="listarPeriodo"><i class="menu-icon fa fa-check"></i><span class="mm-text"> Listar</span></a>
				</li>
			</ul>
		</li>
 <?php 	} } ?>

 <?php
 for ($i=0; $i < $tamanoArray; $i++) {
	 if ($arrayPermiso[$i]==4) {
	 ?>
	 <li class="mm-dropdown">
		 <a href="#"><i class="menu-icon fa fa-th"></i><span class="mm-text">Transaccion</span></a>
		 <ul>
			 <li><a tabindex="-1" href="registrarTransaccion"><i class="menu-icon fa fa-check"></i><span class="mm-text"> Registrar</span></a></li>
		 </ul>
	 </li>
<?php 	} } ?>

<?php
for ($i=0; $i < $tamanoArray; $i++) {
	if ($arrayPermiso[$i]==5) {
	?>
	<li><a href="libroDiario"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">Libro Diario</span></a></li>
<?php 	} } ?>

<?php
for ($i=0; $i < $tamanoArray; $i++) {
	if ($arrayPermiso[$i]==6) {
	?>
	<li><a href="libroMayor"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">Libro Mayor</span></a></li>
<?php 	} } ?>

<?php
for ($i=0; $i < $tamanoArray; $i++) {
	if ($arrayPermiso[$i]==7) {
	?>
	<li><a href="BalanzaCADA"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">Balanza de Comprobación antes de ajustes</span></a></li>
<?php 	} } ?>

<?php
for ($i=0; $i < $tamanoArray; $i++) {
	if ($arrayPermiso[$i]==9) {
	?>
	<li><a href="ajustes"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">Ajustes</span></a></li>
<?php 	} } ?>

<?php
for ($i=0; $i < $tamanoArray; $i++) {
	if ($arrayPermiso[$i]==10) {
	?>
	<li><a href="balanzaComprobacionAjustada"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">Balanza de Comprobacion Ajustada</span></a></li>
<?php 	} } ?>


<?php
for ($i=0; $i < $tamanoArray; $i++) {
	if ($arrayPermiso[$i]==11) {
	?>
	<li class="mm-dropdown">
		<a href="#"><i class="menu-icon fa fa-th"></i><span class="mm-text">Estados Financieros</span></a>
		<ul>
			<li>
				<a href="estadoDeResultados"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">Estado de Resultados</span></a>
			</li>
			<li>
				<a tabindex="-1" href="estadoSituacionFinanciera"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text"> Estado Situacion Financiera</span></a>
			</li>
		</ul>
	</li>
<?php 	} } ?>

<?php
for ($i=0; $i < $tamanoArray; $i++) {
	if ($arrayPermiso[$i]==8) {
	?>
	<li class="mm-dropdown">
		<a href="#"><i class="menu-icon fa fa-th"></i><span class="mm-text">Usuarios</span></a>
		<ul>
			<li>
				<a tabindex="-1" href="registrarUsuario"><i class="menu-icon fa fa-check"></i><span class="mm-text"> Registrar</span></a>
			</li>
			<li>
				<a tabindex="-1" href="listarUsuario"><i class="menu-icon fa fa-check"></i><span class="mm-text"> Listar</span></a>
			</li>
		</ul>
	</li>
<?php 	} } ?>




	</ul>
</li>

</ul> <!-- / .navigation -->
<div class="menu-content">
	<a href="#" class="btn btn-primary btn-block  dark">VERSION 1.0</a>

</div>
</div> <!-- / #main-menu-inner -->
</div> <!-- / #main-menu -->
