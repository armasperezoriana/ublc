(function()
{

  window.onload = function()
  {
    var formulario, enviar;
    formulario = document.getElementsByName("formulario");
    ingresar = document.getElementById("ingresar");
    ingresar.onclick = ingresando;
  }

  ingresando = function()
  {
    if (validarUsuario() && validarClave())
    {
      formulario.submit();
    }
  }

  validarUsuario = function()
  {
    var usuario = formulario.usuario.value;
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
        formulario.usuario.focus();
        return false;
    }
  }

  validarClave = function()
  {
    var clave = formulario.clave.value;
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
      return true;
    }
    else
    {
      alert("La Contraseña: \n * Debe tener mínimo 8 caracteres, máximo 16" +
        "\n * Puede contener letra, números y caracteres especiales \n")
      formulario.clave.focus();
      return false;
    }
  }

}())
