<!-- Header -->
<?php include('/templates/header.php'); ?>
<?php include('/templates/sidebar.php'); ?>
<?php include('/templates/mainPanel.php'); ?>

<div class="row" id="gestionDiv">
  <div class="col-md-12">
      <div class="card">
          <div class="card-header">
              <h5 class="title"> <i class="fas fa-user"></i> Usuarios</h5>
          </div>

          <div class="card-body">
              <p>Selecciona los registros a gestionar.</p>
              <div class="row">
                  <div class="col-12 col-sm-3 col-md-2 col-lg-2 col-xl-2">
                      <button type="button" class="btn btn-info btn-round btn-block" id="btnAgregar">
                          <i class="fa fa-plus-circle"></i> Agregar
                      </button>
                  </div>
                  <div class="col-12 col-sm-3 col-md-2 col-lg-2 col-xl-2">
                      <button type="button" class="btn btn-warning btn-round btn-block" id="btnEditar">
                          <i class="fa fa-edit"></i> Editar
                      </button>
                  </div>
                  <div class="col-12 col-sm-3 col-md-2 col-lg-2 col-xl-2">
                      <button type="button" class="btn btn-danger btn-round btn-block" id="btnEliminar">
                          <i class="fa fa-trash-alt"></i> Eliminar
                      </button>
                  </div>
              </div>

              <div class="row">
                  <div class="col-12 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
                  <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                      <div class="table">
                          <table class="table-bordered table-hover" id="dtUsuarios" style="width:100% !important;">
                              <thead>
								<tr>
                                    <th>id</th>
                                    <th>Usuario</th>
                                    <th>Contraseña</th>
                                    <th>Rol</th>
									<th>Nombre</th>
									<th>Ap Paterno</th>
									<th>Ap Materno</th>
                                </tr>
							 </thead>
						  </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<div class="row invisible" id="formDiv">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title" id="addLabel"> <i class="fas fa-plus"></i> Agregar Usuario</h5>
                <h5 class="title" id="editLabel"><i class="fa fa-edit"></i> Editar Usuario</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                        <button type="button" class="btn btn-danger btn-round btn-block" id="btnRegresar">
                            <i class="fa fa-reply"></i> Regresar
                        </button>
                    </div>
                </div>

                <form id="form">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>Usuario</label>
                                <input type="text" class="form-control" placeholder="Ingrese El Usuario"
                                       id="usuario" name="usuario" onkeypress="return validarCampo(event)">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="text" class="form-control" placeholder="Ingrese El Usuario"
                                        id="contrasena" name="contrasena" onkeypress="return validarCampo(event)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>Rol</label>
                                <select class="form-control" id="rol" name="rol">
                                	<option disabled selected value>Selecciona</option>
                                    <option value="1">Adminitrador</option>
                                    <option value="2">Usuario</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Ingrese El Nombre"
                                	   id="nombre" name="nombre" onkeypress="return validarCampo(event)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>Apellido Paterno</label>
                                <input type="text" class="form-control" placeholder="Ingrese El Apellido Paterno"
                                       id="apPaterno" name="apPaterno" onkeypress="return validarCampo(event)">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label>Apellido Materno</label>
                                <input type="text" class="form-control" placeholder="Ingrese El Apellido Materno"
                                	   id="apMaterno" name="apMaterno" onkeypress="return validarCampo(event)">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <hr>
                            <button type="button" class="btn btn-info pull-right" id="btnGuardarEditar">
                                <i class="fa fa-edit"></i> Editar
                            </button>
                            <button type="button" class="btn btn-info pull-right" id="btnGuardar">
                                <i class="fas fa-check"></i> Guardar
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 id="modalMensaje" class="text-center"></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-info" data-dismiss="modal"
				id="btnEliminarModal">
				<i class="fa fa-check"></i> Aceptar
		</button>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript's -->
<script src="modules/admin.js" charset="utf-8"></script>
<script src="modules/Usuarios/usuario.js" charset="utf-8"></script>
<script src="modules/Usuarios/crud.js" charset="utf-8"></script>
<script src="modules/Usuarios/dataTable.js" charset="utf-8"></script>
<script src="modules/Usuarios/botones.js" charset="utf-8"></script>
<script src="modules/Usuarios/bootstrapValidator.js" charset="utf-8"></script>

<?php include('/templates/footer.php'); ?>
<?php include('/templates/plugins.php'); ?>
