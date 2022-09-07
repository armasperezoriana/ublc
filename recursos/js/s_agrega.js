 // (function()
 // {
  window.onload = function() { //Declaraciones de variables y eventos
    var enviar, limpiar;
    var formulario;
    var formularioUno;
    formularioUno = document.getElementById("formulario");
    var cedulaPersona = false;
    revisarCedula(formularioUno.cedula);
    declararFormulario(formularioUno);
    var alertaRestaurar = document.getElementById("alertaRestaurar");
    var formularioRestaurar = document.getElementById("formularioRestaurar");
    var mensajeRestauracion = document.getElementById("mensajeRestauracion");
  }

  function declararFormulario(form) {
    //Validación de pulsación de teclas

    if (form.cedulaTitular == null) {
      form.cedula.onkeypress = function()
      {
        var expresion = /^[0-9]*$/;
        validarKeyPress(expresion, event);
      };
    }
    else {
      form.cedulaTitular.onkeypress = function()
      {
        var expresion = /^[0-9]*$/;
        validarKeyPress(expresion, event);
      };
      form.cedula.onkeypress = function()
      {
        var expresion = /^[0-9\-]*$/;
        validarKeyPress(expresion, event);
      };
    }

    form.nombres.onkeypress = function()
    {
      var expresion = /^[a-záéíóú\sA-ZÁÉÍÓÚÑñ]$/;
      validarKeyPress(expresion, event);
    };
    form.apellidos.onkeypress = function()
    {
      var expresion = /^[a-záéíóú\sA-ZÁÉÍÓÚÑñ]$/;
      validarKeyPress(expresion, event);
    };
    form.telefonoCelular.onkeypress = function()
    {
      var expresion = /^[0-9]*$/;
      validarKeyPress(expresion, event);
    };
    form.telefonoFijo.onkeypress = function()
    {
      var expresion = /^[0-9]*$/;
      validarKeyPress(expresion, event);
    };
    form.correo.onkeypress = function()
    {
      var expresion = /^[a-zA-Z.-_#0-9@\-]$/;
      validarKeyPress(expresion, event);
    };

    //Validar los campos llenados
    form.nombres.onkeyup = function()
    {
      var expresion;
      var espacio = false;
      for (var i = 0; i < this.value.length; i++) {
        if (this.value[i] == " ") {
          espacio = true;
        }
      }
      if (espacio) {
        expresion = /^[A-ZÁÉÍÓÚÑ]{1}[a-záéíóúñ]{2,19}[\s]{1}[A-ZÁÉÍÓÚÑ]{1}[a-záéíóúñ]{2,19}$/;
      }
      else {
        expresion = /^[A-ZÁÉÍÓÚÑ]{1}[a-záéíóúñ]{2,19}$/;
      }
      var mensaje = "Los Nombres deben empezar con letra mayúscula y terminar en letra minúscula";
      validarCampo(expresion, this, mensaje);
    };
    form.apellidos.onkeyup = function()
    {
      var expresion;
      var espacio = false;
      for (var i = 0; i < this.value.length; i++) {
        if (this.value[i] == " ") {
          espacio = true;
        }
      }
      if (espacio) {
        expresion = /^[A-ZÁÉÍÓÚÑ]{1}[a-záéíóúñ]{2,19}[\s]{1}[A-ZÁÉÍÓÚÑ]{1}[a-záéíóúñ]{2,19}$/;
      }
      else {
        expresion = /^[A-ZÁÉÍÓÚÑ]{1}[a-záéíóúñ]{2,19}$/;
      }
      var mensaje = "Los Apellidos deben empezar con letra mayúscula y terminar en letra minúscula";
      validarCampo(expresion, this, mensaje);
    };

    form.telefonoFijo.onkeyup = function() {
      if (this.value.length > 0) {
        var expresion = /^[0-9]{10,11}$/;
        var mensaje = "Ingrese un número de teléfono fijo válido";
        validarCampo(expresion, this, mensaje);
      }
      else {
        var expresion = /^[0-9]{0}$/;
        var mensaje = "";
        validarCampo(expresion, this, mensaje);
      }
    };
    form.telefonoCelular.onkeyup = function() {
      if (this.value.length > 0) {
        var expresion = /^[0-9]{10,11}$/;
        var mensaje = "Ingrese un número de teléfono celular válido";
        validarCampo(expresion, this, mensaje);
      }
      else {
        var expresion = /^[0-9]{0}$/;
        var mensaje = "";
        validarCampo(expresion, this, mensaje);
      }
    };
    form.correo.onkeyup = function() {
      if (this.value.length > 0) {
        var expresion = /^[a-zA-Z0-9._#\-]{3,30}[@]{1}[A-Za-z]{3,15}[.]{1}[A-Za-z]{2,3}$/;
    		var mensaje = "Dirección de correo electrónico invalida <br>Ejemplo: nombre.persona@pagina.com";
        validarCampo(expresion, this, mensaje);
      }
      else {
        var expresion = /^[\w]{0}$/;
        var mensaje = "";
        validarCampo(expresion, this, mensaje);
      }
    };

    //Validar cédulas
    form.cedula.onkeyup = function() {
      var expresion = /^[0-9]{7,9}$/;
      var mensaje = "Ingrese una Cédula válida";
      validarCampo(expresion, this, mensaje);
    };
    form.cedula.onblur = function() {
      revisarCedula(this);
      revisarCedulaRestaurar(this);
    };

    //Botones
    form.enviar.onclick = enviando;
    if (form.limpiar != null) {
      form.limpiar.onclick = limpiando;
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

  function revisarCedula(cedula) { //Buscar en la DB la cédula ingresada
    var post = "cedula=" + cedula.value;
    var xml;
    if (window.XMLHttpRequest) {
      xml = new XMLHttpRequest();
    }
    else {
      xml = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xml.onreadystatechange = function() {
      if (xml.readyState === 4 && xml.status === 200) {
        if (cedula.nextElementSibling != null) {
          cedula.nextElementSibling.remove();
        }
        if (xml.responseText != "No")
        { //Si no se cumple la expresion muestra un mensaje de error
          var p = document.createElement('p');
          var mensaje;
          if (xml.responseText == "0") {
            mensaje = "La Cédula indicada pertenece a un Titular registrado";
            cedulaPersona = false;
          }
          if (xml.responseText == "2") {
            mensaje = "La Cédula indicada pertenece a un Beneficiario registrado";
            cedulaPersona = false;
          }
          if (cedula.nextElementSibling == null) {
            p.innerHTML = mensaje;
            cedula.parentNode.appendChild(p);
          }
        }
        else {
          cedulaPersona = true;
        }
      }
    }
    xml.open('POST', '/ublc/controlador/ajax/buscarCedula.php', true);
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send(post);
  }

  function revisarCedulaTitular(cedula) { //Buscar en la DB la cédula ingresada
    var post = "cedula=" + cedula.value;
    var xml;
    if (window.XMLHttpRequest) {
      xml = new XMLHttpRequest();
    }
    else {
      xml = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xml.onreadystatechange = function() {
      if (xml.readyState === 4 && xml.status === 200) {
        if (cedula.nextElementSibling != null) {
          cedula.nextElementSibling.remove();
        }
        if (xml.responseText != "0")
        { //Si no se cumple la expresion muestra un mensaje de error
          var p = document.createElement('p');
          var mensaje;
          mensaje = "La Cédula de Titular indicada no pertenece a ningún Titular registrado";
          cedulaTitular = false;
          if (cedula.nextElementSibling == null) {
            p.innerHTML = mensaje;
            cedula.parentNode.appendChild(p);
          }
        }
        else {
          cedulaTitular = true;
        }
      }
    }
    xml.open('POST', '/ublc/controlador/ajax/buscarCedula.php', true);
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send(post);
  }

  function revisarCedulaRestaurar(cedula) { //Buscar en la DB la cédula ingresada
    var post = "cedula=" + cedula.value;
    var xml;
    if (window.XMLHttpRequest) {
      xml = new XMLHttpRequest();
    }
    else {
      xml = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xml.onreadystatechange = function() {
      if (xml.readyState === 4 && xml.status === 200) {
        if (xml.responseText != ""){ //Si no se cumple la expresion muestra un mensaje de error
          mensajeRestauracion.innerHTML = "La Cédula "+cedula.value+
           " pertenece a un Titular eliminado anteriormente<br>"+
           "Puede restaurar los datos o continuar con el registro";
          alertaRestaurar.style.display = "flex";
          formularioRestaurar.cedulaRestaurar.value = cedula.value;
          formularioRestaurar.regresar.onclick = function() {
            alertaRestaurar.style.display = "none";
          }
          formularioRestaurar.restaurar.onclick = function() {
            formularioRestaurar.submit();
          }
        }
      }
    }
    xml.open('POST', '/ublc/controlador/ajax/buscarCedulaRestaurar.php', true);
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send(post);
  }


  limpiando = function()
  {
    formulario = document.getElementById("formulario");
    formulario.reset();
  }

  enviando = function()
  {
    formulario = document.getElementById("formulario");
    if (cedulaVerificar() && cedulaPersona && nombreVerificar() && nacimientoVerificar() && sexoVerificar()
      && direccionVerificar() && telefonosVerificar() && correoVerificar() && trabajoVerificar())
    {
      formulario.submit();
    }
    if (!cedulaPersona) {
      formulario.cedula.focus();
      revisarCedula(formulario.cedula);
    }
  }

  //Validaciones de los campos
  nombreVerificar = function()
  {
    var nombres, apellidos;
    nombres = formulario.nombres.value;
    apellidos = formulario.apellidos.value;
    var validar = true;
    expresionNombres = /^[A-ZÁÉÍÓÚÑ]+[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]+[a-záéíóúñ]$/;

    if (!expresionNombres.test(nombres) || !expresionNombres.test(apellidos))
    {
      alert("Ingrese nombres y apellidos válidos \n"
        + "* Debe empezar con letra mayúscula y terminar en letra minúscula \n"
        + "* No puede contener números ni caracteres especiales");
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
    var expresionCedula = /^[0-9]{7,9}$/;
    if (!expresionCedula.test(cedula))
    {
      alert("Ingrese una cédula válida");
      formulario.cedula.focus();
      return false;
    }
    return true;
  }
  cedulaBeneVerificar = function()
  {
    var cedula = formulario.cedula.value;
    expresionCedulaBene = /^[0-9]{7,9}[\-]{0,1}[0-9]{0,1}$/;
    if (!expresionCedulaBene.test(cedula))
    {
      alert("Ingrese una cédula válida");
      formulario.cedula.focus();
      return false;
    }
    return true;
  }
  cedulaTitVerificar = function()
  {
    var cedula = formulario.cedulaTitular.value;
    var expresionCedula = /^[0-9]{7,9}$/;
    if (!expresionCedula.test(cedula))
    {
      alert("Ingrese una cédula de titular válida");
      formulario.cedulaTitular.focus();
      return false;
    }
    return true;
  }

  nacimientoVerificar = function()
  {
    var nacimiento = formulario.nacimiento.value;
    var dia="", mes="", year="", i;
    var diaActual, mesActual, yearActual, fecha;
    var validar = true;
    for (i = 0; i < 4; i++)
    {
      year = year+nacimiento[i];
    }
    for (i = 5; i < 7; i++)
    {
      mes = mes + nacimiento[i];
    }
    for (i = 8; i < 10; i++)
    {
      dia = dia + nacimiento[i];
    }
    fecha = new Date();
    diaActual = fecha.getDate();
    mesActual = fecha.getMonth() + 1;
    yearActual = fecha.getFullYear();

    if (nacimiento == "")
    {
      alert("Indique la fecha de nacimiento");
      validar = false;
    }
    else
    {
        if (year > yearActual)
        {
          alert("La Fecha ingresada no puede ser mayor a la fecha de hoy");
          validar = false;
        }
        if (year == yearActual && mes > mesActual)
        {
          alert("La Fecha ingresada no puede ser mayor a la fecha de hoy");
          validar = false;
        }
        if (year == yearActual && mes == mesActual && dia > diaActual)
        {
          alert("La Fecha ingresada no puede ser mayor a la fecha de hoy");
          validar = false;
        }
    }
    if (validar)
    {
      return true;
    }
    else
    {
      formulario.nacimiento.focus();
      return false;
    }
  }

  sexoVerificar = function()
  {
    var masculino, femenino;
    masculino = document.getElementById("hombre").checked;
    femenino = document.getElementById("mujer").checked;
    if (!masculino && !femenino)
    {
      alert("Indique un sexo");
      document.getElementById("mujer").focus();
      return false;
    }
    return true;
  }
  sexoVerificarBene = function()
  {
    var masculino, femenino;
    masculino = document.getElementById("hombreBene").checked;
    femenino = document.getElementById("mujerBene").checked;
    if (!masculino && !femenino)
    {
      alert("Indique un sexo");
      document.getElementById("mujerBene").focus();
      return false;
    }
    return true;
  }

  direccionVerificar = function() {
    var direccion = formulario.direccion.value;
    if (direccion.length > 100) {
      alert("La Dirección no puede contener más de 100 caracteres");
      formulario.direccion.focus();
      return false;
    }
    else {
      return true;
    }
  }

  telefonosVerificar = function()
  {
    var telefonoFijo, telefonoCelular;
    telefonoFijo = formulario.telefonoFijo.value;
    telefonoCelular = formulario.telefonoCelular.value;
    var validar = true;
    if (isNaN(telefonoFijo) || isNaN(telefonoCelular))
    {
      alert("Los teléfonos deben ser números");
      validar = false
    }
    if (telefonoFijo != "") {
      if (telefonoFijo.length < 10 || telefonoFijo.length > 11)
      {
        alert("El telefono fijo debe tener 10 o 11 caracteres");
        validar = false;
      }
    }
    if (telefonoCelular != "") {
      if (telefonoCelular.length < 10 || telefonoCelular.length > 11)
      {
        alert("El telefono celular debe tener 10 o 11 caracteres");
        validar = false;
      }
    }
    if (validar)
    {
        return true;
    }
    else
    {
      formulario.telefonoFijo.focus();
      return false;
    }
  }

  correoVerificar = function()
  {
    var correo;
    correo = formulario.correo.value;
    expresionCorreo = /^[a-zA-Z0-9._#\-]{3,30}[@]{1}[A-Za-z]{3,15}[.]{1}[A-Za-z]{2,3}$/;
    if (correo != "") {
      if (!expresionCorreo.test(correo) || correo.length>50)
      {
        alert("Ingrese una dirección de correo electrónico válida"
        +"\n"+"Ejemplo: trabajador.01@ejemplo.com  \nNo puede tener más de 50 caracteres" );
        formulario.correo.focus();
        return false;
      }
    }

    return true;
  }

  trabajoVerificar = function()
  {
    var tipoTrabajador, estTrabajo, fechaIngreso;
    var validar = true;
    tipoTrabajador = formulario.tipoTrabajador.value;
    estTrabajo = formulario.estTrabajo.value;
    fechaIngreso = formulario.fechaIngreso.value;
    var dia="", mes="", year="", i;
    var diaActual, mesActual, yearActual, fecha;
    for (i = 0; i < 4; i++)
    {
      year = year+fechaIngreso[i];
    }
    for (i = 5; i < 7; i++)
    {
      mes = mes + fechaIngreso[i];
    }
    for (i = 8; i < 10; i++)
    {
      dia = dia + fechaIngreso[i];
    }
    fecha = new Date();
    diaActual = fecha.getDate();
    mesActual = fecha.getMonth() + 1;
    yearActual = fecha.getFullYear();
    if (tipoTrabajador == "" || estTrabajo == "")
    {
      alert("Seleccione el tipo de trabajo y estado del trabajo");
      formulario.tipoTrabajador.focus();
      return false;
    }
    if (fechaIngreso  == "")
    {
      alert("Indique la fecha de ingreso de trabajo");
      validar = false;
      formulario.fechaIngreso.focus();
    }
    else
    {
      if (year > yearActual)
      {
        alert("La Fecha ingresada no puede ser mayor a la fecha de hoy");
        validar = false;
        formulario.fechaIngreso.focus();
      }
      if (year == yearActual && mes > mesActual)
      {
        alert("La Fecha ingresada no puede ser mayor a la fecha de hoy");
        validar = false;
        formulario.fechaIngreso.focus();
      }
      if (year == yearActual && mes == mesActual && dia > diaActual)
      {
        alert("La Fecha ingresada no puede ser mayor a la fecha de hoy");
        validar = false;
        formulario.fechaIngreso.focus();
      }

    }
    if (validar)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
// }())
