
function lista_usuarios(){
  var desde="listarusuarios";
  var url_basic=$("#url_basic").val();
  var url_ajax=url_basic+"ajaxcontroller/usuarios.php";

  var data={desde};
  $.ajax({
    type: "POST",
    url: url_ajax,
    /* url: "http://proyectopoli.generandocodigo.com/ajaxcontroller/usuarios.php", */
    data: data,
    dataType: "JSON",
    success: function (response) {
      
      if ( ! $.fn.DataTable.isDataTable( '#tabla_usuarios' ) ) {
					$("#tabla_usuarios").DataTable({
						data: response,
						searching: true,
            "responsive": true,
           
						"processing": true,
						"columns": [
							{"data": "nombre","width": "20%"},
							{"data": "Nombre_Corto","width": "20%"},
							{"data": "Email","width": "20%"},
							{"data": "desc_tipo","width": "20%"},
							{"data": "estado","width": "10%"},
							{"data": "config","width": "10%" }
						]
					});
					
				}else{
					$("#tabla_usuarios").DataTable().clear().rows.add(response).draw();
				}
      
    }
  });
}

function mostrarestadousuario(){
  
  if($('#estadousuario').is(':checked')){
    $("#mostrarestadousuario").html("<span style='padding: 10px 20px 10px 20px; background-color: green;color:white'><b>Activo</b></span>");
    
  }else{
    $("#mostrarestadousuario").html("<span style='padding: 10px 20px 10px 20px; background-color: red;color:white'><b>Deshabilitado</b></span>");
   
  }
}

function verificarForm(){
 
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

function editar_usuario(editar_usuario){

  $("#titulo_moda_nuevousuario").html("");
  $("#titulo_moda_nuevousuario").html("Editar Usuario - <b>"+editar_usuario['nombre']+"</b>");
  $("#nombre_usuarionuevo").val(editar_usuario['nombre']);
  $("#correo_usuarionuevo").val(editar_usuario['Email']);
  $("#comparacorreo").val(editar_usuario['Email']);
  $("#nombre_corto").val(editar_usuario['Nombre_Corto']);
  $("#perfil_usuarionuevo").val(editar_usuario['tipo_usuario']);
  $("#id_editarusuario").val(editar_usuario['id']);
  
  (editar_usuario['estado']==1)?$("#estadousuario").prop("checked", true):$("#estadousuario").prop("checked", false);
  mostrarestadousuario();
  if ($("#nombre_usuarionuevo").val() != "") {
        $("#clavesusuarionuevo").css("display", "none");
  } 

}

function formusuarionuevo(){

      $modal = $('#nuevousuario');
      $modal.find('form')[0].reset();
      $("#estadousuario").prop("checked", true);
      $("#titulo_moda_nuevousuario").html("");
      $("#titulo_moda_nuevousuario").html("Nuevo Usuario");
      $("#clavesusuarionuevo").css("display", "flex");
      $("#id_editarusuario").val(0)
      

}

function cambioclave(datousuario){
  $("#usercambioclave").html(datousuario['nombreusuario']);
  $("#idusuariocambioclave").val(datousuario['id']);
}

function mostrarPassword(){
    
    var texpass=$("#nuevaclaveusuario");
		if(texpass.attr('type') == "password"){
      texpass.attr('type', 'text');
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			texpass.attr('type', 'password');
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
}

function cambioclaveusuario(){
  var idusuariocambioclave=$("#idusuariocambioclave").val();
  var nuevaclaveusuario=$("#nuevaclaveusuario").val();
  var desde="cambioclaveusuario";

  if(nuevaclaveusuario == ""  ){
      toastr.warning(
        'Los datos son obligatorios, intentalo nuevamente.',	'Atención!',
        {showDuration: 400,
        "progressBar": true,
        "closeButton": true,
        "iconClass": 'toast-warning'})
  }else{
    if(nuevaclaveusuario.length < 6){
        toastr.warning(
                'La clave debe ser mayor de 5 digitos, intentalo nuevamente.',	'Atención!',
                {showDuration: 400,
                "progressBar": true,
                "closeButton": true,
                "iconClass": 'toast-warning'})
    }else{
      data={desde,idusuariocambioclave,nuevaclaveusuario};
      var url_basic=$("#url_basic").val();
      var url_ajax=url_basic+"ajaxcontroller/usuarios.php";

      $.ajax({
        type: "POST",
        url: url_ajax,
        data: data,
        success: function (response) {
          if(response == 1){

            toastr.success(
                  'Se cambio la clave correctamente',	'Hecho !',
                  {showDuration: 300,
                  "progressBar": true,
                  "closeButton": true,
                  "iconClass": 'toast-success'})

                  $("#usercambioclave").html('');
                  $("#nuevaclaveusuario").val('');
                  $("#nuevaclaveusuario").attr('type', 'password');
                  $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                  $('#modalcambioclave').modal('toggle');

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
    }

  }
}
