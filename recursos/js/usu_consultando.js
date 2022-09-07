  window.onload = function() {
    var formulario = document.getElementById("formularioConsultando");
    var nombreUsu = document.getElementsByName("nombreUsuario");
    for (var i = 0; i < nombreUsu.length; i++) {
      nombreUsu[i].onclick = function() {
        formulario.nombreUsu.value = this.innerText;
        formulario.submit();
      };
    }

    //Estilos de despliege de Cajas
    var subNoti = document.getElementsByClassName('subtitulo_informacion');
    var contNoti = document.getElementsByClassName('contenidoUsuarios');
    for (var i = 0; i < subNoti.length; i++)
    {
      contNoti[i].style.display = "none";
      subNoti[i].onclick = function()
      {
        if (this.nextElementSibling.style.display == "none")
        {
          this.nextElementSibling.style.display = "grid";
          this.style.background = "#44CB86";
          this.style.color = "#000000";
        }
        else
        {
          this.nextElementSibling.style.display = "none";
          this.style.background = "#66A55F";
          this.style.color = "#ffffff";
        }
      };
    }
  }
