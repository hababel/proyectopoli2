<div class="content-wrapper" style="min-height: 534px;">

  <div class="content-header">
    <div class="container-fluid">
      <button type="button" class="btn btn" style="background-color: #196945; color:white" data-toggle="modal" data-target="#nuevousuario" data-ideditarusuario="0" onclick="formusuarionuevo();">
        <i class="fas fa-user-plus" style="color: #29AB70"></i> Nuevo usuario
      </button>
    </div>
  </div>


  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped table-responsive dataTable no-footer" id="tabla_usuarios">
            <thead class="thead-inverse">
              <tr>
                <th>Nombre</th>
                <th>Nombre Corto</th>
                <th>Correo</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Config</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>


<!-- Modal Usuario nuevo -->
<div class="modal fade" id="nuevousuario" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form method="post" id="form_usuarionuevo">
        <div class="modal-header">
          <h5 class="modal-title" id="titulo_moda_nuevousuario"></h5>
          <input type="hidden" id="id_editarusuario" name="id_editarusuario">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="">Nombre</label>
                  <input type="text" class="form-control" name="nombre_usuarionuevo" id="nombre_usuarionuevo" aria-describedby="helpId" placeholder="" required autocomplete="off" autocapitalize="on">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="">Correo</label>
                  <input type="email" class="form-control" name="correo_usuarionuevo" id="correo_usuarionuevo" aria-describedby="helpId" placeholder="" required autocomplete="off">
                  <input type="hidden" name="comparacorreo" id="comparacorreo">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="">Nombre corto</label>
                  <input type="text" name="nombre_corto" id="nombre_corto" class="form-control" required="required" required>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="">Perfil</label>
                  <select name="perfil_usuarionuevo" id="perfil_usuarionuevo" class="form-control" required="required" required>
                    <option value="" selected="selected">Seleccionar el perfil</option>
                    <?php
                    foreach ($listaTiposUsuario as $key => $value) { ?>

                      <option value="<?php echo $value->id_tipo_usuario; ?>" selected="selected"><?php echo $value->desc_tipo; ?></option>

                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col" style="margin-top:auto;margin-bottom: auto;">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for=""></label>
                      <div class="icheck-success">
                        <input type="checkbox" style="display: none;" id="estadousuario" name="estadousuario" onchange="mostrarestadousuario();" checked>
                        <label for="estadousuario">
                          <div class="col-md-6" id="mostrarestadousuario" style="margin-top:auto;margin-bottom: auto;"></div>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" id="clavesusuarionuevo">
              <div class="col">
                <div class="form-group">
                  <label for="">Clave</label>
                  <input type="password" class="form-control" name="pass_usuarionuevo" id="pass_usuarionuevo" aria-describedby="helpId" placeholder="" minlength="6" required>
                  <small id="passwordHelpBlock" class="form-text text-muted">
                    La clave debe ser mayor de 5 caracteres.
                  </small>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="">Repetir clave</label>
                  <input type="password" class="form-control" name="pass2_usuarionuevo" id="pass2_usuarionuevo" aria-describedby="helpId" placeholder="" required>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">

              <div class="alert alert-danger alert-dismissible fade show ocultar" id="error" role="alert">
                Las Contraseñas no coinciden, vuelve a intentar.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="botonlogin" onclick="verificarForm();"><i class="fas fa-save"></i> Guardar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Cambio Clave-->
<div class="modal fade" id="modalcambioclave" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cambiar Clave - <b><span id="usercambioclave"></span></b></h5>
        <input type="hidden" name="idusuariocambioclave" id="idusuariocambioclave">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Nueva Clave</label>
          <div class='input-group-append'>
            <input type="password" class="form-control" name="nuevaclaveusuario" id="nuevaclaveusuario" placeholder="" required autocomplete="off">
            <button id='show_password' class='btn btn-primary' type='button' onclick='mostrarPassword()'> <span class='fa fa-eye-slash icon'></span> </button>
          </div>
          <small id="passwordHelpBlock" class="form-text text-muted">
            La clave debe ser mayor de 5 caracteres.
          </small>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="cambioclaveusuario()" ;>Cambiar</button>
      </div>
    </div>
  </div>
</div>

<style>
  .ocultar {
    display: none;
  }

  .mostrar {
    display: flex;
  }

  #tabla_usuarios{
    width: 100% !important;
  }
</style>

<script>
  $(document).ready(function() {
    formusuarionuevo();
    mostrarestadousuario();
    lista_usuarios();

    $('#modalcambioclave')
      .on('hide.bs.modal', function() {
        $("#usercambioclave").html('');
        $("#nuevaclaveusuario").val('');
        $("#nuevaclaveusuario").attr('type', 'password');
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
      })
  });
</script>