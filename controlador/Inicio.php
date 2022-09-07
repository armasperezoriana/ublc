<?php
  /**
   * Inicio de Sesión
   */
  class Inicio extends Controlador
  {
    function __construct()
    {
      if (isset($_SESSION['login']))
      {
        header('Location: '.dir.'sismeu/');
      }
    }

    public function index()
    {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $this->controlador("iniciar_sesion");
      }
      else {
        $this->vista("inicio_sesion");
      }
    }

    public function logout()
    {
      unset($_SESSION['login']);
      unset($_SESSION['level']);
      header('Location: '.dir);
    }

    public function recuperar()
    {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $this->controlador("recuperarAcceso");
      }
      else {
        $this->vista("recuperar");
      }
    }
  }//Fin de Controlador

?>
