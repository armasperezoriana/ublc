(function() {

  function generarSelect(valor, condicion = null, select)
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
          select.innerHTML = xml.responseText;
        }
        else {
          select.innerHTML = "<option value=''>-Seleccionar-</option>";
        }
      }
    }
    xml.open('POST', '/ublc/controlador/ajax/buscarSelect.php', true);
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send(post);
  }

  function conseguirIdPat(nombre)
  {
    var post = "table=patologia&nombre="+nombre;
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
        if (xml.responseText != "") {
          var h3 = document.createElement("h3");//Subtitulo
          h3.innerText = nombre;
          seleccionesPat.appendChild(h3);
          var hidden = document.createElement("input");//Valor oculto, id
          hidden.type = "hidden";
          hidden.name = "patologias[]";
          hidden.value = xml.responseText;
          seleccionesPat.appendChild(hidden);
        }
      }
    }
    xml.open('POST', '/ublc/controlador/ajax/buscarIdPatMed.php', true);
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send(post);
  }
  function conseguirIdMed(nombre)
  {
    var post = "table=medicamento&nombre="+nombre;
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
        if (xml.responseText != "") {
          var h3 = document.createElement("h3");//Subtitulo
          h3.innerText = nombre;
          seleccionesMed.appendChild(h3);
          var hidden = document.createElement("input");//Valor oculto
          hidden.type = "hidden";
          hidden.name = "medicamentos[]";
          hidden.value = xml.responseText;
          seleccionesMed.appendChild(hidden);
        }
      }
    }
    xml.open('POST', '/ublc/controlador/ajax/buscarIdPatMed.php', true);
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send(post);
  }

  var formulario = document.getElementById("formulario");
  var seleccionesPat = document.getElementsByClassName("seleccionesPat")[0];
  var seleccionesMed = document.getElementsByClassName("seleccionesMed")[0];
  var limpiar = document.getElementsByName("limpiar")[0];
  generarSelect("patologia", null, formulario.seleccionPat);
  generarSelect("medicamento", null, formulario.seleccionMed);
  formulario.incluirPat.onclick = function() {
    var opcionesPat = seleccionesPat.getElementsByTagName("h3");
    if (opcionesPat != null) {
      var error = false;
      for (var i = 0; i < opcionesPat.length; i++) {
        if (opcionesPat[i].innerText == formulario.seleccionPat.value) {
          error = true;
        }
      }
      if (!error) {
        conseguirIdPat(formulario.seleccionPat.value);
      }
      else {
        alert("La Patología "+formulario.seleccionPat.value+" ya está seleccionada");
      }
    }
    else {
      conseguirIdPat(formulario.seleccionPat.value);
    }
  }
  formulario.incluirMed.onclick = function() {
    var opcionesMed = seleccionesMed.getElementsByTagName("h3");
    if (opcionesMed != null) {
      var error = false;
      for (var i = 0; i < opcionesMed.length; i++) {
        if (opcionesMed[i].innerText == formulario.seleccionMed.value) {
          error = true;
        }
      }
      if (!error) {
        conseguirIdMed(formulario.seleccionMed.value);
      }
      else {
        alert("El Medicamento "+formulario.seleccionMed.value+" ya está seleccionado");
      }
    }
    else {
      conseguirIdMed(formulario.seleccionMed.value);
    }
  }

  formulario.buscarPat.onkeyup = function() {
    if (this.value.length > 2) {
      generarSelect("patologia", this.value, formulario.seleccionPat);
    }
    if (this.value.length == 0) {
      generarSelect("patologia", null, formulario.seleccionPat);
    }
  }
  formulario.buscarMed.onkeyup = function() {
    if (this.value.length > 2) {
      generarSelect("medicamento", this.value, formulario.seleccionMed);
    }
    if (this.value.length == 0) {
      generarSelect("medicamento", null, formulario.seleccionMed);
    }
  }

  seleccionesPat.onmouseover = function() {
    var opciones = this.getElementsByTagName("h3");
    for (var i = 0; i < opciones.length; i++) {
      opciones[i].onclick = function() {
        this.nextElementSibling.remove();
        this.remove();
      }
    }
  }
  seleccionesMed.onmouseover = function() {
    var opciones = this.getElementsByTagName("h3");
    for (var i = 0; i < opciones.length; i++) {
      opciones[i].onclick = function() {
        this.nextElementSibling.remove();
        this.remove();
      }
    }
  }
  limpiar.onclick = function() {
    var confirmar = confirm("¿Desea limpiar todo el formulario?");
    if (confirmar) {
      seleccionesPat.innerHTML = "<h2 class='subtitulo'>Patologías:</h2>";
      seleccionesMed.innerHTML = "<h2 class='subtitulo'>Medicamentos:</h2>";
    }
  }

  //Mensaje
  function desvanecer()
  {
    function opacar()
    {
      if (i == 7)
      {
        clearInterval(intervalOpacar);
        quitar();
        i = 0;
        return 0;
      }
      mensaje.style.opacity = intervalos[i];
      i++;
    }
    var i = 0;
    var intervalos = [0.8, 0.7, 0.65, 0.5, 0.45, 0.4, 0.35];
    intervalOpacar = setInterval(opacar, 400);//TIEMPO QUE DURA EL DESVANECIMIENTO
  }

  function quitar()
  {
    mensaje.style.display = "none";
    mensaje.innerHTML = "";
  }

  function permanecer()
  {
    clearInterval(intervalOpacar);
    clearTimeout(timeDesvanecer);
    mensaje.style.opacity = 1;
    mensaje.style.background = "#4AAF88";
  }

  function restablecer()
  {
    mensaje.style.background = "#63909A";
    timeDesvanecer = setTimeout(desvanecer, 5000);
  }
  var mensaje = document.getElementById("mensaje");
  mensaje.addEventListener("mouseover", permanecer);
  mensaje.addEventListener("mouseout", restablecer);
  var timeQuitar, timeDesvanecer, intervalOpacar, timeMostrar;
  timeDesvanecer = setTimeout(desvanecer, 5000);

}())
