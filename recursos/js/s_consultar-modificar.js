(function()
{
  window.onload = function()
  {
    var botonBuscar;
    botonBuscar = document.getElementById("botonBuscar");
    botonBuscar.onclick = buscando;
    if (document.getElementById("modificar") != null) {
      var botonModificar = document.getElementById("modificar");
      botonModificar.onclick = modifica;
    }

    var busqueda = document.getElementById("buscar")
    busqueda.onkeypress = function()
    {
      var expresion = /^[0-9\-]*$/;
      validarKeyPress(expresion, event);
    };
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

  buscando = function()
  {
    var formulario;
    formulario = document.getElementById("buscando");
    if (buscar())
    {
      formulario.submit();
    }
  }

  buscar = function()
  {
    var busqueda = document.getElementById("buscar").value;
    var expresionCedulaBene = /^[0-9]{0,9}\-{0,1}[0-9]{0,1}$/;
    var expresionCedula = /^[0-9]{0,11}$/;
    var validar = true;
    if (busqueda == "")
    {
      alert("Ingrese una cedula");
      validar = false;
    }
    if (busqueda.length > 11)
    {
      alert("La cedula es muy larga");
      validar = false;
    }
    if (!expresionCedula.test(busqueda) && !expresionCedulaBene.test(busqueda))
    {
      alert("La cedula indicada no es válida");
      validar = false;
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

  modifica = function ()
  {
    var modificando = document.getElementById("modificando");
    modificando.submit();
  }

}())
