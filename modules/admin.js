// Notify Home
function notifyInicial(){
    $.notify({
        icon: 'fa fa-home',
        title: 'Bienvenido <b>Tronco</b>',
        message: 'Holi.'
    },{
        type: 'info',
        timer: 1000,
        placement: {
            from: "top",
            align: "center"
        }
    });
}

// Notify Success
function notifySuccess(titulo, mensaje) {
    $.notify({
        icon: 'fas fa-check-square',
        title: titulo,
        message: mensaje
    },{
        type: 'success',
        timer: 1000,
        placement: {
            from: "top",
            align: "right"
        }
    });
}

// Notify Error
function notifyError(titulo, mensaje) {
    $.notify({
        icon: 'fas fa-times',
        title: titulo,
        message: mensaje
    },{
        type: 'danger',
        timer: 1000,
        placement: {
            from: "top",
            align: "right"
        }
    });
}

// Notify Precaución
function notifyWarning(titulo, mensaje) {
    $.notify({
        icon: 'fas fa-exclamation-circle',
        title: titulo,
        message: mensaje
    },{
        type: 'warning',
        timer: 1000,
        placement: {
            from: "top",
            align: "center"
        }
    });
}

// Notify Información
function notifyInfo(titulo, mensaje) {
    $.notify({
        icon: 'fas fa-check-square',
        title: titulo,
        message: mensaje
    },{
        type: 'info',
        timer: 1000,
        placement: {
            from: "top",
            align: "right"
        }
    });
}
