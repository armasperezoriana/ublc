<?php

 class Medicamento extends DB
 {
  private $nombre;
  private $id;

  public function __construct()
  {
    parent::__construct();// INICIA EL COSNTRUCTOR DE LA CLASE DB, Y ESTA CONSTRUYE LA CLASE PDO
  }

  public function setNombre($nombre)
  {
   $this->nombre = $nombre;
  }
  public function setId($id)
  {
   $this->id = $id;
  }
  public function getNombre()
  {
   return $this->nombre;
  }
  public function getId()
  {
   return $this->id;
  }

    public function registrar()
    {
      try
      {
        $sql= "INSERT INTO medicamento(nombre) VALUES (:nombre)";
        $insert = $this->prepare($sql);
        $registro = $insert->execute(array('nombre'=>$this->nombre));
        return $registro;
      }
      catch(PDOException $e){
        die($e->getMensage());
        $registrarse = false;
        return $registrarse;
      }
    }

    public function consultar(){
      try{
        $sql="SELECT * FROM medicamento WHERE nombre = :nombre";
        $consulta = $this->prepare($sql);
        $consulta->execute([':nombre' => $this->nombre]);
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        $this->id = $resultado['id'];
        $this->proceso = ['status' => true];
        return $resultado;
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }
    public function consultas($condicion = NULL){
      try{
        $sql="SELECT * FROM medicamento ".$condicion;
        $consulta = $this->prepare($sql);
        $consulta->execute();
        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $this->proceso = ['status' => true];
        return $resultados;
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }

    public function modificar(){
      try{
        $sql="UPDATE medicamento SET nombre=:nombre WHERE id=:id";
        $modifica=$this->prepare($sql);
        $resultado = $modifica->execute([':nombre' => $this->nombre, ':id' => $this->id]);
        return $resultado;
      }
    catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }

    public function eliminar(){
      try{
      $sql="DELETE FROM medicamento WHERE id = ".$this->id;
      $eliminar=$this->prepare($sql);
      $proceso = $eliminar->execute();
      return $proceso;
    }
       catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }
 }//Fin de la clase
?>
