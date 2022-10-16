 <div class="content-wrapper">

   <div class="content-header">
     <div class="container-fluid">

     </div>
   </div>


   <!-- Main content -->
   <section class="content">
     <div class="container">

       <div class="row">
         <div class="col">

           <div class="card bg-light">
             <div class="card-header" style="background-color:grey;color:white">
               <a data-toggle="collapse" href="#collapse-example" aria-expanded="true" aria-controls="collapse-example" id="d-block" class="d-block" style="text-decoration: none;">
                 <h5>Maestro de usuarios <i class="fa fa-chevron-down float-right" style="margin-left: 25px;"></i> </h5>
               </a>
             </div>
             <div id="collapse-example" class="collapse" aria-labelledby="heading-example">
               <div class="card-body">
                 <p class="card-text"> En este modulo se administran los usuarios que tendran acceso a la aplicacion. Alli se encuentra la lista, creacion, edicion e inhabilitacion de los usuarios. (CRUD).</p>
                 <hr>
                 <h3 class="card-title"> <b>Crear un usuario nuevo</b> </h3>
                 <p class="card-text">Para crear un usuario nuevo se de dar click en el boton "Nuevo Usuario". <button type="button" class="btn btn" style="background-color: #196945; color:white;margin-left: 15px;">
                     <i class="fas fa-user-plus" style="color: #29AB70"></i> Nuevo usuario
                   </button>
                 </p>
                 <p class="card-text">
                   Se abre la modal con el fomulario con los datos necesarios para la creación del usuario nuevo.
                 </p>

                 <p class="card-text text-center">
                   <img src="<?php echo URL_PATH . RUTA_VISTAS; ?>img/formulario usuario nuevo.jpg" width="60%" class="img-fluid" alt="">
                 </p>
                 <div class="table-responsive-md" style="margin-left:30px;margin-right:30px;">
                   <table class="table table-hover table-bordered">
                     <thead class="thead-dark">
                       <tr>
                         <th scope="col">Campo</th>
                         <th scope="col">Descripción</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>
                         <td width="20%">Nombre</td>
                         <td width="80%">Nombre completo del usuario (Nombre y Apellido)</td>
                       </tr>
                       <tr>
                         <td>Correo</td>
                         <td>Correo electrónico del usuario (usuario@dominio.com). Se utilizará como factor de autenticación, junto con la contraseña, y por ello este campo debe ser único.</td>
                       </tr>
                       <tr>
                         <td>Nombre Corto</td>
                         <td>Nombre corto del usuario , pseudonimo u iniciales</td>
                       </tr>
                       <tr>
                         <td>Perfil</td>
                         <td>El perfil determina los permisos que tendra el usuario al ingresar a la aplicacion. <b>Usuario Administrador</b>: Tendra acceso completo al aplicativo.<br> <b>Usuario visitante</b>: No tendra acceso a ver el Codigo QR para realizar la descarga del informe completo, ni podra administrar este modulo de usuarios.</td>
                       </tr>
                       <tr>
                         <td>Clave</td>
                         <td>Contraseña o clave asignada por el usuario para autenticación en la aplicación. Esta clave debe ser mayor de 5 caracteres.</td>
                       </tr>
                       <tr>
                         <td>Estado</td>
                         <td><b>Activo</b>: <img src="<?php echo URL_PATH . RUTA_VISTAS; ?>img/usuarioactivo.jpg" alt=""> Usuario con posibilidad de ingresar al sitio web.<br /><b>Deshabilitado</b>:<img src="<?php echo URL_PATH . RUTA_VISTAS; ?>img/deshabilitado.jpg" alt=""> Usuario que no podra tener acceso al sitio web</td>
                       </tr>
                     </tbody>
                   </table>
                 </div>
                 <p class="card-text">
                   Se abre la modal con el fomulario con los datos necesarios para la creacion del usuario nuevo.
                 </p>
               </div>

               <div class="card-body">

                 <hr>
                 <h3 class="card-title"> <b>Editar usuario</b> </h3>
                 <p class="card-text">
                   Para editar un usuario existente debe dar click en el boton <button type='button' id='editaruser' name='editaruser' class='btn btn-outline-info' data-toggle='modal' data-target='#nuevousuario' onclick='editar_usuario(".json_encode($editar_usuario). ")'>
                     <i class='fa fa-user-edit' aria-hidden='true'></i>
                   </button>. Este muestra la modal con los datos del usuario y alli se cambia el campo que requiera.
                 </p>

                 <p class="card-text text-center">
                   <img src="<?php echo URL_PATH . RUTA_VISTAS; ?>img/formulario editar usuario deshabilitar.jpg" width="60%" class="img-fluid" alt="">
                 </p>
               </div>

               <div class="card-body">
                 <hr>
                 <h3 class="card-title"> <b>Cambiar contraseña</b> </h3>
                 <p class="card-text">
                   Para cambiar la contraseña de cualquier usuario debe dar click en el boton <button type='button' id='cambioclave' name='cambioclave' class='btn btn-outline-info' data-toggle='modal' data-target='#modalcambioclave' onclick='cambioclave(" . json_encode($editar_usuario) . ")'>
                     <i class='fa fa-key' aria-hidden='true'></i>
                   </button> . Este muestra la modal donde se escribe la contraseña nueva. esta contraseña debe superar los 5 caracteres.
                 </p>
                 <p class="card-text text-center">
                   <img src="<?php echo URL_PATH . RUTA_VISTAS; ?>img/cambioclave.jpg" width="30%" class="img-fluid" alt="">
                 </p>
               </div>

             </div>
           </div>

           <div class="card bg-light">
             <div class="card-header" style="background-color:grey;color:white">
               <a data-toggle="collapse" href="#manual-usuario" aria-expanded="true" aria-controls="manual-usuario" id="d-block" class="d-block" style="text-decoration: none;">
                 <h5>Manual de Usuario <i class="fa fa-chevron-down float-right" style="margin-left: 25px;"></i></h5>
               </a>
             </div>
             <div id="manual-usuario" class="collapse" aria-labelledby="manual-usuario">
               <div class="card-body" style="height:1100px;">
                 <object data="views/pdfs/manual_usuario.pdf" height="80%" width="80%"></object>
               </div>
             </div>
           </div>

           <div class="card bg-light">
             <div class="card-header" style="background-color:grey;color:white">
               <a data-toggle="collapse" href="#manual-tecnico" aria-expanded="true" aria-controls="manual-tecnico" id="d-block" class="d-block" style="text-decoration: none;">
                 <h5>Manual Técnico <i class="fa fa-chevron-down float-right" style="margin-left: 25px;"></i></h5>
               </a>
             </div>
             <div id="manual-tecnico" class="collapse" aria-labelledby="manual-usuario-tecnico">
               <div class="card-body" style="height:1100px;">
                 <object data="views/pdfs/manual_tecnico.pdf" height="80%" width="80%"></object>
               </div>
             </div>
           </div>

         </div> <!-- fin col -->
       </div> <!-- fin row -->

   </section>
   <!-- /.content -->
 </div>

 <style>
   .fa {
     transition: .3s transform ease-in-out;
   }

   a.collapse.fa {
     transform: rotate(90 deg);
   }

   #d-block {
     text-decoration: none;
     color: white;
   }
 </style>