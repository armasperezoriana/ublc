<?php
  /*
    Controlador principal que sirve para llamar a los modelos y vistas
   */
  class Controlador
  {
    private $modelo;
    private $vista;
    private $controlador;
    function __construct(){
    }

    public function modelo($modelo)
    {
      $this->modelo = "modelo/class".$modelo.".php";
      if (file_exists($this->modelo)) {
        require_once $this->modelo;
      }
      else {
        $this->modelo = "modelo/".$modelo.".php";
        if (file_exists($this->modelo)) {
          require_once $this->modelo;
        }
        else {
          $datos['mensaje'] = "Error al cargar el modelo";
          $this->vista("mensajeG", $datos);
        }
      }
    }

    public function vista($vista, $datos = NULL)
    {
      $archivo = "vista/".$vista."/index.php";
      if (file_exists($archivo)) {
        $this->vista = $archivo;
      }
      else {
        $archivo = "vista/".$vista.".php";
        if (file_exists($archivo)) {
          $this->vista = $archivo;
        }
        else {
          $this->vista = "vista/error_direccion.php";
        }
      }
      require_once $this->vista;
    }

    public function controlador($controlador)
    {
      $archivo = "controlador/procesos/".$controlador.".php";
      if (file_exists($archivo)) {
        $this->controlador = $archivo;
        require_once $this->controlador;
      }
      else {
        $datos['mensaje'] = "Error al cargar controlador";
        $this->vista("mensajeG", $datos);
      }
    }

  }

?>
