<?php

require_once ("model/usuariomodel.php");

class UsuarioController
{
    public $instmodel;

    function __construct(){
       
        $this->instmodel=new UsuarioModel(); //Crea la Instancia del modelo de usuarios.

    }

    function index(){
        if(!isset($_SESSION['session_id'])){
            require_once(RUTA_VISTAS.'login/login.php');
          }else{
            $titlepage="Maestro Usuarios";
            $listaTiposUsuario= $this->instmodel->consultarPerfilesUsuarios();
            require_once(RUTA_VISTAS.'basic/header.php');
            require_once(RUTA_VISTAS.'basic/navbar.php');
            require_once(RUTA_VISTAS.'usuarios/usuarios.php'); // Carga la vista de la lista de usuarios.
            require_once(RUTA_VISTAS.'basic/footer.php');
          }

    }

}


?>