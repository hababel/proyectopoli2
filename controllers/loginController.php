<?php 

require_once("model/login.php");
require_once("config/recursos.php");

class loginController{

  public $instmodel;

  function __construct(){

    $this->instmodel=new LoginModel(); // Instancia la clase del modelo.
    
  }
  
  /*
  Metodo por defecto index, mostrando el login */
  public function index(){
    if(!isset($_SESSION['session_id'])){
      require_once(RUTA_VISTAS.'login/login.php');
    }else{
      header("Location:" . URL_PATH . "/home",301,true);
      exit;
    }
  }

  /*
  
  Entrada: Usuario (post) y contraseña (post).
  Toma el email y clave escrito en el input de login y los valida con la base de datos.
  Si estos existen y estan correctos inicia Session y redirecciona al home.
  
  */
  public function validalogin(){
    
    $email_input=$_POST['email_input'];
    $pass_input=$_POST['pass_input'];

    $validacion_user=$this->instmodel->validalogin($email_input);

    if($validacion_user){

        if (password_verify($pass_input, $validacion_user->Clave)) {

            if($validacion_user->estado == 0){

              $sessData['message']['error'] = true;
              $sessData['message']['type'] = 'warning';
              $sessData['message']['title'] = 'Atencion!';
              $sessData['message']['msg'] = 'Usuario esta deshabilitado.  Por favor contacte con el administrador.';

              $_SESSION['Datamessage'] = $sessData;

              header("Location:" . URL_PATH,true,302);
              exit();

            }else{

                $_SESSION['session_id'] = session_id();
                $_SESSION['user'] = array(
                  'id' => $validacion_user->id,
                  'nombre' => $validacion_user->nombre,
                  'Nombre_Corto' => $validacion_user->Nombre_Corto,
                  'Email' => $validacion_user->Email,
                  'Tipo Usuario' => $validacion_user->tipo_usuario,
                  'estado' => $validacion_user->estado,
                );

                header("Location:" . URL_PATH ."home",true,302);
                exit();

            }

        } else {

          $sessData['message']['error'] = true;
          $sessData['message']['type'] = 'error';
          $sessData['message']['title'] = 'Error';
          $sessData['message']['msg'] = 'Usuario y clave no existen.';

          $_SESSION['Datamessage'] = $sessData;

          header("Location:" . URL_PATH,true,302);
          exit();

        }

    }else{
      
        $sessData['message']['error'] = true;
        $sessData['message']['type'] = 'error';
        $sessData['message']['title'] = 'Error';
        $sessData['message']['msg'] = 'Usuario y clave no existen.';

        $_SESSION['Datamessage'] = $sessData;

        header("Location:" . URL_PATH,true,302);

    }

  }

  /*
  Muestra la vista para escribir el email para recordar contraseña
  */
  public function forgotpass(){

    require_once(RUTA_VISTAS."login/forgotpass.php");

  }
  public function registro(){

    require_once(RUTA_VISTAS."login/registro.php");

  }

  /*
  Muestra la vista para escribir la nueva clave, cuando solicite recordar clave.
  */

	public function resetpass(){

		$token_code= $_REQUEST['tokencode'];
    require_once(RUTA_VISTAS."login/resetpass.php");

  }

  /*
  Entrada: Email (post), Token (get)
  Valida el email ingresado por input.  Si es correcto actualiza base de datos generando un token aleatorio.
  Construye la plantilla y el link (redirecciona a la vista resetpass) para envio al correo.

  Valida si el token en la DB es igual al recibido por medio de GET.
  */

