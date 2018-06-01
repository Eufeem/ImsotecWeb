/* Funciones CRUD */

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

//@param  datos: Arreglo de datos obtenidos de la tabla
//Elimina Registro
function eliminar(datos){
	let idRegistro = datos[0];
	let usuario = datos[1];
	$("#modalMensaje").empty();
	$("#modalMensaje").append("Se eliminar\u00E1 el registro <b>" + usuario + "</b>");
	$('#modalEliminar').modal('show');
	var json = '{"idUsuario": "'+ idRegistro +'"}';
	var count = 0;

    $("#btnEliminarModal").click(function () {
        if (count == 0) {
    	    console.log(count);
            $.ajax({
                async: false,
                type: 'POST',
                url: 'model/Usuarios/Delete.php',
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                data: json,
                success: function (data) {
                    notifySuccess('Registro Eliminado', 'Se elimino el registro de forma correcta');
                    cargarTabla();
                }
            });
            count++;
        } else {  }
        data = undefined;
    });
}

// Editar Registro
function editar() {
	var idRegistroE = data[0];
	let usuarioE   = $("#usuario").val();
	let passwordE  = $("#contrasena").val();
	let rolE 	   = $("#rol").val();
    let nombreE    = $("#nombre").val();
    let apPaternoE = $("#apPaterno").val();
    let apMaternoE = $("#apMaterno").val();

    var json = '{"idUsuario": "' + idRegistroE + '","usuario": "'+ usuarioE +'", "password": "'+ passwordE +'", "rol": "'+ rolE +'", "nombre": "'+ nombreE +'", "apPaterno": "'+ apPaternoE +'", "apMaterno": "'+ apMaternoE +'"}';

	$.ajax({
        async: false,
        type: 'POST',
        url: 'model/Usuarios/Update.php',
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        data: json,
        success: function (data) {
        	cargarTabla();
        	regresaFormulario();
        	$("#btnGuardarEditar").hide();
        	$("#btnGuardar").show();
        	notifySuccess('Exitoso', 'Se edito el registro de forma correcta');
        }
    });
    data = undefined;
}

// @param  datos: Arreglo de datos obtenidos de la tabla
// Esconde y muestra los titulos del formulario "Agregar y Editar"
// Esconde y muestra los botones del formulario "Agregar y Editar"
// Asigna valores obtenidos de la tabla al formulario
function formEditar(datos) {
    console.log(datos);
	bootsValEditar();
    let rol;
    if (datos[3] == "Administrador") {
        rol = 1;
    } else {
        rol = 2
    }

	$("#editLabel").show();
	$("#addLabel").hide();

	$("#btnGuardarEditar").show();
	$("#btnGuardar").hide();

	$("#gestionDiv").toggle("swing");
	$("#formDiv").removeClass("invisible")
	$("#formDiv").toggle("swing");

	$("#usuario").val(datos[1]);
	$("#contrasena").val(datos[2]);
	$("#rol").val(rol);
    $("#nombre").val(datos[4]);
    $("#apPaterno").val(datos[5]);
    $("#apMaterno").val(datos[6]);
}