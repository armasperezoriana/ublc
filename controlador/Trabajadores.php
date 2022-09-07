<?php
  /**
   * Gestionar Trabajadores
   */
  class Trabajadores extends Controlador
  {

    function __construct()
    {
      if (!isset($_SESSION['login'])) {
        $this->vista("error");
      }
    }

    public function index()
    {
      $this->vista("trabajadores");
    }
    public function agregar()
    {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['cedula'])) {
          $this->controlador("registrar");
        }
        if (isset($_POST['cedulaRestaurar'])) {
          $this->controlador("restaurar");
        }
        if (isset($_POST['idPersona'])) {
            $this->controlador("asociarDatosTrab");
        }
      }
      else {
        $this->vista("trabajadores/agregar");
      }
    }

    public function consultar($parametro = NULL)
    {
      if (!isset($parametro)) {
        if (isset($_GET['buscar'])) {
          $this->controlador("buscar");
        }
        else {
          $this->vista("trabajadores/consultar");
        }
      }
      else {
        if ($parametro == "consultando") {
          if (isset($_POST['cedula'])) {
            $this->controlador("consultar");
          }
          else {
            header('Location: '.dir.'trabajadores/');
          }
        }
        if ($parametro == "consultarPDF") {
          if (isset($_POST['cedula'])) {
            $this->controlador("consultarPDF");
          }
          else {
            header('Location: '.dir.'trabajadores/');
          }
        }

        if ($parametro == "modificando") {
          if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['id'])) {
              $this->controlador("modificar");
            }
            else if (isset($_POST['cedula'])) {
              $this->controlador("modificando");
            }
            if (isset($_POST['cedulaRestaurar'])) {
              $this->controlador("restaurar");
            }
            if (isset($_POST['idPersona'])) {
              $this->controlador("asociarModificarDatosTrab");
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
          $this->controlador("eliminar");
        }
      }
      else {
        header('Location: '.dir.'trabajadores/');
      }
    }

  }//Fin de Controlador

?>
