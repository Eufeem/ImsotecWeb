// DataTable Usuarios JS

function initDataTable() {
	
	var datos = [];
	$.ajax({
        async: false,
        type: 'GET',
        url: 'model/Usuarios/Get.php',
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        success: function (data) {
            $.each(data, function(i, item){
                $.each(item, function (index1, item1) {
					if (item1.rol == 1) {
						var rol = 'Administrador'
					} else {
						var rol = 'Usuario'
					}
                    datos.push([item1.idUsuario, item1.usuario, item1.password, rol,
                                item1.nombre, item1.apPaterno, item1.apMaterno]);
                });
            });
        }
    });

	table = $('#dtUsuarios').DataTable({
		"aLengthMenu": [
            [5, 10, 25, 50],
            [5, 10, 25, 50]
        ],
        "oLanguage": {
            "sUrl": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        data: datos,
        responsive: true,
        dom: "<'row'<'col-sm-4'l><'col-sm-4'f><'col-sm-4'B>>" +
        	 "t" +
        	 "<'row'<'col-sm-6'i><'col-sm-6'p>>",
        buttons: [
                // 'copy',
                {
                    extend:   'pdf',
                    text:     'Archivo PDF',
                    filename: 'ReporteUsuarios' + obtenerFecha()
                },
                {
                    extend: 'excel',
                    text: 'Archivo Excel',
                    filename: 'ReporteUsuarios' + obtenerFecha()
                }],
        columns: [
        	{
	        	title: "id",
                visible: false
	        }, {
	        	title: "Usuario"
	        }, {
	        	title: "Contrase\u00f1a",
	        	visible: false
	        }, {
	        	title: "Rol"
	        }, {
                title: "Nombre"
            }, {
                title: "Ap Paterno"
            }, {
                title: "Ap Materno"
            }
        ]
	});

	// Obtiene los parametros de la tabla con un click
	$('#dtUsuarios tbody').on('click', 'tr', function () {
		data = table.row( this ).data();
	});


	// Selecciona y pinta el registro seleccionado
	$('#dtUsuarios tbody').on('click', 'tr', function () {
		$(this).addClass('selected');

        if ($(this).hasClass('selected') != true) {
            $(this).removeClass('selected');
        } else {
            $('#dtUsuarios').DataTable().$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

	// Obtiene los datos y lleva al formulario para editar el registro
	$('#dtUsuarios tbody').on('dblclick', 'tr', function () {
		data = table.row( this ).data();
		formEditar(data);
    });
}

// Refresca los datos de la tabla
function cargarTabla() {
    var datos = [];
    $.ajax({
        async: false,
        type: 'GET',
        url: 'model/Usuarios/Get.php',
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        success: function (data) {
			$.each(data, function(i, item){
                $.each(item, function (index1, item1) {

					if (item1.rol == 1) {
						var rol = 'Administrador'
					} else {
						var rol = 'Usuario'
					}
                    datos.push([item1.idUsuario, item1.usuario, item1.password, rol,
                                item1.nombre, item1.apPaterno, item1.apMaterno]);
                });
            });
        }
    });

    table.clear();
    table.rows.add(datos);
    table.draw();
}


function obtenerFecha() {
    var dt = new Date();
    var month = dt.getMonth()+1;
    var day = dt.getDate();
    var year = dt.getFullYear();
    return(day + '-' + month + '-' + year);
}