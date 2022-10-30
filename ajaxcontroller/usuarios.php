<?php


ini_set('display_errors', 2);
ini_set('display_startup_errors', 2);
error_reporting(E_ALL);

$ajaxresponse=true;

require_once("../config/config.php");
require_once("../config/conn.php");
require_once("../model/usuariomodel.php");

if($_POST){
  $desde=$_POST["desde"];
  $instajax = new UsuarioModel();

  switch ($desde) {
    case 'listarusuarios':
      $lista_usuarios= $instajax->list_usuarios();
      
      $todos_usuario_ajax=array();

      foreach ($lista_usuarios as $key => $value) {

        switch ($value->estado) {
          case 1:
            $estado_usuario="<span class='badge badge-success'>Activo</span>";
            break;
          case 0:
            $estado_usuario = "<span class='badge badge-danger'>Deshabilitado</span>";
            break;
          
          default:
            # code...
            break;
        }

        $editar_usuario = array(
          "id"=>$value->id,
          "nombre" => $value->nombre,
          "Nombre_Corto" => $value->Nombre_Corto,
          "Email" => $value->Email,
          "desc_tipo" => $value->desc_tipo,
          "tipo_usuario" => $value->tipo_usuario,
          "estado" => $value->estado
        );

        $botones_config= "

        <div class='btn-group'>
          <button type='button' id='editaruser' name='editaruser' class='btn btn-outline-info' data-toggle='modal' data-target='#nuevousuario' onclick='editar_usuario(".json_encode($editar_usuario). ")'>
            <i class='fa fa-user-edit' aria-hidden='true'></i>
          </button>
          <button type='button' id='cambioclave' name='cambioclave' class='btn btn-outline-info' data-toggle='modal' data-target='#modalcambioclave' onclick='cambioclave(" . json_encode($editar_usuario) . ")'>
            <i class='fa fa-key' aria-hidden='true'></i>
          </button>
        </div>";
        
        $lista_usuario_ajax=array(
          "id" => $value->id,
          "nombre" => $value->nombre,
          "Nombre_Corto" => $value->Nombre_Corto,
          "Email" => $value->Email,
          "tipo_usuario" => $value->tipo_usuario,
          "desc_tipo" => $value->desc_tipo,
          "estado"=>$estado_usuario,
          "config"=>$botones_config
        );

        array_push($todos_usuario_ajax,$lista_usuario_ajax);
      }

      echo json_encode($todos_usuario_ajax);
      break;

    case 'insertarusuarionuevo':
      $nombre_usuarionuevo=$_POST['nombre_usuarionuevo'];
      $correo_usuarionuevo=$_POST['correo_usuarionuevo'];
      $nombre_corto=$_POST['nombre_corto'];
      $idPerfil_usuarionuevo=$_POST['perfil_usuarionuevo'];
      $estadousuario=$_POST['estadousuario'];
      $clave_usuarionuevo=$_POST['pass_usuarionuevo'];
      // $usuariocreador_usuarionuevo=$_POST['usuariocreador'];

      $clave_usuarionuevo_encrypt=password_hash($clave_usuarionuevo,PASSWORD_DEFAULT);

      $inserta_usuarios = $instajax->crear_usuario(
        $nombre_usuarionuevo,
        $nombre_corto,
        $correo_usuarionuevo,
        $clave_usuarionuevo_encrypt,
        $idPerfil_usuarionuevo,
        $estadousuario
      );

      echo ($inserta_usuarios)?1:0;

      break;
    
    case 'editarusuario':
      $idUser=$_POST['ideditarusuario'];
      $nombre_usuarionuevo = $_POST['nombre_usuarionuevo'];
      $nombre_corto = $_POST['nombre_corto'];
      $correo_usuarionuevo = $_POST['correo_usuarionuevo'];
      $idPerfil_usuarionuevo = $_POST['perfil_usuarionuevo'];
      $estadousuario = $_POST['estadousuario'];
      $editar_usuario = $instajax->editar_usuario($idUser, $nombre_usuarionuevo, $nombre_corto,$correo_usuarionuevo, $estadousuario, $idPerfil_usuarionuevo);
      echo ($editar_usuario==1) ?1:0;
      
      break; 
      
    case 'cambioclaveusuario':
      $idusuariocambioclave=$_POST['idusuariocambioclave'];
      $nuevaclaveusuario=$_POST['nuevaclaveusuario'];
      $clave=password_hash($nuevaclaveusuario,PASSWORD_DEFAULT);
      $cambioclave= $instajax->cambiar_clave($idusuariocambioclave, $clave);
      echo ($cambioclave)?1:0;
      break;
    
      default:
      # code...
      break;
    case 'registro_usuario':
      $nombre=$_POST['nombre'];
      $nombre_corto=$_POST['nombre_corto'];
      $email=$_POST['email'];
      $clave=$_POST['clave'];
      $tipo_usuario=2;
      $estado=0;
      $clave_usuarionuevo_encrypt=password_hash($clave,PASSWORD_DEFAULT);
      $buscar_usuario=$instajax->buscar_usuario($email);
      if($buscar_usuario){
        echo 0;
      }else{
        $insertar_usuario=$instajax->crear_usuario($nombre,$nombre_corto,$email,$clave_usuarionuevo_encrypt,$tipo_usuario,$estado);
        echo ($insertar_usuario)?1:0;
      }

      break;
    }
}else{
  header("Location:" . URL_PATH);
}


?>