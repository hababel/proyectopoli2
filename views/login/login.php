<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Proyecto-POLI- 2022</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo URL_PATH; ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo URL_PATH; ?>assets/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo URL_PATH; ?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo URL_PATH; ?>assets/dist/css/style.css">

  <style>


  </style>


  <!-- jQuery -->
  <script src="<?php echo URL_PATH; ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo URL_PATH; ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Toastr -->
  <script src="<?php echo URL_PATH; ?>assets/plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo URL_PATH; ?>assets/dist/js/adminlte.min.js"></script>
  


</head>


<body class="hold-transition login-page">
  
  <?php 

  $Datamessage = (!empty($_SESSION['Datamessage'])) ? $_SESSION['Datamessage'] : null;


  if ($Datamessage != null || $Datamessage) {

    $statusmsg = $Datamessage['message']['error'];
    $typemsg = $Datamessage['message']['type'];
    $titlemsg = $Datamessage['message']['title'];
    $textmsg = $Datamessage['message']['msg'];

    unset($_SESSION['Datamessage']);

    echo "
      <script>
          toastr." . $typemsg . "(
            '" . $textmsg . "', '" . $titlemsg . "', {
              showDuration: 400,
              'progressBar': true,
              'closeButton': true,
              'iconClass': 'toast-" . $typemsg . "'
            })
      </script>
    ";
  }

  ?>

  <div class="login-box">
    <div class="login-logo">
      <a href="" style="color:#196945"><b style="color: #29AB70">Proyecto</b>-POLI</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Iniciar sesion</p>

        <form action="login/validalogin" id="login_form" method="post">
          <div class="input-group mb-3">
            <input type="email" name="email_input" id="email_input" class="form-control" placeholder="a@b.com" autocomplete="off" value="" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope" style="color: #29AB70"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" id="pass_input" name="pass_input" class="form-control" placeholder="Contraseña" autocomplete="off" value="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock" style="color: #29AB70"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="button" id="login_user" name="login_user" class="btn btn btn-block" style="background-color: #196945; color:white" onclick="validar_form_login();">Entrar</button>
            </div>
          </div>
        </form>
        <div>
          <div class="row">
            <div class="col">
            <p class="mb-1" style="margin-top: 20px; text-align: center;">
            <a href="login/forgotpass" style="color: #29AB70" >Recordar clave</a>
            <a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" href="" style="color: #29AB70; margin-left: 120px">Regístrate</a>
          </p>
            </div>
          </div>      
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Registro de usuario</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="formulario" action="">
        <fieldset>
                    <div class="contenedor-campos">
      
                      <div class="campo">
                            <label>Nombre Completo</label>
                            <input class="input-text" type="text" placeholder="Tu Nombre completo" name="nombre_usuarionuevo" id="nombre_usuarionuevo" aria-describedby="helpId" autocomplete="off">
                            <div id="errorNombre"></div>
                          </div>

                        <div class="campo">
                            <label>Nombre Corto</label>
                            <input class="input-text" type="text" name="nombre_corto" id="nombre_corto"  placeholder="Tu Nombre corto" >
                            <div id="errorNombreCorto"></div>
                        </div>

                      <div class="campo">
                            <label>Correo</label>
                            <input class="input-text" type="email" name="correo_usuarionuevo" id="correo_usuarionuevo" aria-describedby="helpId" autocomplete="off" placeholder="Tu Correo" >
                            <div id="errorCorreo"></div>
                        </div>
                      <div>
                        <div class="campo">
                          <label>Contraseña</label>
                          <input class="input-text" type="password" placeholder="Escribe la contraseña" name="pass_usuarionuevo" id="pass_usuarionuevo" aria-describedby="helpId" minlength="6"   >
                        </div>
                      </div>
                        <div class="campo">
                            <label>Repetir Contraseña</label>
                            <input class="input-text" type="password" placeholder="Repite la contraseña" name="pass2_usuarionuevo" id="pass2_usuarionuevo" aria-describedby="helpId" >
                        </div>
                      <div>
                      <div class="campo">
                            <input class="input-text" type="hidden" name="perfil_usuarionuevo" id="perfil_usuarionuevo" value="false"  >
                        </div>
                        <div class="campo">
                            <input class="input-text" type="hidden" id="estadousuario" name="estadousuario" value="false" >
                        </div>
                      </div>                 
                    </div> <!-- .contenedor-campos -->
                    <div class="alinear-derecha flex">
                        <input class="boton w-sm-100" type="submit" value="Registrar" onclick='validarFormUserNew()'>
                    </div>
                    <div id="error">

                    </div>
                    
                </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>

  <script type="text/javascript">
    $(document).ready(function() {

    });

    function validar_form_login() {
      var email_input = $("#email_input").val();
      var pass_input = $("#pass_input").val();

      if (email_input == "" || pass_input == "") {

        toastr.error(
          'Los datos son obligatorios.', 'Error !', {
            showDuration: 400,
            "progressBar": true,
            "closeButton": true,
            "iconClass": 'toast-error'
          })

      } else {

        if (email_input.indexOf('@', 0) == -1 || email_input.indexOf('.', 0) == -1) {
          toastr.error(
            'El correo electrónico <br> debe contener la estructura: <b>usuario@dominio.com</b>', 'Error !', {
              showDuration: 400,
              "progressBar": true,
              "closeButton": true,
              "iconClass": 'toast-error'
            })
        } else {

          $("#login_form").submit();

        }

      }
    }

    function registro_usuario(){

      nombre=$("#nombre_registro_usuario").val();
      nombre_corto=$("#nombrecorto_registro_usuario").val();
      email=$("#email_registro_usuario").val();
      clave=$("#clave_registro_usuario").val();
      

      if(nombre=="" || nombre_corto=="" || email=="" || clave==""){
          
          toastr.warning(
            'Los campos son obligatorios ,<br>por favor complete.',	'Atencion !',
            {
              showDuration: 400,
              "progressBar": true,
              "closeButton": true,
              "iconClass": 'toast-warning'
            }
          )

      }else{
        
        if(clave.length < 8){
          toastr.warning(
            'La clave debe ser mayor de 8 caracteres ,<br>por favor valide.',	'Atencion !',
            {
              showDuration: 400,
              "progressBar": true,
              "closeButton": true,
              "iconClass": 'toast-warning'
            }
          )
        }else{
          var from="registro_usuario"
          var data={from,nombre,nombre_corto,email,clave};
          $.ajax({
              type: "POST",
              url: "http://proyectopoli.generandocodigo.com/ajaxcontroller/usuarios.php",
              data: data,
              // dataType: "JSON",
              success: function (response) {
                
                if(response==1){
                
                  toastr.success(
                    mensaje,	'Hecho !',
                    {showDuration: 300,
                    "progressBar": true,
                    "closeButton": true,
                    "iconClass": 'toast-success'})
                    
                }else{
                    toastr.warning(
                    'Ese correo ya se encuentra registrado. <br> Por favor intente con otro.',	'Atencion !',
                    {showDuration: 400,
                    "progressBar": true,
                    "closeButton": true,
                    "iconClass": 'toast-warning'})
                }
              }
              
          });
        
        }

      }
        

      // toastr.error(
      //       'Ocurrio un error.<br>Por favor contactar a soporte',	'Error !',
      //       {showDuration: 400,
      //       "progressBar": true,
      //       "closeButton": true,
      //       "iconClass": 'toast-error'})
          
      
    }
  </script>

  <script>
    /* var nombre = document.getElementById('nombre_usuarionuevo');
    var nombreCorto = document.getElementById('nombre_corto');
    var correo_usuarionuevo=$("#correo_usuarionuevo").val();
    var pass_usuarionuevo=$("#pass_usuarionuevo").val();
    var pass2_usuarionuevo=$("#pass2_usuarionuevo").val(); */
    


    function validarFormUserNew() {
      
      var envio_form=false;
      var ideditarusuario=$("#id_editarusuario").val();
      var correo_encontrado=false;

    /* ideditarusuario determina si es la modal para crear un usuario nuevo
      o si es para editar un usuario exiistente */

      if(ideditarusuario == 0){

          /* Se valida si el input de las claves esta vacio y luego si las dos claves son iguales */

          var pass_usuarionuevo=$("#pass_usuarionuevo").val();
          var pass2_usuarionuevo=$("#pass2_usuarionuevo").val();

          if(pass_usuarionuevo=="" || pass2_usuarionuevo == ""){
            toastr.warning(
                'Los datos son obligatorios, intentalo nuevamente.',	'Atención!',
                {showDuration: 400,
                "progressBar": true,
                "closeButton": true,
                "iconClass": 'toast-warning'})
                envio_form = false;
          }else{

            if(pass_usuarionuevo == pass2_usuarionuevo){
              if(pass_usuarionuevo.length < 6){
                toastr.warning(
                  'La clave debe tener entre 6 - 8 digitos, intentalo nuevamente.',	'Atención!',
                  {showDuration: 400,
                  "progressBar": true,
                  "closeButton": true,
                  "iconClass": 'toast-warning'})
              }
            }else{
              toastr.warning(
                  'Las claves digitadas no coinciden, intentalo nuevamente.',	'Atención!',
                  {showDuration: 400,
                  "progressBar": true,
                  "closeButton": true,
                  "iconClass": 'toast-warning'})
            }

          }
          

          /* Valida que el campo de correo no este vacio o si hay cambios en el correo electronico, si los hay valida que el nuevo
          no existe en la lista mostrada de usuarios */

          var correo_usuarionuevo=$("#correo_usuarionuevo").val();
          if(correo_usuarionuevo == ""){
            toastr.warning(
                'Los datos son obligatorios, intentalo nuevamente.',	'Atención!',
                {showDuration: 400,
                "progressBar": true,
                "closeButton": true,
                "iconClass": 'toast-warning'})
                envio_form = false;
          }else{
              $("#tabla_usuarios tr").find('td:eq(1)').each(function () {
                correo = $(this).html();
                if(correo==correo_usuarionuevo){
                      correo_encontrado=true;
                }
            })
          }
          $("#tabla_usuarios tr").find('td:eq(1)').each(function () {
              correo = $(this).html();
              if(correo==correo_usuarionuevo){
                    correo_encontrado=true;
              }
          })

          if(correo_encontrado){
              toastr.warning(
                'Ese correo ya se encuentra registrado, intente nuevamente.',	'Atención!',
                {showDuration: 400,
                "progressBar": true,
                "closeButton": true,
                "iconClass": 'toast-warning'})
          }

          if(!correo_encontrado && (pass_usuarionuevo === pass2_usuarionuevo) && pass_usuarionuevo.length > 6){
            var nombre_usuarionuevo=$("#nombre_usuarionuevo").val();
            var nombre_corto=$("#nombre_corto").val();
            var perfil_usuarionuevo=$("#perfil_usuarionuevo").val();
            var estadousuario=($("#estadousuario").is(":checked"))?1:0;
            var usuariocreador=$("#idusuarioactivo").val();
            var desde="insertarusuarionuevo";
            if(nombre_usuarionuevo ==""){
              toastr.warning(
                'Los datos son obligatorios, intentalo nuevamente.',	'Atención!',
                {showDuration: 400,
                "progressBar": true,
                "closeButton": true,
                "iconClass": 'toast-warning'})
                envio_form = false;
            }else{
              datae={nombre_usuarionuevo,nombre_corto,correo_usuarionuevo,perfil_usuarionuevo,estadousuario,pass_usuarionuevo,usuariocreador,desde};
              envio_form = true;
            }

          }else{
            envio_form = false;
          }
      
      }else{

        var cambiocorreo=false;
        var correo_usuarionuevo=$("#correo_usuarionuevo").val();
        var comparacorreo=$("#comparacorreo").val();
        if(correo_usuarionuevo == ""){
            toastr.warning(
                'Los datos son obligatorios, intentalo nuevamente.',	'Atención!',
                {showDuration: 400,
                "progressBar": true,
                "closeButton": true,
                "iconClass": 'toast-warning'})
                envio_form = false;
        }else{

          if(correo_usuarionuevo == comparacorreo){
          cambiocorreo=false;
          }else{
            cambiocorreo=true;
          }

          if(cambiocorreo){
              var correo_encontrado=false;
              $("#tabla_usuarios tr").find('td:eq(1)').each(function () {
                  correo = $(this).html();
                  if(correo==correo_usuarionuevo){
                        correo_encontrado=true;
                  }
            })

            if(correo_encontrado){
                toastr.warning(
                  'Ese correo ya se encuentra registrado, intente nuevamente.',	'Atención!',
                  {showDuration: 400,
                  "progressBar": true,
                  "closeButton": true,
                  "iconClass": 'toast-warning'})
            }else{
              envio_form=true;
            }

          }else{
            envio_form=true;
          }
        }


        if(envio_form == true){
          var nombre_usuarionuevo=$("#nombre_usuarionuevo").val();
          var nombre_corto=$("#nombre_corto").val();
          var perfil_usuarionuevo=$("#perfil_usuarionuevo").val();
          var estadousuario=($("#estadousuario").is(":checked"))?1:0;
          var desde="editarusuario";
          datae={ideditarusuario,nombre_usuarionuevo,nombre_corto,correo_usuarionuevo,perfil_usuarionuevo,estadousuario,desde};
        }

      }

        if(envio_form == true){
            var data=datae;
            var url_basic=$("#url_basic").val();
            var url_ajax=url_basic+"ajaxcontroller/usuarios.php";

            $.ajax({
                type: "POST",
                url: url_ajax,
                data: data,
                // dataType: "JSON",
                success: function (response) {
                  
                  var mensaje="";
                  if(ideditarusuario == 0){
                      mensaje="Usuario creado correctamente";
                  }else{
                    mensaje="Datos modificados correctamente";
                  }
                  if(response==1){
                  
                    toastr.success(
                      mensaje,	'Hecho !',
                      {showDuration: 300,
                      "progressBar": true,
                      "closeButton": true,
                      "iconClass": 'toast-success'})

                      lista_usuarios();
                      formusuarionuevo();
                      $('#nuevousuario').modal('toggle');
                      
                  }else{
                      toastr.warning(
                      'Ocurrrio un error. <br> Por favor comuniquese con soporte.',	'Error !',
                      {showDuration: 400,
                      "progressBar": true,
                      "closeButton": true,
                      "iconClass": 'toast-error'})
                  }
                }
            });

        }else{
            // toastr.error(
            //   'Ocurrio un error.<br>Por favor contactar a soporte',	'Error !',
            //   {showDuration: 400,
            //   "progressBar": true,
            //   "closeButton": true,
            //   "iconClass": 'toast-error'})
        }
    }

      
  </script>
</body>

</html>