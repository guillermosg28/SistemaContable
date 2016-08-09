<style media="screen">
.listaSeleccionar{
  padding: 0;
  margin: 0;
}
.listaSeleccionar li{
  list-style: none;
  margin-bottom: 3px;
}
.listaSeleccionar li a{
  color: #555;
  font-size: 13px;
}
.listaSeleccionar li a:hover{
  text-decoration: underline;
}
.inputTexto{
  height: 20px;
  margin-top: 5px;
}
</style>
<script type="text/javascript">
function abrirSubCuentas(codigo,nombre){
  $('#cuentaAbierta').toggleClass('collapsed');
  $('#collapseTwo-success').removeClass('in');
  $('#collapseTwo-success').toggleClass('collapse');
  $('#collapseTwo-success').css('height','0');
  $('#codigoCD').html('<div id="codigoCD"><b>Cuenta</b>: '+codigo+'</div>');
  $('#nombreCD').html('<div id="nombreCD"><b>Nombre:</b> '+nombre+'</div>');
  $('#codigoCuenta').val(codigo);
  $('#nombreCuenta').val(nombre);
}

function agregarTransaccion(){
  var codigoCuenta = $("#codigoCuenta").val();
  var nombreCuenta = $("#nombreCuenta").val();
  var montoT = $("#montoT").val();
  var tipoT = $("#tipoT").val();
  if (tipoT=="D") {
    agregarDebeT(codigoCuenta,nombreCuenta,montoT);
  }
  if (tipoT=="H") {
    agregarHaberT(codigoCuenta,nombreCuenta,montoT);
  }
}


var listaDebe = new Array();
var listaMontoDebe = new Array();
var totalDebe = 0;

function agregarDebeT(codigoD,nombreD,montoD){
  var bandD = true;
  for(i=0;i<listaDebe.length;i++){
    if(listaDebe[i]==codigoD){
      alert("Cuenta ya existe");
      bandD = false;
    }
  }

  if(bandD){
    totalDebe=totalDebe+parseFloat(montoD);
    $("#totalDebe").html("Total Debe: "+totalDebe+"");
    $("#listaTransacciones").append("<tr id=\"id_"+codigoD+"\"><td>["+codigoD+"] "+nombreD+"</td><td>"+montoD+"</td><td>0</td><td><a href=\"javascript:void(0);\" onClick=\"eliminarDebe('"+codigoD+"','"+montoD+"');\" class=\"btn btn-success btn-xs\">Eliminar</a></td></tr>");
    listaDebe.push(codigoD);
    listaMontoDebe.push(montoD);
  }
};

function eliminarDebe(codigo,monto){
  $("#id_"+codigo).remove();
  totalDebe=totalDebe-parseFloat(monto);
  $("#totalDebe").html("Total Debe: "+totalDebe+"");
  for(i=0;i<listaDebe.length;i++){
    if(listaDebe[i]==codigo){
      listaDebe.splice(i,1);
      listaMontoDebe.splice(i,1);
    }
  }
}

//HABER JQUERY
var listaHaber = new Array();
var listaMontoHaber = new Array();
var totalHaber = 0;

function agregarHaberT(codigoH,nombreH,montoH){
  var bandH = true;
  for(i=0;i<listaHaber.length;i++){
    if(listaHaber[i]==codigoH){
      alert("Cuenta ya existe");
      bandH = false;
    }
  }

  if(bandH){
    totalHaber=totalHaber+parseFloat(montoH);
    $("#totalHaber").html("Total Haber: "+totalHaber+"");
    $("#listaTransacciones").append("<tr id=\"ih_"+codigoH+"\"><td>["+codigoH+"] "+nombreH+"</td><td>0</td><td>"+montoH+"</td><td><a href=\"javascript:void(0);\" onClick=\"eliminarHaber('"+codigoH+"','"+montoH+"');\" class=\"btn btn-success btn-xs\">Eliminar</a></td></tr>");
    listaHaber.push(codigoH);
    listaMontoHaber.push(montoH);
  }
};

function eliminarHaber(codigo,monto){
  $("#ih_"+codigo).remove();
  totalHaber=totalHaber-parseFloat(monto);
  $("#totalHaber").html("Total Haber: "+totalHaber+"");
  for(i=0;i<listaHaber.length;i++){
    if(listaHaber[i]==codigo){
      listaHaber.splice(i,1);
      listaMontoHaber.splice(i,1);
    }
  }
}

//GUARDAR TRANSACCION
function guardarTransaccion(){
  var txtGlosa = $("#txtGlosa").val();
  if (totalHaber==0 && totalDebe==0) {
    alert("Por favor ingrese transacciones");
  }else{
    if (totalHaber==totalDebe) {
      if (txtGlosa=="") {
        alert("Ingrese descripcion de la Glosa");
      }else {
        guardarTotalTransaccion(totalDebe,txtGlosa);
        guardarTransaccionBD();
        alert("Transaccion registrada correctamente");
        window.location="registrarTransaccion";
      }
    }else{
      alert("Los montos del DEBE y del HABER no equilibran");
    }
  }
}


