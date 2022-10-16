<?php 

class homeController{

  public function index(){
    if (isset($_SESSION['session_id'])) {
        $titlepage = "Panel Principal";
        require_once(RUTA_VISTAS . "basic/header.php");
        require_once(RUTA_VISTAS . "basic/navbar.php");
        require_once(RUTA_VISTAS . "home/home.php"); //Carga la vista correspondiente al modulo de Home o panel principal
        require_once(RUTA_VISTAS . "basic/footer.php");
    } else {
      header("Location:" . URL_PATH);
    }
  }
  
}



?>