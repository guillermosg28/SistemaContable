<?php
if (isset($_POST['R_Registrar'])) {
  $permisos = "";
	$usuario = $_POST['u_usuario'];
	$contrasena = $_POST['u_contrasena'];

  $plancontable = $_POST['u_plancontable'];
	$catalago = $_POST['u_catalago'];
	$periodo= $_POST['u_periodo'];
  $transaccion = $_POST['u_transaccion'];
  $librodiario = $_POST['u_librodiario'];
  $libromayor = $_POST['u_libromayor'];
  $balanzadecomprobacionantesdeajustes = $_POST['u_balanzadecomprobacionantesdeajustes'];
  $usuarios= $_POST['u_usuarios'];
  $ajustes=$_POST['u_ajustes'];
  $balanzadecomprobacionajustada=$_POST['u_balanzadecomprobacionajustada'];

  if (!$plancontable==NULL) {
		$permisos = $permisos . $plancontable.",";
	}
  if (!$catalago==NULL) {
		$permisos = $permisos . $catalago.",";
	}
  if (!$periodo==NULL) {
		$permisos = $permisos . $perdiodo.",";
	}
  if (!$transaccion==NULL) {
		$permisos = $permisos . $transaccion.",";
	}
  if (!$librodiario==NULL) {
		$permisos = $permisos . $librodiario.",";
	}
  if (!$libromayor==NULL) {
		$permisos = $permisos . $libromayor.",";
	}
  if (!$balanzadecomprobaciondeajustes==NULL) {
		$permisos = $permisos . $balanzadecomprobaciondeajustes.",";
	}
  if (!$usuarios==NULL) {
		$permisos = $permisos . $usuarios.",";
	}
  if (!$ajustes==NULL) {
		$permisos = $permisos . $ajustes.",";
	}
  if (!$balanzadecomprobacionajustada==NULL) {
    $permisos = $permisos . $balanzadecomprobacionajustada.",";
  }

	$ingresar =$objUsuario->Registrar_Usuario($usuario,$contrasena,$permisos);
	echo '<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>Mensaje!</strong> Usuario registrado orrectamente
	</div>';
}
?>


<div class="page-header">
  <h1><span class="text-light-gray">Registrar Usuario</span></h1>
</div> <!-- / .page-header -->

<div class="row">
  <div class="col-sm-12">
    <form action="" class="panel form-horizontal" method="POST" >


    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Complete los siguientes campos</span>
      </div>
      <div class="panel-body">
        <div class="row">

          <div class="col-sm-12">

    				<div class="form-group">
    					<label class="col-md-2 control-label" for="select-1">Usuario: </label>
    					<div class="col-md-10">
    						<input class="form-control" type="text" name="u_usuario" required placeholder="Nombre Usuario">
    					</div>
    				</div>

    				<div class="form-group">
    					<label class="col-md-2 control-label" for="select-1">Contraseña: </label>
    					<div class="col-md-10">
    						<input class="form-control" type="text" name="u_contrasena" required placeholder="Ingrese contraseña">
    					</div>
    				</div>

    				<div class="form-group">
    					<label class="col-md-2 control-label" for="select-1">Permisos: </label>
    					<div class="col-md-10">
                <label class="checkbox">
    							<input type="checkbox" value="1" name="u_plancontable"> plan Contable
                </label>
                <label class="checkbox">
                  <input type="checkbox" value="2" name="u_catalago"> Catalago
                </label>
                <label class="checkbox">
                  <input type="checkbox" value="3" name="u_periodo"> Periodo
                </label>
                <label class="checkbox">
                  <input type="checkbox" value="4" name="u_transaccion"> Transaccion
                </label>
                <label class="checkbox">
                  <input type="checkbox" value="5" name="u_librodiario"> Libro Diario
                </label>
                <label class="checkbox">
                  <input type="checkbox" value="6" name="u_libromayor"> Libro Mayor
                </label>
                <label class="checkbox">
                  <input type="checkbox" value="7" name="u_balanzadecomprobacionantesdeajustes"> Balanza De Comprobacion antes de Ajustes
                </label>
                <label class="checkbox">
                  <input type="checkbox" value="8" name="u_libromayor"> Usuarios
    						</label>
                <label class="checkbox">
                  <input type="checkbox" value="9" name="u_ajustes"> Ajustes
    						</label>
                <label class="checkbox">
                  <input type="checkbox" value="11" name="u_"> Balanza de comprobacion ajustada
    						</label>
    					</div>
    				</div>

    			</div>


        </div>

      </div>

      <div class="panel-footer text-right">
        <input value="Registrar" name="R_Registrar" class="btn btn-primary" type="submit">
      </div>
      </form>
    </div>
  </div>