  public function recoverypass(){
    if (isset($_POST['email_input_forgotpass'])) {
      
        $recover_email_input = filter_var($_POST['email_input_forgotpass']);
        $foundemailuser = $this->instmodel->validalogin($recover_email_input);

        if ($foundemailuser) {
          $token_genered = password_hash(uniqid(mt_rand()), PASSWORD_DEFAULT);
          $update_login_token = $this->instmodel->updatetoken($token_genered, $foundemailuser->id);
          $nombre= $foundemailuser->nombre;
          if ($update_login_token) {

						$ajaxresponse=false;
            $resetPassLink = URL_PATH . "login/resetpass?tokencode=" . $token_genered;
            $subject = "Recuperar Clave - Proyecto-POLI";

						$Dir = RUTA_VISTAS. "templaterecoverypass.php";

						if (!file_exists($Dir)) {
							$File = false;
						} else {
							ob_start();
							include $Dir;
							$File = ob_get_contents();
							ob_end_clean();

							$enviocorreos = enviarEmail($foundemailuser->nombre,$foundemailuser->Email, $File, $subject, $ajaxresponse);
              
              if($enviocorreos){

                $sessData['message']['error'] = false;
                $sessData['message']['type'] = 'success';
                $sessData['message']['title'] = 'Hecho!';
                $sessData['message']['msg'] = 'Valide su correo electrónico.';
                $_SESSION['Datamessage'] = $sessData;
                header("Location:" . URL_PATH . "login/forgotpass",true,302);
                exit();
              }else{

                $sessData['message']['error'] = true;
                $sessData['message']['type'] = 'error';
                $sessData['message']['title'] = 'Error';
                $sessData['message']['msg'] = 'Ha ocurrido un problema.  Por favor comuniquese con soporte.';
                $_SESSION['Datamessage'] = $sessData;
                header("Location:" . URL_PATH . "login/forgotpass",true,302);
                exit();
              }
						}

						//echo "<a href='". $resetPassLink."'>link</a>";

            exit();
          } else {

						$sessData['message']['error'] = true;
						$sessData['message']['type'] = 'error';
						$sessData['message']['title'] = 'Error';
						$sessData['message']['msg'] = 'Ha ocurrido un problema.  Por favor comuniquese con soporte.';

						$_SESSION['Datamessage'] = $sessData;

						 header("Location:" . URL_PATH . "login/forgotpass",true,302);
             exit();
          }
        } else {

          $sessData['message']['error'] = true;
          $sessData['message']['type'] = 'warning';
          $sessData['message']['title'] = 'Atención !';
          $sessData['message']['msg'] = 'El correo no se encuentra en la base de datos.  Contacte al administrador';
          
          $_SESSION['Datamessage'] = $sessData;

          header("Location:" . URL_PATH. "login/forgotpass",true,302);
          exit();
        }

    } elseif (isset($_POST['resetpassword'])) {

      	$fp_code = '';
				$fp_code = $_POST['fp_code'];
				$prevUser = $this->instmodel->validatetoken($fp_code);
			
				if (!empty($prevUser)) {

						$pass_form = $_POST['resetpassword'];
						$newpass = password_hash($pass_form, PASSWORD_DEFAULT);
						$update_pass = $this->instmodel->resetpass($newpass, $fp_code);

						if ($update_pass) {
							$sessData['message']['error'] = false;
							$sessData['message']['type'] = 'success';
							$sessData['message']['title'] = 'Hecho!';
							$sessData['message']['msg'] = 'Clave actualizada.  Por favor ingrese con su nueva clave.';
							$_SESSION['Datamessage'] = $sessData;
							header("Location:".URL_PATH,true,302);
							exit();
						} else {
							$sessData['message']['error'] = true;
							$sessData['message']['type'] = 'error';
							$sessData['message']['title'] = 'Error!';
							$sessData['message']['msg'] = 'Ha ocurrido un problema.  Por favor comuniquese con soporte.';
							$_SESSION['Datamessage'] = $sessData;
							header("Location:" . URL_PATH . "login/forgotpass",true,302);
							exit();
						}

				} else {

					$sessData['message']['error'] = true;
					$sessData['message']['type'] = 'error';
					$sessData['message']['title'] = 'Error!';
					$sessData['message']['msg'] = 'No esta autorizado para este proceso.';
					$_SESSION['Datamessage'] = $sessData;
					header("Location:" . URL_PATH,true,302);
					exit();
				}
      
    }else{

			$sessData['message']['error'] = true;
			$sessData['message']['type'] = 'error';
			$sessData['message']['title'] = 'Error!';
			$sessData['message']['msg'] = 'Ha ocurrido un problema.  Por favor comuniquese con soporte.';
			$_SESSION['Datamessage'] = $sessData;
			header("Location:" . URL_PATH . "login",true,302);
			exit();

		}
  }

  /* Cierra sesion de usuario  */

  public function logout(){
    session_start();
    session_destroy();
    header("Location:" . URL_PATH,true,302);
    exit();
  }


}


?>