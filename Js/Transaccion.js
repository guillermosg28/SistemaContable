$().ready(function() {

  $("#agregarT").click(function() {
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
  });

  var listaDebe = new Array();
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
      $("#listaTransacciones").append("<tr id=\"id_"+codigoD+"\"><td>["+codigoD+"] "+nombreD+"</td><td>"+montoD+"</td><td>0</td><td><a href=\"javascript:void(0);\" onClick=\"eliminarDebe('"+codigoD+"','');\" class=\"btn btn-success btn-xs\">Eliminar</a></td></tr>");
      listaDebe.push(codigoD);
    }
  };

  function eliminarDebe(codigo,monto){
    $("#id_"+codigo).remove();
    totalDebe=totalDebe-parseFloat(monto);
      $("#totalDebe").html("Total Debe: "+totalDebe+"");
      for(i=0;i<listaDebe.length;i++){
      if(listaDebe[i]==codigo){
        listaDebe.splice(i,1);
      }
    }
  }



  //HABER JQUERY
  var listaHaber = new Array();
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
      $("#listaTransacciones").append("<tr><td>["+codigoH+"] "+nombreH+"</td><td>0</td><td>"+montoH+"</td><td>accion</td></tr>");
      listaHaber.push(codigoH);
    }
  };


});
