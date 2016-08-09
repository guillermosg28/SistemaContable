<div class="page-header">
  <h1><span class="text-light-gray">Usuario / </span>Listar</h1>
</div> <!-- / .page-header -->



<div class="row">
  <div class="col-sm-12">

    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Usuario</span>
      </div>
      <div class="panel-body">
        <div class="row">
          <table class="table">
            <thead>
              <tr>
                <th>Codigo</th>
                <th>Usuario</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $datoUsuario = $objUsuario->Listar_Usuarios();
              foreach ($datoUsuario as $rowC):
                ?>
                <tr id="cuenta_<?=$rowC['usuario_codigo']?>">
                  <td><?=$rowC['usuario_codigo']?></th>
                  <td><?=$rowC['usuario_usuario']?></th>
                  <td> <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="eliminarCuenta('<?=$rowC['usuario_codigo']?>');">Eliminar</a></td>

                <tr>
                  <?php endforeach ?>
              </tbody>
            </table>
        </div>

      </div>

    </div>
  </div>


</div>

<script type="text/javascript">
  function eliminarCuenta(codigo){
    $("#cuenta_"+codigo+"").remove();
    eliminarCuentaBD(codigo);
  }
  function eliminarCuentaBD(codigo){
    var data="accion=eliminarCuenta&codigo="+codigo+"";
    $.post("Controlador/contUsuario.php",data);
  }
</script>
