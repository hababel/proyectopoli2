<?php 

class ayudaController{

  public function index(){
    if (isset($_SESSION['session_id'])) {
        $titlepage = "Ayudas";
        require_once(RUTA_VISTAS . "basic/header.php");
        require_once(RUTA_VISTAS . "basic/navbar.php");
        require_once(RUTA_VISTAS . "ayudas/ayuda.php");//Carga la vista correspondiente al modulo de ayuda
        require_once(RUTA_VISTAS . "basic/footer.php");
    } else {
      header("Location:" . URL_PATH);
    }
  }
  
}



?>