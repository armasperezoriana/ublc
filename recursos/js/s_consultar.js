(function()
{

  window.onload = function()
  {
    var botonBuscar;
    botonBuscar = document.getElementById("botonBuscar");
    botonBuscar.onclick = buscando;
    var consultando = document.getElementById("consultando");
    if (document.getElementById("consultar") != null) {
      var botonConsultar = document.getElementById("consultar");
      botonConsultar.onclick = function() {
        consultando.action = "consultando";
        consultando.submit();
      }
    }
    if (document.getElementById("modificar") != null) {
      var botonModificar = document.getElementById("modificar");
      botonModificar.onclick = function() {
        consultando.action = "modificando";
        consultando.submit();
      }
    }
    if (document.getElementById("eliminar") != null) {
      var botonEliminar = document.getElementById("eliminar");
      eliminar = document.getElementById("si");
      negar = document.getElementById("no");
      confirmar = document.getElementById("confirmar");
      formulario = document.getElementById("elimina");
      botonEliminar.onclick = function() {
        confirmar.style.display = "flex";
      }
      eliminar.onclick = function() {
        formulario.submit();        
      }
      negar.onclick = function() {
        confirmar.style.display = "none";
      }
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


}())