function guardarTotalTransaccion(total,nombre){
  var data="accion=IngresarTransaccion&total="+total+"&nombre="+nombre+"";
  $.post("Controlador/contTransaccion.php", data, function (data_devuelta) {
  });
}

function guardarTransaccionBD(){
  for(i=0;i<listaDebe.length;i++){
    insertarDebe(listaDebe[i],listaMontoDebe[i]);
  }
  for(i=0;i<listaHaber.length;i++){
    insertarHaber(listaHaber[i],listaMontoHaber[i]);
  }

}

function insertarDebe(codigo,monto){
  var data="accion=IngresarDebe&codigoD="+codigo+"&montoD="+monto+"";
  $.post("Controlador/contTransaccion.php", data, function (data_devuelta) {
  });
}

function insertarHaber(codigo,monto){
  var data="accion=IngresarHaber&codigoH="+codigo+"&montoH="+monto+"";
  $.post("Controlador/contTransaccion.php", data, function (data_devuelta) {
  });
}


</script>
<div class="page-header">
  <h1><span class="text-light-gray">Transaccion / </span>Registrar</h1>
</div> <!-- / .page-header -->


<div class="row">
  <div class="col-sm-8">

    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Catalago</span>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12">

            <!-- Success -->
            <div class="panel-group panel-group-success" id="accordion-success-example">

              <div class="panel">
                <div class="panel-heading">
                  <a class="accordion-toggle collapsed" id="cuentaAbierta" data-toggle="collapse" data-parent="#accordion-success-example" href="#collapseTwo-success">
                    CATALAGO
                  </a>
                </div> <!-- / .panel-heading -->
                <div id="collapseTwo-success" class="panel-collapse collapse">
                  <div class="panel-body">
                    <ul class="listaSeleccionar">
                      <?php
                      $rs=$objCatalago->Listar_Catalagos("");
                      while($dato=$rs->fetchObject()){
                        echo "<li><a href=\"javascript:void(0);\" onclick=\"abrirSubCuentas('".$dato->cuenta_codigo."','".$dato->cuenta_nombre."');\"><span class=\"badge badge-success\">".$dato->cuenta_codigo."</span> ".$dato->cuenta_nombre."</a></li>";
                      }
                      ?>

                    </ul>
                  </div> <!-- / .panel-body -->
                </div> <!-- / .collapse -->
              </div> <!-- / .panel -->
            </div> <!-- / .panel-group -->
            <!-- / Success -->
          </div>

        </div>

      </div>
    </div>
    <!-- /13. $ACCORDION_COLORS -->

  </div>
</div>


<div class="row">
  <div class="col-sm-6">

    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Transaccion</span>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
            <div id="codigoCD"><b>Cuenta</b>: ---</div>
          </div>
          <div class="col-md-12">
            <div id="nombreCD"><b>Nombre:</b> ---</div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label><b>Monto:</b> </label>
              <input type="text" id="montoT" value="" class="inputTexto">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label><b>Tipo:</b> </label>
              <select id="tipoT">
                <option value="D">DEBE</option>
                <option value="H">HABER</option>
              </select>
              <input type="hidden" id="codigoCuenta" value="">
              <input type="hidden" id="nombreCuenta" value="">
            </div>
          </div>

        </div>

      </div>

      <div class="panel-footer text-right">
        <input type="submit" id="agregarT" onclick="agregarTransaccion();" class="btn btn-primary" value="Agregar">
      </div>

    </div>
  </div>

  <div class="col-sm-6">

    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Glosa</span>
      </div>
      <div class="panel-body">
        <div class="row">
          <input class="col-md-12" type="text" id="txtGlosa" value="">
        </div>
      </div>
      <div class="panel-footer text-right">
        <input type="submit" onclick="guardarTransaccion();" class="btn btn-primary" value="Guardar">
      </div>
    </div>
  </div>
</div>




<div class="row">
  <div class="col-sm-12">

    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">Transacciones</span>
      </div>
      <div class="panel-body">
        <div class="row">

          <table class="table">
            <thead>
              <tr>
                <th>Cuenta</th>
                <th>Debe</th>
                <th>Haber</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody id="listaTransacciones">

            </tbody>
          </table>

          <p style="text-align:center;"><b id="totalDebe">Total Debe: 0</b>&ensp;&ensp;&ensp;&ensp;&ensp;<b id="totalHaber">Total Haber: 0</b></p>


        </div>

      </div>

    </div>
  </div>


</div>
