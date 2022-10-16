  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  </head>

  <body>
    <div class="container" style="margin-top:25px;padding:0;">
      <div class="row">
        <div class="col-3">
        </div>
        <div class="col-6" style="border: solid 1px black;height:600px;padding: 0px;">

          <div class="col-12" style="background-color:gray;padding: 20px;text-align: center;color: white;font-size: 1.6em;">
            <b>Proyecto POLI</b>
          </div>
          <div style="padding: 25px">
            Hola, <?php echo $nombre; ?>,
          </div>
          <div style="padding: 30px">
            <p>Recientemente se envió una solicitud para restablecer una contraseña para su cuenta. Si esto fue un error, simplemente ignore este correo electrónico y no pasará nada.</p>
            <br>
            <p>Para restablecer su contraseña, visite el siguiente enlace:</p>
            <div style="text-align: center;margin-top:45px">
              <a name="" id="" class="btn btn-primary" href="<?php echo $resetPassLink; ?>" role="button"> Restablecer su clave -> </a>
            </div>
            <br /><br />Equipo de soporte
          </div>
          <hr>
          <div style="text-align: center;">
            <b>&reg; Proyecto - POLI - 2022</b>
          </div>
        </div>
        <div class="col-3"></div>
      </div>
    </div>
    
      <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

   
  </body>

  </html>