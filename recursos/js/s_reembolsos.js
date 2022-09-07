function revisarCedula() { //Buscar la cédula ingresada en la DB
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
      mensajeCedula.innerText = "";
      if (xml.responseText != "") {
        if (xml.responseText == "No") {
          mensajeCedula.innerText = "La cédula indicada no se encuentra registrada";
          cedulaValida = false;
        }
        if (xml.responseText != "No") {
          if (xml.responseText == "0") {
            formulario.action = "trabajador";
          }
          if (xml.responseText == "2") {
            formulario.action = "beneficiario";
          }
          cedulaValida = true;
        }

      }
    }
  }
  xml.open('POST', '/ublc/controlador/ajax/buscarCedula.php', true);
  xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xml.send(post);
}

function validar() {
  if (cedulaValida) {
    if (validarDiagnostico() && validarMonto() && validarFechaOcurrencia()  && validarFechaRecepcion()) {
      if (confirm("Alerta: Verifique que la Información sea correcta \n \n" +
      "Cédula de la Persona: "+cedula.value+"\n"+
      "Diagnóstico: "+diagnostico.value+"\n"+
      "Monto: "+monto.value+"\n"+
      "Fecha de Ocurrencia: "+fechaOcurrencia.value+"\n"+
      "Fecha de Recepción: "+fechaRecepcion.value+"\n \n"+
      "¿Desea continuar?")) {
        formulario.submit();
      }

    }
  }
  else {
    cedula.focus();
    revisarCedula();
  }
}

function validarDiagnostico() {
  if (diagnostico.value == "") {
    alert("Indique el Diagnóstico correspondiente a este reembolso");
    diagnostico.focus();
    return false;
  }
  else {
    return true;
  }
}
function validarMonto() {
  var validar = true;
  if (monto.value == "") {
    alert("Ingrese el Monto del Reembolso");
    monto.focus();
    validar = false;
  }
  if (isNaN(monto.value)) {
    alert("El campo del Monto solo puede contener números");
    monto.focus();
    validar = false;
  }
  if (validar) {
    return true;
  }
}
function validarFechaOcurrencia(){
  var validar = true;
  var dia="", mes="", year="", i;
  for (i = 0; i < 4; i++)
  {
    year = year + fechaOcurrencia.value[i];
  }
  for (i = 5; i < 7; i++)
  {
    mes = mes + fechaOcurrencia.value[i];
  }
  for (i = 8; i < 10; i++)
  {
    dia = dia + fechaOcurrencia.value[i];
  }
  if (fechaOcurrencia.value  == "")
  {
    alert("Indique la Fecha de Ocurrencia");
    validar = false;
    fechaOcurrencia.focus();
  }
  else
  {
    if (year > yearA)
    {
      alert("La Fecha de Ocurrencia no puede ser mayor a la fecha de hoy");
      validar = false;
      fechaOcurrencia.focus();
    }
    if (year == yearA && mes > mesA)
    {
      alert("La Fecha de Ocurrencia no puede ser mayor a la fecha de hoy");
      validar = false;
      fechaOcurrencia.focus();
    }
    if (year == yearA && mes == mesA && dia > diaA)
    {
      alert("La Fecha de Ocurrencia no puede ser mayor a la fecha de hoy");
      validar = false;
      fechaOcurrencia.focus();
    }
  }
  if (validar) {
    return true;
  }
}

function validarFechaRecepcion(){
  var validar = true;
  var dia="", mes="", year="", i;
  for (i = 0; i < 4; i++)
  {
    year = year + fechaRecepcion.value[i];
  }
  for (i = 5; i < 7; i++)
  {
    mes = mes + fechaRecepcion.value[i];
  }
  for (i = 8; i < 10; i++)
  {
    dia = dia + fechaRecepcion.value[i];
  }
  if (fechaRecepcion.value  == "")
  {
    alert("Indique la Fecha de Recepción");
    validar = false;
    fechaRecepcion.focus();
  }
  else
  {
    if (year > yearA)
    {
      alert("La Fecha de Recepción no puede ser mayor a la fecha de hoy");
      validar = false;
      fechaRecepcion.focus();
    }
    if (year == yearA && mes > mesA)
    {
      alert("La Fecha de Recepción no puede ser mayor a la fecha de hoy");
      validar = false;
      fechaRecepcion.focus();
    }
    if (year == yearA && mes == mesA && dia > diaA)
    {
      alert("La Fecha de Recepción no puede ser mayor a la fecha de hoy");
      validar = false;
      fechaRecepcion.focus();
    }
  }
  if (validar) {
    return true;
  }
}

var formulario, cedula, mensajeCedula, diagnostico, fechaRecepcion, fechaOcurrencia, p, enviar, cedulaValida;
formulario = document.getElementById("reembolsar");
cedula = document.getElementById("cedula");
cedula.addEventListener("blur", revisarCedula);
cedula.onclick = function () {
  mensajeCedula.innerText = "";
  cedulaValida = false;
  console.log(cedulaValida);
}
mensajeCedula = document.getElementById("mensajeCedula");
diagnostico = document.getElementById("diagnostico");
monto = document.getElementById("monto");
fechaRecepcion = document.getElementById("fechaRecepcion");
fechaOcurrencia = document.getElementById("fechaOcurrencia");
enviar = document.getElementById("enviar");
enviar.addEventListener("click", validar);
cedulaValida = false;

var fecha, yearA, monthA, dayA;
fecha = new Date();
yearA = fecha.getFullYear();
mesA = fecha.getMonth() + 1;
diaA = fecha.getDate();
