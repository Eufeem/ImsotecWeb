// Validación De Campos JS

// Evita ingresar espacios
function validarCampo(e) {
	 tecla = (document.all) ? e.keyCode : e.which;
	 if (tecla == 8)
	     return true;
	 patron = /[^-\s]/;
	 te = String.fromCharCode(tecla);
	 return patron.test(te);
}

// Bootstrap Validator (Valida Formulario)
function bootsVal() {
	$('#form').bootstrapValidator({
	     live: 'enabled',
	     submitButtons: 'button[id="btnGuardar"]',
	     message: 'Valor invalido',
	     fields: {
	     	usuario: {
	             group: '.form-group',
	             validators: {
	                 notEmpty: {
	                     message: 'Campo Usuario Obligatorio'
	                 },
	                 stringLength: {
	                        message: '10 Caracteres m\u00E1ximo',
	                        max: 10
                     }
	             }
	         },
	         contrasena: {
	             group: '.form-group',
	             validators: {
	                 notEmpty: {
	                     message: 'Campo Contrase\u00f1a Obligatorio'
	                 },
	                 stringLength: {
	                        message: '10 Caracteres m\u00E1ximo',
	                        max: 10
	                 }
	             }
	         },
	         rol: {
	             group: '.form-group',
	             validators: {
	                 notEmpty: {
	                     message: 'Campo Rol Obligatorio'
	                 }
	             }
	         },
             nombre: {
	             group: '.form-group',
	             validators: {
	                 notEmpty: {
	                     message: 'Campo Nombre Obligatorio'
	                 },
	                 stringLength: {
	                        message: '10 Caracteres m\u00E1ximo',
	                        max: 10
	                 }
	             }
	         },
             apPaterno: {
	             group: '.form-group',
	             validators: {
	                 notEmpty: {
	                     message: 'Campo Apellido Paterno Obligatorio'
	                 },
	                 stringLength: {
	                        message: '10 Caracteres m\u00E1ximo',
	                        max: 10
	                 }
	             }
	         },
             apMaterno: {
	             group: '.form-group',
	             validators: {
	                 notEmpty: {
	                     message: 'Campo Apellido Materno Obligatorio'
	                 },
	                 stringLength: {
	                        message: '10 Caracteres m\u00E1ximo',
	                        max: 10
	                 }
	             }
	         }
	     }
	 });
}

//function bootsValEditar() {
//	 $('#formUsuarios').bootstrapValidator({
//	     live: 'enabled',
//	     submitButtons: 'button[id="btnGuardarEditar"]',
//	     message: 'Valor invalido',
//         fields: {
//	     	usuario: {
//	             group: '.form-group',
//	             validators: {
//	                 notEmpty: {
//	                     message: 'Campo Usuario Obligatorio'
//	                 },
//	                 stringLength: {
//	                        message: '10 Caracteres m\u00E1ximo',
//	                        max: 10
//                     }
//	             }
//	         },
//	         contrasena: {
//	             group: '.form-group',
//	             validators: {
//	                 notEmpty: {
//	                     message: 'Campo Contrase\u00f1a Obligatorio'
//	                 },
//	                 stringLength: {
//	                        message: '10 Caracteres m\u00E1ximo',
//	                        max: 10
//	                 }
//	             }
//	         },
//	         rol: {
//	             group: '.form-group',
//	             validators: {
//	                 notEmpty: {
//	                     message: 'Campo Rol Obligatorio'
//	                 }
//	             }
//	         }
//	     }
//	 });
//}