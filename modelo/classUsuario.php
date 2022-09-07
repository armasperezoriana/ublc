<?php

  class Usuario extends DB
  {
    private $id;
    private $nombres;
    private $apellidos;
    private $cedula;
    private $correo;
    private $nombreUsu;
    private $tipoUsu;
    private $clave;

    public function __construct()
    {
      parent::__construct();
    }

    public function getId()
    {
      return $this->id;
    }
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
    public function getCorreo()
    {
      return $this->correo;
    }
    public function getNombreUsu()
    {
      return $this->nombreUsu;
    }
    public function getTipoUsu()
    {
      return $this->tipoUsu;
    }
    public function getClave()
    {
      return $this->clave;
    }

    public function setNombreUsu($nombreUsu)
    {
      $this->nombreUsu = $nombreUsu;
    }

    public function setClave($clave)
    {
      $this->clave = $clave;
    }
    public function setId($id)
    {
      $this->id = $id;
    }

    public function consultarId()
    {
      $sql = "SELECT id FROM usuario WHERE nombreusu = '" .$this->nombreUsu ."'";
      $usu = $this->prepare($sql);
      $usu->execute();
      $user = $usu->fetch(PDO::FETCH_ASSOC);
      $this->id = $user['id'];

    }

    public function consultar()
    {
      $sql = "SELECT * FROM usuario WHERE nombreusu = :nombreusu OR id = :id";
      $usu = $this->prepare($sql);
      $usu->execute([':nombreusu' => $this->nombreUsu, ':id' => $this->id]);
      $usuario = $usu->fetch(PDO::FETCH_ASSOC);
      $this->id = $usuario['id'];
      $this->nombres = $usuario['nombres'];
      $this->apellidos = $usuario['apellidos'];
      $this->cedula = $usuario['cedula'];
      $this->correo = $usuario['correo'];
      $this->nombreUsu = $usuario['nombreusu'];
      $this->tipoUsu = $usuario['tipousu'];
      $this->clave = $usuario['clave'];
      return $usuario;
    }

    public function consultas($condicion = NULL)
    {
      $sql = "SELECT * FROM usuario ".$condicion;
      $usu = $this->prepare($sql);
      $usu->execute();
      $usuarios = $usu->fetchAll(PDO::FETCH_ASSOC);
      return $usuarios;
    }

    public function setUsuario($nombres, $apellidos, $cedula, $correo, $nombreUsu, $tipoUsu, $clave)
    {
      $this->nombres = $nombres;
      $this->apellidos = $apellidos;
      $this->cedula = $cedula;
      $this->correo = $correo;
      $this->nombreUsu = $nombreUsu;
      $this->tipoUsu = $tipoUsu;
      $this->clave = $clave;
    }

    public function login()
    {
      $sql = "SELECT nombreusu, clave, tipousu FROM usuario WHERE nombreusu = '" .$this->nombreUsu ."'";
      try
      {
        $sentencia = $this->prepare($sql);
        $sentencia->execute();
        $user = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        foreach ($user as $usuario)
        {
        }
        if (isset($usuario))
        {
          if ($usuario['clave'] == $this->clave)
          {
            $_SESSION['login'] = $usuario['nombreusu'];
            $_SESSION['level'] = $usuario['tipousu'];
            return 1;
          }
          else
          {
            unset($_SESSION['login']);
            unset($_SESSION['level']);
            return 2;
          }
        }
        else
        {
          unset($_SESSION['login']);
          unset($_SESSION['level']);
          return 3;
        }
      }
      catch (Exception $e)
      {
        echo "Error: " .$e->getMessage() .". Line: " .$e->getLine() .". File: " .$e->getFile();
      }

    }

    public function registrar()
    {
      $sql = "INSERT INTO usuario(nombres, apellidos, cedula, correo, nombreusu, tipoUsu,
        clave) VALUES(:nombres, :apellidos, :cedula, :correo, :nombreusu, :tipoUsu, :clave)";
      $insert = $this->prepare($sql);
      $resultado = $insert->execute(array(':nombres' => $this->nombres, ':apellidos' =>$this->apellidos,
      ':cedula' => $this->cedula, ':correo' => $this->correo, ':nombreusu' => $this->nombreUsu,
      ':tipoUsu' => $this->tipoUsu, ':clave' => $this->clave));
      return $resultado;
    }

    public function modificar()
    {
      $sql = "UPDATE usuario SET nombres = :nombres, apellidos = :apellidos, cedula = :cedula,
      correo = :correo, nombreusu = :nombreusu, tipoUsu = :tipoUsu, clave = :clave WHERE id = :id";
      $update = $this->prepare($sql);
      $resultado = $update->execute(array(':nombres' => $this->nombres, ':apellidos' => $this->apellidos,
      ':cedula' => $this->cedula, ':correo' => $this->correo, ':nombreusu' => $this->nombreUsu,
      ':tipoUsu' => $this->tipoUsu, ':clave' => $this->clave, ':id' => $this->id));
      return $resultado;
    }

    public function eliminar()
    {
      $sql = "DELETE FROM usuario WHERE id = :id";
      $delete = $this->prepare($sql);
      $resultado = $delete->execute(array(':id' => $this->id));
      return $resultado;
    }

    public function revisarClave()
    {
      $sql = "SELECT * FROM usuario WHERE nombreusu = '" .$this->nombreUsu ."'";
      $select = $this->prepare($sql);
      $select->execute();
      $user = $select->fetchAll(PDO::FETCH_ASSOC);
      foreach ($user as $usuario) {
        if ($usuario['clave'] == $this->clave) {
          return true;
        }
        else {
          return false;
        }
      }
    }
  }

 ?>
