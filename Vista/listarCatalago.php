
<div class="page-header">
  <h1><span class="text-light-gray">Catalago / </span>Listar</h1>
</div> <!-- / .page-header -->



<div class="row">
  <div class="col-sm-12">

    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Transaccion</span>
      </div>
      <div class="panel-body">
        <div class="row">
          <table class="table">
            <thead>
              <tr>
                <th>Codigo</th>
                <th>Cuenta</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $datoCatalago = $objCatalago->Listar_Catalagos();
              foreach ($datoCatalago as $rowC):
                ?>
                <tr id="cuenta_<?=$rowC['catalago_codigo']?>">
                  <td><?=$rowC['cuenta_codigo']?></td>
                  <td><?=$rowC['cuenta_nombre']?></td>
                  <td> <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="eliminarCuenta('<?=$rowC['catalago_codigo']?>');">Eliminar</a></td>

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
    $.post("Controlador/contCuenta.php",data);
  }
</script>
