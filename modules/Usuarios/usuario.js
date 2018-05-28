// Variables Globales
var table;
var data;

$(() => {

    $("#formDiv").hide();
    $("#gestionDiv").hide();
    $("#gestionDiv").toggle("swing");

    $("#btnGuardarEditar").hide();
    $("#editLabel").hide();

    notifyInicial();
    initDataTable();
    init();
});

function init() {

	// Guarda Registro
	$('#btnGuardar').click(function () {
		console.log("btnGuardar");
		$('#form').data('bootstrapValidator').validate();
	    var n = $('#form').data('bootstrapValidator').isValid();
		 if (n) {
			 guardar();
		} else {
			$('#btnGuardar').prop("disabled", true);
            notifyError('Error', 'Verificar datos ingresados');
			bootsVal();
		}
	});

    // Actualiza Registro
//	$("#btnGuardarEditar").click(() => {
//		$('#form').data('bootstrapValidator').validate();
//	    var n = $('#form').data('bootstrapValidator').isValid();
//	    if (n) {
//			 editarUsuario();
//		} else {
//			$('#btnGuardarEditar').prop("disabled", true);
//            notifyError('Error', 'Verificar datos ingresados');
//			bootsValEditar();
//		}
//	})
}
