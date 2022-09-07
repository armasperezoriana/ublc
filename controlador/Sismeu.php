<?php
  /**
   * Menu Principal
   */
  class Sismeu extends Controlador
  {
    function __construct()
    {
      if (!isset($_SESSION['login'])) {
        $this->vista("error");
      }
    }

    public function index()
    {
      $this->vista("sismeu");
    }

    public function reembolsos($parametro = NULL)
    {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if ($parametro == "trabajador") {
          $this->controlador("reembolsos");
        }
        if ($parametro == "beneficiario") {
          $this->controlador("reembolsosBene");
        }
      }
      else {
        $this->vista("sismeu/reembolsos");
      }
    }

    public function reportes()
    {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $this->controlador("reportes");
      }
      else {
        $this->vista("sismeu/reportes");
      }
    }

    public function notificaciones()
    {
      $this->vista("sismeu/notificaciones");
    }

    public function datos_basicos()
    {
      $this->vista("sismeu/datos_basicos");
    }


  }

?>
