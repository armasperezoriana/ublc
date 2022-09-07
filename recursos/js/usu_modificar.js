(function()
{
  window.onload = function()
  {
    var enviar, limpiar, formulario;
    formulario = document.getElementById("formulario");

    formulario.enviar.onclick = enviando;
    //Validación de Teclas presionadas en los campos
    formulario.nombres.onkeypress = function()
    {
      var expresion = /^[a-záéíóú\sA-ZÁÉÍÓÚ]$/;
      validarKeyPress(expresion, event);
    };
    formulario.apellidos.onkeypress = function()
    {
      var expresion = /^[a-záéíóú\sA-ZÁÉÍÓÚ]$/;
      validarKeyPress(expresion, event);
    };
    formulario.cedula.onkeypress = function()
    {
      var expresion = /^[0-9\-]*$/;
      validarKeyPress(expresion, event);
    };

    //Validar los campos llenados
    formulario.nombres.onkeyup = function()
    {
      var expresion;
      var espacio = false;
      for (var i = 0; i < this.value.length; i++) {
        if (this.value[i] == " ") {
          espacio = true;
        }
      }
      if (espacio) {
        expresion = /^[A-ZÁÉÍÓÚ]{1}[a-záéíóú]{2,19}[\s]{1}[A-ZÁÉÍÓÚ]{1}[a-záéíóú]{2,19}$/;
      }
      else {
        expresion = /^[A-ZÁÉÍÓÚ]{1}[a-záéíóú]{2,19}$/;
      }
      var mensaje = "Los Nombres deben empezar con letra mayúscula y terminar en letra minúscula";
      validarCampo(expresion, this, mensaje);
    };
    formulario.apellidos.onkeyup = function()
    {
      var expresion;
      var espacio = false;
      for (var i = 0; i < this.value.length; i++) {
        if (this.value[i] == " ") {
          espacio = true;
        }
      }
      if (espacio) {
        expresion = /^[A-ZÁÉÍÓÚ]{1}[a-záéíóú]{2,19}[\s]{1}[A-ZÁÉÍÓÚ]{1}[a-záéíóú]{2,19}$/;
      }
      else {
        expresion = /^[A-ZÁÉÍÓÚ]{1}[a-záéíóú]{2,19}$/;
      }
      var mensaje = "Los Apellidos deben empezar con letra mayúscula y terminar en letra minúscula";
      validarCampo(expresion, this, mensaje);
    };
    formulario.cedula.onkeyup = function() {
      var expresion = /^[0-9]{7,9}$/;
      var mensaje = "Ingrese una Cédula válida";
      validarCampo(expresion, this, mensaje);
    };
    formulario.correo.onkeyup = function() {
      var expresion = /^[a-zA-Z0-9._#\-]{3,30}[@]{1}[A-Za-z]{3,15}[.]{1}[A-Za-z]{2,3}$/;
  		var mensaje = "Dirección de correo electrónico invalida <br>Ejemplo: nombre.persona@pagina.com";
      validarCampo(expresion, this, mensaje);
    };
    formulario.nombreU.onkeyup = function() {
      var expresion = /[\w\*\-\_\.\@]{8,16}/;
  		var mensaje = "El Usuario debe tener mínimo 8 caracteres, máximo 16";
      validarCampo(expresion, this, mensaje);
    };
    formulario.clave.onkeyup = function() {
      var expresion = /[\w\*\-\_\.\@]{8,16}/;
  		var mensaje = "La Clave debe tener mínimo 8 caracteres, máximo 16";
      validarCampo(expresion, this, mensaje);
    };
    formulario.claveConf.onkeyup = function() {
      if (formulario.clave.value != this.value) {//Si no se cumple la expresion muestra un mensaje de error
          if (this.nextElementSibling == null) {
            var p = document.createElement('p');
            p.innerHTML = "Las Contraseñas no coinciden";
            this.parentNode.appendChild(p);
          }
        }
      else
      {
        if (this.nextElementSibling != null) {
          this.nextElementSibling.remove();
        }
      }
    };


    //Eliminación de Usuario
    var formularioEliminar = document.getElementById("formularioEliminar");
    var alertaEliminar = document.getElementById("alertaEliminar");

    formulario.eliminar.onclick = function() {
      alertaEliminar.style.display = "flex";
    }
    formularioEliminar.regresar.onclick = function() {
      alertaEliminar.style.display = "none";
    }
    formularioEliminar.enviar.onclick = function() {
      revisarClave(formularioEliminar.usuario.value, formularioEliminar.claveConfirmar.value);
    }
    formularioEliminar.claveConfirmar.onfocus = function() {
      this.nextElementSibling.innerHTML = "";
    }
  }
  function validarKeyPress(expresion, e)
  {
    var key, tecla;
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key);
    if (!expresion.test(tecla)) {
      e.preventDefault();
    }
  }

  function validarCampo(expresion, elemento, mensaje)
  { //Evalua que el valor del campo esté correcto

    if (!expresion.test(elemento.value))
    { //Si no se cumple la expresion muestra un mensaje de error
      if (elemento.nextElementSibling == null) {
        var p = document.createElement('p');
        p.innerHTML = mensaje;
        elemento.parentNode.appendChild(p);
      }
    }
    else
    {
      if (elemento.nextElementSibling != null) {
        elemento.nextElementSibling.remove();
      }
    }
  }

  enviando = function()
  {
    if (nombreVerificar() && cedulaVerificar() && correoVerificar() && validarUsuario() && validarClave())
    {
      formulario.submit();
    }
  }
  nombreVerificar = function()
  {
    var nombres, apellidos;
    nombres = formulario.nombres.value;
    apellidos = formulario.apellidos.value;
    var validar = true;
    expresionNombres = /^[A-ZÁÉÍÓÚ]+[a-zA-ZáéíóúÁÉÍÓÚ\s]+[a-záéíóú]$/;

    if (!expresionNombres.test(nombres) || !expresionNombres.test(apellidos))
    {
      alert("Ingrese nombres y apellidos válidos \n"
        + "* Debe empezar con letra mayúscula y terminar en letra minúscula \n"
        + "* No puede contener números");
      validar = false;
    }
    if (nombres.length>50)
    {
      alert("El nombre es muy largo");
      validar = false;
    }
    if (apellidos.length>50)
    {
      alert("El apellido es muy largo");
      validar = false;
    }
    if (validar)
    {
      return true;
    }
    else
    {
      formulario.nombres.focus();
      return false;
    }
  }

  cedulaVerificar = function()
  {
    var cedula = formulario.cedula.value;
    var expresionCedula = /^[0-9]{7,10}$/;
    if (!expresionCedula.test(cedula))
    {
      alert("Ingrese una cedula válida");
      formulario.cedula.focus();
      return false;
    }
    return true;
  }

  correoVerificar = function()
  {
    var correo;
    correo = formulario.correo.value;
    expresionCorreo = /^[a-z]+[a-z0-9\#\$\*\_\-\.]+@+\w+\.+[a-z]{2,4}$/;

    if (!expresionCorreo.test(correo) || correo.length>50)
    {
      alert("Ingrese una dirección de correo electrónico valida"
      +"\n"+"Ejemplo: trabajador.01@ejemplo.com  \nNo puede tener más de 50 caracteres" );
      formulario.correo.focus();
      return false;
    }

    return true;
  }

  validarUsuario = function()
  {
    var usuario = formulario.nombreU.value;
    var expresionUsuario = /[\w\*\-\_\.\@]{8,16}/;
    var validar = true;
    if (usuario == "")
    {
        alert("El Campo Usuario no puede estar en blanco");
        validar = false;
    }
    if (!expresionUsuario.test(usuario))
    {
        alert("El Usuario: \n * Debe tener mínimo 8 caracteres, máximo 16" +
          "\n * Puede contener números, letras y caracteres especiales");
        validar = false;
    }
    if (validar)
    {
        return true;
    }
    else
    {
        formulario.nombreU.focus();
        return false;
    }
  }

  validarClave = function()
  {
    var clave = formulario.clave.value;
    var claveConf = formulario.claveConf.value;
    var expresionClave = /[\w\*\-\_\.\@]{8,16}/;
    var validar = true;
    if (clave == "")
    {
      alert("El Campo Contraseña no puede estar en blanco");
      validar = false;
    }
    if (!expresionClave.test(clave))
    {
      validar = false;
    }
    if (validar)
    {
      if (clave != claveConf)
      {
        alert("Las contraseñas no coinciden");
        formulario.claveConf.focus();
        return false;
      }
      return true;
    }
    else
    {
      alert("La Contraseña: \n * Debe tener mínimo 8 caracteres, máximo 16" +
        "\n * Puede contener letras y números y caracteres especiales \n")
      formulario.clave.focus();
      return false;
    }
  }

  function revisarClave(usuario, clave) { //Buscar en la DB el usuario para confirmar
      var post = "usuario="+usuario+"&clave="+clave;
      var xml;
      if (window.XMLHttpRequest) {
        xml = new XMLHttpRequest();
      }
      else {
        xml = new ActiveXObject('Microsoft.XMLHTTP');
      }
      xml.onreadystatechange = function() {
        if (xml.readyState === 4 && xml.status === 200) {
          var pClave = document.getElementById("mensajeClave");
          pClave.innerHTML = "";
          if (xml.responseText == "true"){
            formularioEliminar.submit();
          }
          else {
            pClave.innerHTML = "Contraseña Incorrecta";
          }
        }
      }
      xml.open('POST', '/ublc/controlador/ajax/confirmarUsuario.php', true);
      xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xml.send(post);
    }

}())
