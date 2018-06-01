// Funcionalidad Botones JS

// Agregar
$("#btnAgregar").click( () => {
	bootsVal();
	$("#gestionDiv").toggle("swing");
	$("#formDiv").removeClass("invisible");
	$("#formDiv").toggle("swing");

	$("#btnEditarForm").hide();
	$("#btnGuardar").show();
});

//Eliminar
$("#btnEliminar").click(() => {
	if (data != undefined) {
		console.log(data);
		eliminar(data);
	} else {
		notifyWarning('Error', 'No se ha seleccionado ningun registro a eliminar');
	}
});

// Regresar
$("#btnRegresar").click( () => {
	regresaFormulario();
});

// Editar
$("#btnEditar").click(() => {
	bootsValEditar();
	if (data != undefined) {
		formEditar(data);
	} else {
		notifyWarning('Error', 'No se ha seleccionado ningun registro a editar');
	}
});

/*
 * Consultar
 * Insertar
 * Actualizar
 * Eliminar
 * Limpiar Formulario
 */

function regresaFormulario(){
	$('#form')[0].reset();
    $('#form').bootstrapValidator('destroy');

	$("#formDiv").toggle("swing");
	$("#gestionDiv").toggle("swing");
	$("#editLabel").hide();
	$("#addLabel").show();
	$("#btnGuardarEditar").hide();
	$("#btnGuardar").show();
}
