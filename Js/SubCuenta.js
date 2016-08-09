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


});
