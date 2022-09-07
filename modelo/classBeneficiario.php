<?php

  class Beneficiario extends Trabajador
  {
    private $cedulaTitular;
    private $parentesco;
    private $titular;

    function __construct()
    {
      parent::__construct();
    }

    public function getCedulaTitular()
    {
      return $this->cedulaTitular;
    }
    public function getParentesco()
    {
      return $this->parentesco;
    }
    public function getTitular()
    {
      return $this->titular;
    }

    public function setBeneficiario($nombres, $apellidos, $cedula, $nacimiento, $sexo,
      $estCivil, $direccion, $telefonoFijo, $telefonoCelular,
      $correo, $cedulaTitular, $parentesco)
    {
      $this->nombres = $nombres;
      $this->apellidos = $apellidos;
      $this->cedula = $cedula;
      $this->nacimiento = $nacimiento;
      $this->sexo = $sexo;
      $this->estCivil = $estCivil;
      $this->direccion = $direccion;
      $this->telefonoFijo = $telefonoFijo;
      $this->telefonoCelular = $telefonoCelular;
      $this->correo = $correo;
      $this->cedulaTitular = $cedulaTitular;
      $this->parentesco = $parentesco;
    }

    public function consultar()
    {
      try
      {
        $sql = "SELECT * FROM beneficiario WHERE cedula = :cedula or id = :id and status = 1";
        $per = $this->prepare($sql);
        $per->execute([':cedula' => $this->cedula, ':id' => $this->id]);
        $persona = $per->fetch(PDO::FETCH_ASSOC);

        $this->nombres = $persona['nombres'];
        $this->apellidos = $persona['apellidos'];
        $this->cedula = $persona['cedula'];
        $this->nacimiento = $persona['nacimiento'];
        $this->sexo = $persona['sexo'];
        $this->estCivil = $persona['estcivil'];
        $this->direccion = $persona['direccion'];
        $this->telefonoFijo = $persona['telefonofijo'];
        $this->telefonoCelular = $persona['telefonocelular'];
        $this->correo = $persona['correo'];
        $this->cedulaTitular = $persona['cedulatitular'];
        $this->parentesco = $persona['parentesco'];
        $this->id = $persona['id'];
        $this->status = $persona['status'];

        $this->proceso = ['status' => true];
        return $persona;
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }

    public function consultas($condicion = NULL)
    {
      try {
        $sql = "SELECT * FROM beneficiario ".$condicion;
        $per = $this->prepare($sql);
        $per->execute();
        $personas = $per->fetchAll(PDO::FETCH_ASSOC);
        return $personas;
      }
      catch (PDOException $e) {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }

    public function registrar()
    {
      try
      {
        $sql = "INSERT INTO beneficiario(cedula, nombres, apellidos,nacimiento,
          sexo, estcivil, direccion, telefonofijo, telefonocelular, correo,
          cedulatitular, parentesco) VALUES(:cedula, :nombres, :apellidos,
          :nacimiento, :sexo, :estcivil, :direccion, :telefonofijo, :telefonocelular, :correo,
          :cedulatitular, :parentesco)";

        $sentence = $this->prepare($sql);

        $resultado = $sentence->execute(array(':cedula' => $this->cedula, ':nombres' => $this->nombres,
        ':apellidos' => $this->apellidos, ':nacimiento' => $this->nacimiento, ':sexo' => $this->sexo,
        ':estcivil' => $this->estCivil, ':direccion' => $this->direccion, ':telefonofijo' => $this->telefonoFijo,
        ':telefonocelular' => $this->telefonoCelular, ':correo' => $this->correo,
        ':cedulatitular' => $this->cedulaTitular, ':parentesco' => $this->parentesco));
        return $resultado;
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }

    public function consultarId()
    {
      try
      {
        $sql = "SELECT id FROM beneficiario WHERE cedula = '" .$this->cedula ."' and status = 1";
        $bene = $this->prepare($sql);
        $bene->execute();
        $beneficiary = $bene->fetchAll(PDO::FETCH_ASSOC);
        foreach ($beneficiary as $beneficiario)
        {
          $this->id = $beneficiario['id'];
        }

        $this->proceso = ['status' => true];
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }

    public function modificar()
    {
      try
      {
        $sql = "UPDATE beneficiario SET cedula=:cedula, nombres=:nombres, apellidos=:apellidos,
        nacimiento=:nacimiento, sexo=:sexo, estcivil=:estcivil, direccion=:direccion,
        telefonofijo=:telefonofijo, telefonocelular=:telefonocelular,
        correo=:correo, cedulatitular=:cedulatitular, parentesco=:parentesco WHERE id=:id";
        $update = $this->prepare($sql);
        $resultado = $update->execute(array(':cedula' => $this->cedula, ':nombres' => $this->nombres,
        ':apellidos' => $this->apellidos, ':nacimiento' => $this->nacimiento, ':sexo' => $this->sexo,
        ':estcivil' => $this->estCivil, ':direccion' => $this->direccion, ':telefonofijo' => $this->telefonoFijo,
        ':telefonocelular' => $this->telefonoCelular, ':correo' => $this->correo,
        ':cedulatitular' => $this->cedulaTitular, ':parentesco' => $this->parentesco, ':id' => $this->id));

        return $resultado;
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }

    public function eliminar()
    {
      try
      {
        $sql = "DELETE FROM beneficiario WHERE id = '" .$this->id ."'";
        $delete = $this->prepare($sql);
        $resultado = $delete->execute();
        return $resultado;
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }
  }//Fin de Clase

?>
