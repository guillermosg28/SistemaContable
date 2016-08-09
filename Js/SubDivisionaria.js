$().ready(function() {

  consultar_Tipo();
  function consultar_Tipo() {
    var data="accion=listarTipos";
    $.post("Controlador/contCuenta.php", data, function (data_devuelta) {
      $("#selectTipo").html(data_devuelta);
    });
  }

    $("#selectTipo").change(function(){
      var tipo=$("#selectTipo").val();
      imprimeCuentas(tipo);
    });


  function imprimeCuentas(tipo){
    var data="accion=ListarCuentas&tipo="+tipo+"";
    $.post("Controlador/contCuenta.php", data, function (data_devuelta) {
      $("#selectCuenta").html(data_devuelta);
      document.formularioSubCuenta.r_cuenta.disabled=false;
    });
  }

  $("#selectCuenta").change(function(){
    var cuenta=$("#selectCuenta").val();
    imprimeSubCuentas(cuenta);
  });

  function imprimeSubCuentas(cuenta){
    var data="accion=ListarSubCuentas&cuenta="+cuenta+"";
    $.post("Controlador/contCuenta.php", data, function (data_devuelta) {
      $("#selectSubCuenta").html(data_devuelta);
      document.formularioSubCuenta.r_subcuenta.disabled=false;
    });
  }

  $("#selectSubCuenta").change(function(){
    var subcuenta=$("#selectSubCuenta").val();
    imprimeDivisionarias(subcuenta);
  });

  function imprimeDivisionarias(subcuenta){
    var data="accion=ListarDivisionaria&subcuenta="+subcuenta+"";
    $.post("Controlador/contCuenta.php", data, function (data_devuelta) {
      $("#selectDivisionaria").html(data_devuelta);
      document.formularioSubCuenta.r_subdivisionaria.disabled=false;
    });
  }




});
