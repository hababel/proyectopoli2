<?php 

class informeController{

  public function index(){
    if (isset($_SESSION['session_id'])) {
        $titlepage = "Exportación informe Power BI";
        require_once(RUTA_VISTAS . "basic/header.php");
        require_once(RUTA_VISTAS . "basic/navbar.php");
        require_once(RUTA_VISTAS . "informes/informe.php");//Carga la vista correspondiente al modulo de informes.
        require_once(RUTA_VISTAS . "basic/footer.php");
    } else {
      header("Location:" . URL_PATH);
    }
  }
  
}



?>