<?php
  /*
    Esta clase es el corazón de la aplicación
    Se encarga de llamar a los controladores e invocar los métodos
   */
  class Core
  {
    protected $controlador = "Inicio";
    protected $metodo = "index";
    protected $parametros = [];

    function __construct() //Revisa la existencia de los controladores y los invoca
    {
      $url = $this->url();
      
      if (isset($url)) {
        if (isset($url[0])) {
          $enlace = "controlador/".ucwords($url[0]).".php";
          if (file_exists($enlace)) {
            $this->controlador = ucwords($url[0]);
          }
          else {
            require_once 'vista/error_direccion.php';
            return false;
          }
        }
        require_once $enlace; //Requerimos el archivo con el controlador
        $this->controlador = new $this->controlador; //Instanciamos el controlador

        if (isset($url[1])) {
          if (method_exists($this->controlador, $url[1])) {
            $this->metodo = $url[1];
          }
          else {
            require_once 'vista/error_direccion.php';
            return false;
          }
        }

        unset($url[0]);
        unset($url[1]);
        $this->parametros = $url ? array_values($url) : [];

        if (isset($_SESSION['login'])) {
          call_user_func_array([$this->controlador, $this->metodo], $this->parametros);
        }
        if ($this->metodo == "recuperar") {
          call_user_func_array([$this->controlador, $this->metodo], $this->parametros);
        }
      }
      else {
        require 'controlador/Inicio.php';
        $this->controlador = new $this->controlador;
        call_user_func_array([$this->controlador, $this->metodo], $this->parametros);
      }

    }

    public function url() //Obtenemos y ordenamos la Url
    {
      if (isset($_GET['url']))
      {
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        return $url;
      }
    }
  }

?>
