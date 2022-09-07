<?php
  /**
   * Módulo de Medicamentos
   */
  class Medicamentos extends Controlador
  {
    function __construct()
    {
      if (!isset($_SESSION['login'])) {
        $this->vista("error");
      }
    }

    public function index()
    {
        $this->vista("medicamentos");
    }

    public function registrar()
    {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $this->controlador("registrarMed");
      }
      else {
        header('Location: '.dir.'medicamentos/');
      }
    }

    public function modificar()
    {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $this->controlador("modificarMed");
      }
      else {
        header('Location: '.dir.'medicamentos/');
      }
    }

    public function eliminar()
    {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $this->controlador("eliminarMed");
      }
      else {
        header('Location: '.dir.'medicamentos/');
      }
    }
  }//Fin del controlador

?>
