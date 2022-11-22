<?php

class sabertController
{

  public function index()
  {
    if (isset($_SESSION['session_id'])) {
      $titlepage = "Informe Saber Pro y TYT";
      require_once(RUTA_VISTAS . "basic/header.php");
      require_once(RUTA_VISTAS . "basic/navbar.php");
      require_once(RUTA_VISTAS . "sabert/sabert.php"); //Carga la vista del informe
      require_once(RUTA_VISTAS . "basic/footer.php");
    } else {
      header("Location:" . URL_PATH);
    }
  }

  public function sabert2(){
     if (isset($_SESSION['session_id'])) {
        $titlepage = "Informe Saber Pro y TYT";
        require_once(RUTA_VISTAS . "basic/header.php");
        require_once(RUTA_VISTAS . "basic/navbar.php");
        require_once(RUTA_VISTAS . "sabert/sabert2.php"); //Carga la vista del informe
        require_once(RUTA_VISTAS . "basic/footer.php");
     } else {
      header("Location:" . URL_PATH);
    }
  }

  public function informe(){
      if (isset($_SESSION['session_id'])) {
          $titlepage = "Informe Saber Pro y TYT";
          require_once(RUTA_VISTAS . "basic/header.php");
          require_once(RUTA_VISTAS . "basic/navbar.php");
          require_once(RUTA_VISTAS . "sabert/sabert.php"); //Carga la vista del informe
          require_once(RUTA_VISTAS . "basic/footer.php");
        } else {
          header("Location:" . URL_PATH);
        }
  }

  public function interpretars(){
      if (isset($_SESSION['session_id'])) {
        $titlepage = "Interpretación de resultados";
        require_once(RUTA_VISTAS . "basic/header.php");
        require_once(RUTA_VISTAS . "basic/navbar.php");
        require_once(RUTA_VISTAS . "sabert/interpretars.php"); //Carga la vista del informe
        require_once(RUTA_VISTAS . "basic/footer.php");
      } else {
        header("Location:" . URL_PATH);
      }
  }
  
}
