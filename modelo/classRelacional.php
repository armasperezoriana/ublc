<?php

	class Relacional extends DB {
		private $idmed;
		private $idtrab;
		private $idpat;
	  private $idbene;

		public function __construct(){
			parent::__construct();
		}
		//Setters
		public function SETtrab_med($idtrab, $idmed){
			$this->idmed=$idmed;
			$this->idtrab=$idtrab;
		}

	  public function SETtrab_pat($idtrab, $idpat){
			$this->idpat=$idpat;
			$this->idtrab=$idtrab;
		}

	  public function SETtrab_bene($idtrab, $idbene){
	    $this->idbene=$idbene;
	    $this->idtrab=$idtrab;
	  }

	  public function SETbene_med($idbene, $idmed){
	    $this->idmed=$idmed;
	    $this->idbene=$idbene;
	  }

	  public function SETbene_pat($idbene, $idpat){
	    $this->idpat=$idpat;
	    $this->idbene=$idbene;
	  }

    public function registrarTrab_Med()
    {
      try
      {
        $sql = "INSERT INTO trab_med(id_trabajador,id_medicamento) VALUES(:id_trabajador,:id_medicamento)";
        $insert = $this->prepare($sql);//todas las clases heredan los metodos de PDO
        $insert->execute(array(':id_trabajador'=>$this->idtrab,':id_medicamento'=>$this->idmed));
        $this->proceso = ['status' => true];
        return $this->proceso;
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }

    public function registrarTrab_Pat()
    {
      try
      {
        $sql = "INSERT INTO trab_pat(id_trabajador,id_patologia) VALUES(:id_trabajador,:id_patologia)";
        $insert = $this->prepare($sql);//todas las clases heredan los metodos de PDO
        $insert->execute(array(':id_trabajador'=>$this->idtrab,':id_patologia'=>$this->idpat));
        $this->proceso = ['status' => true];
        return $this->proceso;
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }

		public function registrarBene_Med()
    {
      try
      {
        $sql = "INSERT INTO bene_med(id_beneficiario,id_medicamento) VALUES(:id_beneficiario,:id_medicamento)";
        $insert = $this->prepare($sql);//todas las clases heredan los metodos de PDO
        $insert->execute(array(':id_beneficiario'=>$this->idbene,':id_medicamento'=>$this->idmed));
        $this->proceso = ['status' => true];
        return $this->proceso;
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }

    }

    public function registrarBene_Pat()
    {
      try
      {
        $sql = "INSERT INTO bene_pat(id_beneficiario,id_patologia) VALUES(:id_beneficiario,:id_patologia)";
        $insert = $this->prepare($sql);//todas las clases heredan los metodos de PDO
        $insert->execute(array(':id_beneficiario'=>$this->idbene,':id_patologia'=>$this->idpat));
        $this->proceso = ['status' => true];
        return $this->proceso;
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }

    }

    public function registrarTrab_Bene()
    {
      try
      {
        $sql = "INSERT INTO trabajador_beneficiario(id_trabajador,id_beneficiario) VALUES(:id_trabajador,:id_beneficiario)";
        $insert = $this->prepare($sql);//todas las clases heredan los metodos de PDO
        $insert->execute(array(':id_trabajador'=>$this->idtrab,':id_beneficiario'=>$this->idbene));
        $this->proceso = ['status' => true];
        return $this->proceso;
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }

    }

		public function consultarTrab_Bene($condicion = NULL){
    	try
      {
        $sql = "SELECT * FROM trabajador_beneficiario ".$condicion;
        $trab = $this->prepare($sql);
        $trab->execute();
        $person = $trab->fetchAll(PDO::FETCH_ASSOC);// ASOCIA Y GUARDA LA CONSULTA
        return $person;
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() ;
        $this->proceso = ['status' => false, 'info' =>  $error];
      }

    }
		public function consultarTrab_Med($condicion = NULL){
    	try
      {
        $sql = "SELECT * FROM trab_med ".$condicion;
        $trab = $this->prepare($sql);
        $trab->execute();
        $worker = $trab->fetchAll(PDO::FETCH_ASSOC);// ASOCIA Y GUARDA LA CONSULTA
        return $worker;
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() ;
        $this->proceso = ['status' => false, 'info' =>  $error];
      }

    }

    public function consultarTrab_Pat($condicion = NULL){
    	try
      {
        $sql = "SELECT * FROM trab_pat ".$condicion;
        $trab = $this->prepare($sql);
        $trab->execute();
        $worker = $trab->fetchAll(PDO::FETCH_ASSOC);// ASOCIA Y GUARDA LA CONSULTA
        return $worker;
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() ;
        $this->proceso = ['status' => false, 'info' =>  $error];
      }

    }

    public function consultarBene_Med($condicion = NULL){
    	try
      {
        $sql = "SELECT * FROM bene_med ".$condicion;
        $trab = $this->prepare($sql);
        $trab->execute();
        $person = $trab->fetchAll(PDO::FETCH_ASSOC);// ASOCIA Y GUARDA LA CONSULTA
        return $person;
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() ;
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }

    public function consultarBene_Pat($condicion = NULL){
    	try
      {
        $sql = "SELECT * FROM bene_pat ".$condicion;
        $trab = $this->prepare($sql);
        $trab->execute();
        $person = $trab->fetchAll(PDO::FETCH_ASSOC);// ASOCIA Y GUARDA LA CONSULTA
        return $person;
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() ;
        $this->proceso = ['status' => false, 'info' =>  $error];
      }

    }


    public function eliminarTrab_Bene($condicion){
      try{
        $sql="DELETE FROM trabajador_beneficiario ".$condicion;
        $elimina=$this->prepare($sql);
        $elimina->execute();
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() ;
        $this->proceso = ['status' => false, 'info' =>  $error];
      }

    }

		public function eliminarTrab_Pat($condicion){
      try{
        $sql="DELETE FROM trab_pat ".$condicion;
        $elimina=$this->prepare($sql);
        $elimina->execute();
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() ;
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }

    public function eliminarTrab_Med($condicion){
      try{
        $sql="DELETE FROM trab_med ".$condicion;
        $elimina=$this->prepare($sql);
        $elimina->execute();
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() ;
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }
		public function eliminarBene_Pat($condicion){
      try{
        $sql="DELETE FROM bene_pat ".$condicion;
        $elimina=$this->prepare($sql);
        $elimina->execute();
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() ;
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }

    public function eliminarBene_Med($condicion){
      try{
        $sql="DELETE FROM bene_med ".$condicion;
        $elimina=$this->prepare($sql);
        $elimina->execute();
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() ;
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }
	}//Fin de Clase

?>
