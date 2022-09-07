
	function alerta()
	{
		var xml;
		if (window.XMLHttpRequest)
		{
			xml = new XMLHttpRequest();
		}
		else
		{
			xml = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xml.onreadystatechange = function()
		{
			if (xml.readyState === 4 && xml.status === 200)
			{
				if (xml.responseText != "")
				{
					notificacion.innerHTML += xml.responseText;//SE MOSTRARA EL RESULTADO DEL CONTROLADOR NOTIFICAR
					notificacion.style.display = "block";
					notificacion.style.opacity = 1;//para que no sea transparente
					timeDesvanecer = setTimeout(desvanecer, 10000);//TIEMPO EN EL QUE DURA LA NOTIFICACION
				}

			}

		}
		/* // HACK: Al usar Ajax para ejecutar otro archivo, por ejemplo .PHP, este último se ejecuta desde
			su ubicación y llama a los enlaces desde ésta y no desde el archivo que hizo la llamada
			o invocacion, es decir, desde la dirección del Ajax*/
		xml.open('POST', '/ublc/controlador/ajax/notificar.php', true);
		xml.send();

	}

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
			notificacion.style.opacity = intervalos[i];
			console.log("Mira: " + intervalos[i]);
			i++;
		}
		var i = 0;
		var intervalos = [0.8, 0.7, 0.65, 0.5, 0.45, 0.4, 0.35];
		intervalOpacar = setInterval(opacar, 400);//TIEMPO QUE DURA EL DESVANECIMIENTO
	}

	function quitar()
	{
		notificacion.style.display = "none";
		notificacion.innerHTML = "";
		timeMostrar = setTimeout(alerta, 60000);//UNMINUTO PARA QUE VUELVA APRECER LA NOTIFICACION
	}

	function permanecer()
	{
		clearInterval(intervalOpacar);
		clearTimeout(timeDesvanecer);
		notificacion.style.opacity = 1;
		notificacion.style.background = "#42A5F5";
		for (var i = 0; i < notas.length; i++)
		{
			notas[i].style.background = "#226AFF";
			notas[i].style.color = "#ffffff";
		}
	}

	function restablecer()
	{
		notificacion.style.background = "#226AFF";
		for (var i = 0; i < notas.length; i++)
		{
			notas[i].style.background = "#42A5F5";
			notas[i].style.color = "#000000";
		}
		timeDesvanecer = setTimeout(desvanecer, 5000);
	}

	var notificacion  = document.getElementById('notificacion');
	var notas = notificacion.getElementsByTagName('p');
	var notificaciones = document.getElementById('notificaciones');
	notificaciones.addEventListener("mouseover", permanecer);
	notificaciones.addEventListener("mouseout", restablecer);
	var timeQuitar, timeDesvanecer, interval, intervalOpacar, timeMostrar;
	timeMostrar = setTimeout(alerta, 3000);
