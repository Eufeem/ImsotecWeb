function guardar() {
	var usuario   = $("#usuario").val();
	var password  = $("#contrasena").val();
	var rol 	  = $("#rol").val();
    var nombre    = $("#nombre").val();
    var apPaterno = $("#apPaterno").val();
    var apMaterno = $("#apMaterno").val();

    var json = '{"usuario": "'+ usuario +'", "password": "'+ password +'", "rol": "'+ rol +'", "nombre": "'+ nombre +'", "apPaterno": "'+ apPaterno +'", "apMaterno": "'+ apMaterno +'"}';


	$.ajax({
        async: false,
        type: 'POST',
        url: 'model/Usuarios/Insert.php',
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        data: json,
        success: function (data) {
        	notifySuccess('Registro Agregado', 'Se agrego el registro de forma correcta');
        	cargarTabla();
        	regresaFormulario();
        }
    });
}


function serializeArrayToJson(frm) {
    var data1 = $(frm).serializeArray();
    var data = {};
    $.each(data1, function(i, d) {
        data[d.name] = d.value
    });
    return data;
}
