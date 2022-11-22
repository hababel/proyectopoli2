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
    




</head>


<body class="hold-transition login-page">

    <!-- jQuery -->
    <script src="<?php echo URL_PATH; ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo URL_PATH; ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Toastr -->
    <script src="<?php echo URL_PATH; ?>assets/plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo URL_PATH; ?>assets/dist/js/adminlte.min.js"></script>

    <input type="hidden" name="" id="url_basic" value="<?php echo URL_PATH; ?>">

    <form class="formulario" method="POST">
        <legend class="titulo-formulario">Registro de Usuarios</legend>

        <fieldset>
            <div class="contenedor-campos">

                <div class="campo">
                    <label>Nombre Completo</label>
                    <input class="input-text" type="text" placeholder="Tu Nombre completo" name="nombre_registro_usuario" id="nombre_registro_usuario" aria-describedby="helpId" autocomplete="off">
                    <div id="errorNombre"></div>
                </div>

                <div class="campo">
                    <label>Nombre Corto</label>
                    <input class="input-text" type="text" name="nombrecorto_registro_usuario" id="nombrecorto_registro_usuario" placeholder="Tu Nombre corto">
                    <div id="errorNombreCorto"></div>
                </div>

                <div class="campo">
                    <label>Correo</label>
                    <input class="input-text" type="email" name="email_registro_usuario" id="email_registro_usuario" aria-describedby="helpId" autocomplete="off" placeholder="Tu Correo">
                    <div id="errorCorreo"></div>
                </div>
                <div>
                    <div class="campo">
                        <label>Contraseña</label>
                        <input class="input-text" type="password" placeholder="Escribe la contraseña" name="clave_registro_usuario" id="clave_registro_usuario" aria-describedby="helpId" minlength="8">
                    </div>
                </div>
                <div class="campo">
                    <label>Repetir Contraseña</label>
                    <input class="input-text" type="password" placeholder="Repite la contraseña" name="pass2_usuarionuevo" id="pass2_usuarionuevo" aria-describedby="helpId">
                </div>
                <div>
                    <div class="campo">
                        <input class="input-text" type="hidden" name="perfil_usuarionuevo" id="perfil_usuarionuevo" value="false">
                    </div>
                    <div class="campo">
                        <input class="input-text" type="hidden" id="estadousuario" name="estadousuario" value="false">
                    </div>
                </div>
            </div> <!-- .contenedor-campos -->
            <div class="alinear-derecha flex">
                <input class="boton w-sm-100" type="button" value="Registrar" onclick='registro_usuario()'>
            </div>
            <div id="error">

            </div>

        </fieldset>
    </form>



    <script>

      /*   $(document).ready(function () {
            var objFoto = new Image();
            objFoto.src = '../img/fondoInicioSesion.png'
            $("#body").attr("background", value);
        }); */

        function registro_usuario() {

            nombre = $("#nombre_registro_usuario").val();
            nombre_corto = $("#nombrecorto_registro_usuario").val();
            email = $("#email_registro_usuario").val();
            clave = $("#clave_registro_usuario").val();
            clave2 = $("#pass2_usuarionuevo").val();


            if (nombre == "" || nombre_corto == "" || email == "" || clave == "") {

                toastr.warning(
                    'Los campos son obligatorios ,<br>por favor complete.', 'Atencion !', {
                        "timeOut": "3000",
                        "progressBar": true,
                        "closeButton": true,
                        "iconClass": 'toast-warning'
                    }
                )

            } else {

                if (clave.length < 8) {
                    toastr.warning(
                        'La clave debe ser mayor de 8 caracteres ,<br>por favor valide.', 'Atencion !', {
                            "timeOut": "3000",
                            "progressBar": true,
                            "closeButton": true,
                            "iconClass": 'toast-warning'
                        }
                    )
                } else {
                    if(comparar_pass(clave,clave2)){

                    
                        var url_basic=$("#url_basic").val();
                        var url_ajax=url_basic+"ajaxcontroller/usuarios.php";
                        var desde = "registro_usuario"
                        var data = {
                            desde,
                            nombre,
                            nombre_corto,
                            email,
                            clave
                        };
                        $.ajax({
                            type: "POST",
                            url: url_ajax,
                            data: data,
                            // dataType: "JSON",
                            success: function(response) {

                                if (response == 1) {

                                    toastr.success(
                                        'El usuario fue registrado con éxito', 'Hecho !', {
                                            "timeOut": "3000",
                                            "progressBar": true,
                                            "closeButton": true,
                                            "iconClass": 'toast-success'
                                        })
                                            $("#nombre_registro_usuario").val("");
                                            $("#nombrecorto_registro_usuario").val("");
                                            $("#email_registro_usuario").val("");
                                            $("#clave_registro_usuario").val("");
                                            $("#pass2_usuarionuevo").val("");
                                            
                                            $(location).attr('href',url_basic);

                                } else {
                                    toastr.warning(
                                        'Ese correo ya se encuentra registrado. <br> Por favor intente con otro.', 'Atencion !', {
                                            "timeOut": "3000",
                                            "progressBar": true,
                                            "closeButton": true,
                                            "iconClass": 'toast-warning'
                                        })
                                }
                            }

                        });


                    }else{
                        toastr.warning(
                            'Las contraseñas ingresadas no coinciden. <br> Por favor intente nuevamente', 'Atencion !', {
                                "timeOut": "3000",
                                "progressBar": true,
                                "closeButton": true,
                                "iconClass": 'toast-warning'
                            })
                    }

                }

            }


            // toastr.error(
            //       'Ocurrio un error.<br>Por favor contactar a soporte',	'Error !',
            //       {showDuration: 400,
            //       "progressBar": true,
            //       "closeButton": true,
            //       "iconClass": 'toast-error'})


        }

        function comparar_pass(pass1,pass2){
            return (pass1 === pass2)?true:false;
        }
    </script>

</body>

</html>