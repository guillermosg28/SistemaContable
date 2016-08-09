<?php

?>

<div class="page-header">
  <h1><i class="fa fa-search page-header-icon"></i>Periodos: </h1>
</div> <!-- / .page-header -->

<div class="row">
  <div class="col-sm-12">

    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Lista de Periodos</span>
      </div>
      <div class="panel-body">

        <table class="table">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Empresa</th>
              <th>Fecha Inicio</th>
              <th>Fecha Fin</th>
              <th>Estado</th>
              <th>Cuentas</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $datoPeriodo = $objPeriodo->Listar_Periodos();
            foreach ($datoPeriodo as $rowP):
              ?>
              <tr>
                <td><?=$rowP['periodo_codigo']?></td>
                <td><?=$rowP['periodo_empresa']?></td>
                <td><?=$rowP['periodo_inicio']?></td>
                <td><?=$rowP['periodo_fin']?></td>
                <td><?=$rowP['periodoestado_descripcion']?></td>
                <?php
                if ($rowP['periodo_cuenta']==1) {
                  ?>
                  <td id="aperturar_<?=$rowP['periodo_codigo']?>"><a href="javascript:void(0);" class="btn btn-success btn-sm" onclick="aperturar('<?=$rowP['periodo_codigo']?>');"><?=$rowP['cuentaestado_descripcion']?></a></td>
                  <?php
                }
                if ($rowP['periodo_cuenta']==2) {
                  ?>
                  <td><a href="javascript:void(0);" class="btn btn-danger btn-sm"><?=$rowP['cuentaestado_descripcion']?></a></td>
                  <?php
                }
                if ($rowP['periodo_cuenta']==3) {
                  ?>
                  <td><a href="javascript:void(0);" class="btn btn-info btn-sm"><?=$rowP['cuentaestado_descripcion']?></a></td>
                  <?php } ?>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>

        </div>
      </div>


    </div>
  </div>


  <script type="text/javascript">
  function aperturar(id){
    $("#aperturar_"+id).html("<td><a href=\"javascript:void(0);\" class=\"btn btn-info btn-sm\">Aperturado</a></td>");
    aperturarBD(id);
  };
  function aperturarBD(id){
    var data="accion=Aperturar&id="+id+"";
    $.post("Controlador/contPeriodo.php",data);
  };


  </script>
