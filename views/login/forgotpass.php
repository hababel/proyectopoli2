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
  } else {
  }


  ?>

  <div class="login-box">
    <div class="login-logo">
      <a href=""><b>Proyecto</b>-POLI</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Recordar Clave</p>

        <form action="recoverypass" id="forgotpass_form" name="forgotpass_form" method="post">
          <div class="input-group mb-3">
            <input type="email" name="email_input_forgotpass" id="email_input_forgotpass" class="form-control" placeholder="a@b.com" autocomplete="off" value="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block" name="forgotpass_button">Recordar clave</button>
              <!-- <button type="submit" class="btn btn-primary btn-block" name="forgotpass_button" onclick="validar_form();">Recordar clave</button> -->
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script type="text/javascript">
    $(document).ready(function() {

    });

    function validar_form() {
      var email_input_forgotpass = $("#email_input_forgotpass").val();

      if (email_input_forgotpass == "") {

        toastr.error(
          'Los datos son obligatorios.', 'Error !', {
            showDuration: 400,
            "progressBar": true,
            "closeButton": true,
            "iconClass": 'toast-error'
          })

      } else {

        if (email_input_forgotpass.indexOf('@', 0) == -1 || email_input_forgotpass.indexOf('.', 0) == -1) {
          toastr.error(
            'El correo electrónico <br> debe contener la estructura: <b>usuario@dominio.com</b>', 'Error !', {
              showDuration: 400,
              "progressBar": true,
              "closeButton": true,
              "iconClass": 'toast-error'
            })
        } else {

          $("#forgotpass_form").submit();


        }

      }
    }
  </script>
</body>

</html>