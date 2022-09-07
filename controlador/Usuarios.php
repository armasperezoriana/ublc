<?php
  /**
   * Administración de Usuarios, normales y administradores
   */
  class Usuarios extends Controlador
  {

    function __construct()
    {
      if (!isset($_SESSION['login'])) {
        header('Location: '.dir);
      }
      if (!isset($_SESSION['level'])) {
        header('Location: '.dir);
      }
    }

    public function index()
    {
      if ($_SESSION['level'] == "Normal"){
        header('Location: ' .dir.'usuarios/usuN_modificar/');
      }
      if ($_SESSION['level'] == "Administrador") {
        header('Location: ' .dir.'usuarios/admin/');
      }
    }

    public function admin()
    {
      if ($_SESSION['level'] == "Normal") {
        header('Location: ' .dir.'usuarios/usuN_modificar/');
      }
      else {
        $this->controlador("usu_consultar");
      }
    }

    public function usu_agregar()
    {
      if ($_SESSION['level'] == "Normal") {
        header('Location: ' .dir.'usuarios/usuN_modificar/');
      }
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $this->controlador("usu_agregar");
      }
      else {
        $this->vista("administrar_usuarios/usu_agregar");
      }
    }

    public function usu_modificar()
    {
      if ($_SESSION['level'] == "Normal") {
        header('Location: ' .dir.'usuarios/usuN_modificar/');
      }
      if (isset($_POST['id'])) {
        $this->controlador("usu_modificar");
      }
      else
      {
        if (isset($_POST['usuarioEliminar'])) {
          $this->controlador("usu_eliminar");
        }
        else {
          $this->controlador("usu_modificando");
        }
      }

    }

    public function usuN_modificar()
    {
      if ($_SESSION['level'] == "Administrador") {
        header('Location: ' .dir.'usuarios/usu_modificar/');
      }
      if (isset($_POST['id'])) {
        $this->controlador("usu_modificar");
      }
      else
      {
        if (isset($_POST['usuarioEliminar'])) {
          $this->controlador("usu_eliminar");
        }
        else {
          $this->controlador("usu_modificando");
        }
      }
    }
  }

?>
