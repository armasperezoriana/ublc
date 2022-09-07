<?php

  class Trabajador extends DB //Creando una nueva clase para Trabajadores
  {
    protected $nombres;
    protected $apellidos;
    protected $cedula;
    protected $nacimiento;
    protected $sexo;
    protected $estCivil;
    protected $direccion;
    protected $telefonoFijo;
    protected $telefonoCelular;
    protected $correo;
    protected $status;
    protected $id;
    protected $proceso;
    protected $tipoTrabajador;// Atributos que son solo para trabajadores como tipo de trabajador
    protected $estTrabajo;   // Estatus del trabajador (Activo/Jubilado)
    protected $fechaIngreso; // Fecha en la que inicio la labor

    function __construct()
    {
      parent::__construct();// INICIA EL COSNTRUCTOR DE LA CLASE DB, Y ESTA CONSTRUYE LA CLASE PDO
    }

    public function setCedula($cedula) //Suministrar una cedula al objeto
    {
      $this->cedula = $cedula;
    }
    public function setId($id)
    {
      $this->id = $id;
    }
    // Para obtener los valores privados o protegidos
    public function getNombres()
    {
      return $this->nombres;
    }
    public function getApellidos()
    {
      return $this->apellidos;
    }
    public function getCedula()
    {
      return $this->cedula;
    }
    public function getNacimiento()
    {
      return $this->nacimiento;
    }
    public function getSexo()
    {
      return $this->sexo;
    }
    public function getEstCivil()
    {
      return $this->estCivil;
    }
    public function getDireccion()
    {
      return $this->direccion;
    }
    public function getTelefonoFijo()
    {
      return $this->telefonoFijo;
    }
    public function getTelefonoCelular()
    {
      return $this->telefonoCelular;
    }
    public function getCorreo()
    {
      return $this->correo;
    }

    public function getStatus()
    {
      return $this->status;
    }
    public function getId()
    {
      return $this->id;
    }
    public function getProceso()
    {
      return $this->proceso;
    }
    public function getTipoTrabajador()
    {
      return $this->tipoTrabajador;
    }
    public function getEstTrabajo()
    {
      return $this->estTrabajo;
    }
    public function getFechaIngreso()
    {
      return $this->fechaIngreso;
    }

    public function setTrabajador($nombres, $apellidos, $cedula, $nacimiento, $sexo, $estCivil,
      $direccion, $telefonoFijo, $telefonoCelular, $correo, $tipoTrabajador,
      $estTrabajo, $fechaIngreso)
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
      $this->tipoTrabajador = $tipoTrabajador;
      $this->estTrabajo = $estTrabajo;
      $this->fechaIngreso = $fechaIngreso;
    }

    public function consultar()
    {
      try
      {
        $sql = "SELECT * FROM trabajador WHERE cedula = :cedula and status = 1 or id = :id and status = 1";
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
        $this->tipoTrabajador = $persona['tipotrabajador'];
        $this->estTrabajo = $persona['esttrabajo'];
        $this->fechaIngreso = $persona['fechaingreso'];
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
        $sql = "SELECT * FROM trabajador ".$condicion;
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

    public function consultarId()//BUSCANDO EL ID EN LA BD
    {
      try
      {
        $sql = "SELECT id FROM trabajador WHERE cedula = '" .$this->cedula ."' and status = 1";
        $trab = $this->prepare($sql);
        $trab->execute();
        $worker = $trab->fetchAll(PDO::FETCH_ASSOC);// ASOCIA Y GUARDA LA CONSULTA
        foreach ($worker as $trabajador)
        {
          $this->id = $trabajador['id'];
        }

        $this->proceso = ['status' => true];
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }

    }

    public function registrar()
    {
      try
      {
        $sql = "INSERT INTO trabajador(cedula, nombres, apellidos,nacimiento,
          sexo, estcivil, direccion, telefonofijo, telefonocelular, correo,
          tipotrabajador, esttrabajo, fechaingreso) VALUES(:cedula, :nombres, :apellidos,
          :nacimiento, :sexo, :estcivil, :direccion, :telefonofijo, :telefonocelular, :correo,
          :tipotrabajador, :esttrabajo, :fechaingreso)";

        $insert = $this->prepare($sql);//todas las clases heredan los metodos de PDO
        $resultado = $insert->execute(array(':cedula' => $this->cedula, ':nombres' => $this->nombres,
        ':apellidos' => $this->apellidos, ':nacimiento' => $this->nacimiento, ':sexo' => $this->sexo,
        ':estcivil' => $this->estCivil, ':direccion' => $this->direccion, ':telefonofijo' => $this->telefonoFijo,
        ':telefonocelular' => $this->telefonoCelular, ':correo' => $this->correo,
        ':tipotrabajador' => $this->tipoTrabajador, ':esttrabajo' => $this->estTrabajo,
        ':fechaingreso' => $this->fechaIngreso));

        return $resultado;
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
        $sql = "UPDATE trabajador SET cedula=:cedula, nombres=:nombres, apellidos=:apellidos,
        nacimiento=:nacimiento, sexo=:sexo, estcivil=:estcivil, direccion=:direccion,
        telefonofijo=:telefonofijo, telefonocelular=:telefonocelular,
        correo=:correo, tipotrabajador=:tipotrabajador, esttrabajo=:esttrabajo,
        fechaingreso=:fechaingreso WHERE id=:id";//actualizo los datos del trabajador usando el marcador

        $update = $this->prepare($sql);
        $resultado = $update->execute(array(':cedula' => $this->cedula, ':nombres' => $this->nombres,
        ':apellidos' => $this->apellidos, ':nacimiento' => $this->nacimiento, ':sexo' => $this->sexo,
        ':estcivil' => $this->estCivil, ':direccion' => $this->direccion, ':telefonofijo' => $this->telefonoFijo,
        ':telefonocelular' => $this->telefonoCelular, ':correo' => $this->correo,
        ':tipotrabajador' => $this->tipoTrabajador, ':esttrabajo' => $this->estTrabajo,
        'fechaingreso' => $this->fechaIngreso, ':id' => $this->id));//pasando el valor marcador al objeto

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
      try{
        $sql = "UPDATE trabajador SET status = 0 WHERE id =:id";
        $update = $this->prepare($sql); //Cambiar el estado del trabajador a 0 para eliminarlo lógicamente
        $resultado = $update->execute(['id' => $this->id]);
        return $resultado;
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }

    public function eliminarCompleto()
    {
      try{
        $sql = "DELETE FROM trabajador WHERE id =:id";
        $delete = $this->prepare($sql);
        $resultado = $delete->execute(['id' => $this->id]);
        return $resultado;
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }

    public function restaurar()
    {
      try
      {
        $sql = "UPDATE trabajador SET status = 1 WHERE cedula = '" .$this->cedula ."'";
        $update =  $this->prepare($sql);
        $update->execute();

        $this->proceso = ['status' => true];
      }
      catch (PDOException $e)
      {
        $error = "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
        $this->proceso = ['status' => false, 'info' =>  $error];
      }
    }
  }//Fin de Clase

?>
