// Funcionalidad Botones JS

// Agregar
$("#btnAgregar").click( () => {
	bootsVal();
	$("#gestionDiv").toggle("swing");
	$("#formDiv").removeClass("invisible");
	$("#formDiv").toggle("swing");

	// $("#btnEditarForm").hide();
	// $("#btnGuardar").show();
});


// Regresar
$("#btnRegresar").click( () => {
	regresaFormulario();
});

/*
 * Consultar
 * Insertar
 * Actualizar
 * Eliminar
 * Limpiar Formulario
 */

function regresaFormulario(){
	// $('#form')[0].reset();
    // $('#form').bootstrapValidator('destroy');

	$("#formDiv").toggle("swing");
	$("#gestionDiv").toggle("swing");
	// $("#editLabel").hide();
	// $("#addLabel").show();
	// $("#btnGuardarEditar").hide();
	// $("#btnGuardar").show();
}