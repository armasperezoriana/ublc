(function()
{

  window.onload = function()
  {
    var botonBuscar, eliminar, preguntar, confirmar, negar;
    botonBuscar = document.getElementById("botonBuscar");
    eliminar = document.getElementById("si");
    negar = document.getElementById("no");
    if (document.getElementById("eliminar") != null) {
      preguntar = document.getElementById("eliminar");
      preguntar.onclick = confirmando;
    }

    negar.onclick = negando;
    confirmar = document.getElementById("confirmar");
    botonBuscar.onclick = buscando;
    eliminar.onclick = eliminando;

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

  eliminando = function()
  {
    elimina = document.getElementById("elimina");
    elimina.submit();
  }

  confirmando = function() {
    confirmar.style.display = "flex";
  }
  negando = function() {
    confirmar.style.display = "none";
  }

}())
