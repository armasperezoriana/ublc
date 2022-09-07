(function(){
  //Funciones
  function generarSelect(valor, condicion = null)
  {
    var post = "table=" + valor;
    if (condicion != null) {
      post += "&condicion="+condicion;
    }
    var xml;
    if (window.XMLHttpRequest)
    {
      xml = new XMLHttpRequest();
    }
    else
    {
      xml = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xml.onreadystatechange = function()
    {
      if (xml.readyState === 4 && xml.status === 200)
      {
        if (xml.responseText != "")
        {
          formulario.seleccion.innerHTML = xml.responseText;
        }
        else {
          formulario.seleccion.innerHTML = "<option value=''>-Seleccionar-</option>";
          formulario.seleccion.value = "";
          botones.style.display = "none";
        }
      }
    }
    xml.open('POST', '/ublc/controlador/ajax/buscarSelect.php', true);
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send(post);
  }

  function conseguirId(tabla, nombre)
  {
    var post = "table="+tabla+"&nombre="+nombre;
    var xml;
    var resultado;
    if (window.XMLHttpRequest)
    {
      xml = new XMLHttpRequest();
    }
    else
    {
      xml = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xml.onreadystatechange = function()
    {
      if (xml.readyState === 4 && xml.status === 200)
      {
        formulario.id.value = xml.responseText;
      }
    }
    xml.open('POST', '/ublc/controlador/ajax/buscarIdPatMed.php', true);
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send(post);
  }
  function inicializarSelect(select) {
    select.onmouseout = function() {
      if (this.value != "") {
        botones.style.display = "flex";
        conseguirId(formulario.tabla.value, this.value);
      }
      else {
        botones.style.display = "none";
      }
    }

  }
  //Declaraciones Principales
  var formulario = document.getElementById("formulario");
  var botones = document.getElementsByClassName("botones")[0];
  generarSelect(formulario.tabla.value);
  inicializarSelect(formulario.seleccion);
  formulario.busqueda.onkeyup = function() {
    if (this.value.length > 2) {
      generarSelect(formulario.tabla.value, this.value);
    }
    if (this.value.length == 0) {
      generarSelect(formulario.tabla.value);
    }
  }
  var registrar = document.getElementById("registrar");//Botones del CRUD
  var modificar = document.getElementById("modificar");
  var eliminar = document.getElementById("eliminar");

  var registra = document.getElementsByClassName("registra")[0];//Proceso para registrar
  var formRegistrar = document.getElementById("formRegistrar");
  registrar.onclick = function() {
    var nombre = formRegistrar.nombre;
    registra.style.display = "flex";
    var atras = document.getElementById("atrasRegistrar");
    atras.onclick = function() {
      registra.style.display = "none";
    }
    var registralo = document.getElementById("registralo");
    registralo.onclick = function() {
      var expresion = /^[A-ZÁÉÍÓÚ]{1}[a-zA-Z\sáéíóúÁÉÍÓÚ]{1,24}$/;
      if (!expresion.test(nombre.value)) {
        alert("Debe tener más de un caracter y menos de 25, empezar con mayúscula y no poseer números");
      }
      else {
        formRegistrar.submit();
      }
    }
  }
  var modifica = document.getElementsByClassName("modifica")[0];//Proceso para modificar
  var formModificar = document.getElementById("formModificar");
  modificar.onclick = function() {
    var nombre = formModificar.nombre;
    nombre.value = formulario.seleccion.value;
    formModificar.id.value = formulario.id.value;
    modifica.style.display = "flex";
    var atras = document.getElementById("atrasModificar");
    atras.onclick = function() {
      modifica.style.display = "none";
    }
    var modificalo = document.getElementById("modificalo");
    modificalo.onclick = function() {
      var expresion = /^[A-ZÁÉÍÓÚ]{1}[a-zA-Z\sáéíóúÁÉÍÓÚ]{1,24}$/;
      if (!expresion.test(nombre.value)) {
        alert("Debe tener más de un caracter y menos de 25, empezar con mayúscula y no poseer números");
      }
      else {
        if (formModificar.id.value != "") {
          formModificar.submit();
        }
      }
    }
  }

  var elimina = document.getElementsByClassName("elimina")[0];//Proceso para modificar
  var formEliminar = document.getElementById("formEliminar");
  eliminar.onclick = function() {
    var nombre = formEliminar.nombre;
    nombre.value = formulario.seleccion.value;
    formEliminar.id.value = formulario.id.value;
    elimina.style.display = "flex";
    var atras = document.getElementById("atrasEliminar");
    atras.onclick = function() {
      elimina.style.display = "none";
    }
    var eliminalo = document.getElementById("eliminalo");
    eliminalo.onclick = function() {
      var expresion = /^[A-ZÁÉÍÓÚ]{1}[a-zA-Z\sáéíóúÁÉÍÓÚ]{1,24}$/;
      if (formEliminar.id.value != "") {
        formEliminar.submit();
      }
    }
  }

}())
