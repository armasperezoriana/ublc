<?php
  /*
    * Clase hija de PDO. Se encarga de conectar con la base de datos para las consultas
  */
  class DB extends PDO
  {
    private $host = "localhost";
    private $db = "ublc";
    private $user = "mysql";
    private $pw = "";
    protected $connected;
    protected $error;

    function __construct()
    {
      try
      {
        parent::__construct("pgsql:host=".$this->host ."; dbname=".$this->db, $this->user, $this->pw);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $this->connected = true;
      }
      catch (PDOException $e)
      {
        $this->error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->connected = false;
      }

    }
    public function getConnected()
    {
      return $this->connected;
    }
    public function getError()
    {
      return $this->error;
    }

  }


?>
