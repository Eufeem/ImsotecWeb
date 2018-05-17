$(() => {
    $("#formUsuario").hide();

    $("#gestionUsuarios").hide();
    $("#gestionUsuarios").toggle("swing");
});

//  ----- Funcionalidad Botones ----- //

// Agregar
$("#btnAgregar").click( () => {
	// bootsVal();
	$("#gestionUsuarios").toggle("swing");
	$("#formUsuario").removeClass("invisible");
	$("#formUsuario").toggle("swing");

	// $("#btnEditarForm").hide();
	// $("#btnGuardar").show();
});


// Regresar
$("#btnRegresar").click( () => {
	regresaFormulario();
});

// *****
// Funciones Create, Read, Update, Delete y limpieza de formulario
// *****

// Limpia el formulario, regresa a la tabla y esconde y muestra botones
function regresaFormulario(){
	// $('#formUsuarios')[0].reset();
    // $('#formUsuarios').bootstrapValidator('destroy');

	$("#formUsuario").toggle("swing");
	$("#gestionUsuarios").toggle("swing");
	// $("#editLabel").hide();
	// $("#addLabel").show();
	// $("#btnGuardarEditar").hide();
	// $("#btnGuardar").show();
}
