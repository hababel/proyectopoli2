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


  <!-- jQuery -->
  <script src="<?php echo URL_PATH; ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo URL_PATH; ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Toastr -->
  <script src="<?php echo URL_PATH; ?>assets/plugins/toastr/toastr.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo URL_PATH; ?>assets/dist/js/adminlte.min.js"></script>

</head>

<body class="hold-transition login-page bg">

  <div class="login-box">
    <div class="login-logo"> <b>Asignar nueva clave </b></div>
    <div class="card">
      <div class="card-body login-card-body">
        <form action="recoverypass" id="resetpassword_form" method="post">
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="resetpassword" id="resetpassword" required placeholder="Nueva clave">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" name="resetconfirmpassword" id="resetconfirmpassword" required placeholder="Confirmar clave" onkeyup="validar_pass_iguales();">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="send-button">
                <input type="hidden" name="fp_code" value="<?php echo $token_code; ?>" />
                <input type="button" class="btn btn-block" style="background-color: #196945; color:white" name="resetSubmit" onclick="valide_form();" value="Grabar">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

<script>
  function valide_form() {

    var pass1 = $("#resetpassword").val();
    var pass2 = $("#resetconfirmpassword").val();

    if (pass1 == "" || pass2 == "") {
      toastr.error(
        'Los datos son obligatorios.', 'Error !', {
          showDuration: 400,
          "progressBar": true,
          "closeButton": true,
          "iconClass": 'toast-error'
        })
    } else {
      if (pass1 === pass2) {
        $("#resetpassword_form").submit();
      } else {
        toastr.error(
          'Las dos claves deben ser iguales.  Por favor validar.', 'Error !', {
            showDuration: 400,
            "progressBar": true,
            "closeButton": true,
            "iconClass": 'toast-error'
          })
      }

    }

  }
</script>