<?php
session_start();
/* Todo esta lógica hara el papel de un FrontController o controlador principal*/

$ajaxresponse = false; // Esta variable es para detectar si es peticion ajax o no.

ini_set('display_errors', 2);
ini_set('display_startup_errors', 2);
error_reporting(E_ALL);

//Se incluye la configuración inicial
require_once ("config/config.php");

//Se incluye la conexión a datos del modelo
require_once("config/conn.php");

// Si tiene parametro definido por URL (get), Obtiene el controlador a cargar y el metodo a llamar. 
$controller = isset($_REQUEST['c']) ? filter_var(strtolower($_REQUEST['c'])) : 'login'; //Si no hay controlador se llama por defecto al controlador Login.
$accion = isset($_REQUEST['a']) ? filter_var($_REQUEST['a']) : 'index';// Si no hay metodo se llama por defecto al metodo index.

$path_controller = "controllers/" . $controller . "Controller.php";// Se construye la ruta donde esta el archivo controlador.

if (file_exists($path_controller)) {
  require_once $path_controller;
  $controller = ucwords($controller) . 'Controller';// Se construye el nombre del controlador segun de la opcion que venga.  Ejem: LoginController
  $controller = new $controller; //Instancia del controlador segun el modulo que esta cargando.
  if (method_exists($controller, $accion)) {
    $controller->$accion();//Llamado al metodo dentro de la clase que se cargo anteriormente.
  } else {
    header("Location:" . URL_PATH . "error");
  }
} else {
  header("Location:" . URL_PATH . "error");
}


