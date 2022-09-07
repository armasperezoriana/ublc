<?php
  /**
   * Módulo de Patologías
   */
  class Patologias extends Controlador
  {
    function __construct()
    {
      if (!isset($_SESSION['login'])) {
        $this->vista("error");
      }
    }

    public function index()
    {
        $this->vista("patologias");
    }

    public function registrar()
    {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $this->controlador("registrarPat");
      }
      else {
        header('Location: '.dir.'patologias/');
      }
    }

    public function modificar()
    {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $this->controlador("modificarPat");
      }
      else {
        header('Location: '.dir.'patologias/');
      }
    }

    public function eliminar()
    {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $this->controlador("eliminarPat");
      }
      else {
        header('Location: '.dir.'patologias/');
      }
    }
  }//Fin del controlador

?>
