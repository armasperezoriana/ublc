function generarSelect(valor)
{
  var post = "table=" + valor;
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
        select.innerHTML += xml.responseText;
      }
    }
  }
  xml.open('POST', '/ublc/controlador/ajax/buscarSelect.php', true);
  xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xml.send(post);
}
function revisarTipo(opcion)
{
  select.innerHTML = "";
  select.style.display = "none";

  if (opcion.value == "patologia")
  {
    select.innerHTML = "<option value='Todo'>Todas</option>";
    select.style.display = "block";
    generarSelect(opcion.value);
  }
  if (opcion.value == "medicamento")
  {
    select.innerHTML = "<option value='Todo'>Todos</option>";
    select.style.display = "block";
    generarSelect(opcion.value);
  }

}

function enviar() {
  var validar = true;
  if (formulario.tipoReporte.value=="patologia" || formulario.tipoReporte.value=="medicamento") {
    if (formulario.selectDinamico.value=="") {
      alert("Debe escoger un parámetro para buscar");
      validar = false;
      formulario.selectDinamico.focus();
    }
  }
  if (validar) {
    formulario.submit();
  }
}
//Principales
var formulario = document.getElementById('buscarReporte');
var tipoReporte = document.getElementById('tipoReporte');

var select = document.getElementById('selectDinamico');
var tiposDeReporte = tipoReporte.children;//son los tipos de reportes: General, Patología, Medicamento
tipoReporte.onchange = function() {
  revisarTipo(this);
}
var submit = document.getElementById('enviar');
submit.onclick = enviar;
