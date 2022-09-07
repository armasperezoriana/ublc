<?php
  /**
   * Gestionar Trabajadores
   */
  class Beneficiarios extends Controlador
  {

    function __construct()
    {
      if (!isset($_SESSION['login'])) {
        $this->vista("error");
      }
    }

    public function index()
    {
      $this->vista("beneficiarios");
    }
    public function agregar()
    {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['cedula'])) {
          $this->controlador("registrarBene");
        }
        if (isset($_POST['idPersona'])) {
            $this->controlador("asociarDatosBene");
        }
      }
      else {
        $this->vista("beneficiarios/agregar");
      }
    }

    public function consultar($parametro = NULL)
    {
      if (!isset($parametro)) {
        if (isset($_GET['buscar'])) {
          $this->controlador("buscarBene");
        }
        else {
          $this->vista("beneficiarios/consultar");
        }
      }
      else {
        if ($parametro == "consultando") {
          if (isset($_POST['cedula'])) {
            $this->controlador("consultarBene");
          }
          else {
            header('Location: '.dir.'beneficiarios/');
          }
        }
        if ($parametro == "consultarPDF") {
          if (isset($_POST['cedula'])) {
            $this->controlador("consultarPDFBene");
          }
          else {
            header('Location: '.dir.'beneficiarios/');
          }
        }

        if ($parametro == "modificando") {
          if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['id'])) {
              $this->controlador("modificarBene");
            }
            else if (isset($_POST['cedula'])) {
              $this->controlador("modificandoBene");
            }
            if (isset($_POST['idPersona'])) {
              $this->controlador("asociarModificarDatosBene");
            }
          }
          else {
            header('Location: '.dir.'trabajadores/');
          }
        }

      }

    }

    public function eliminar()
    {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['cedula'])) {
          $this->controlador("eliminarBene");
        }
      }
      else {
        header('Location: '.dir.'beneficiarios/');
      }
    }
  }

?>
