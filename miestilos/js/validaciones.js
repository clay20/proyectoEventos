





function validarNombre(nombre)
{
	//Patrón para el nombre
	var patron=/^([A-Za-záéíóúÁÉÍÓÚ]{2,12}\s){1,9}([A-Za-záéíóúÁÉÍÓÚ]){3,12}$/;
	var resultado = patron.test(nombre.value);
	if (!resultado)
	{
		alert("El nombre completo no es válido");
		nombre.focus();
	}
	return resultado;

}

function email(email)
{
	//Patrón para el email
	var patron=/^\w+([\.-]?\w+)*@\w+(\.\w{2,4})+$/;
	var resultado = patron.test(email.value);
	if (!resultado)
	{
		alert("El correo electrónico no es válido");
		email.focus();
	}
	return resultado;
}

function soloLetras(e)
{
	var codigoCar=e.keyCode;	
	var letra=String.fromCharCode(codigoCar);
	var caracteresPermitidos=/[A-Za-záéíóúÁÉÍÓÚñÑ]/;
	var caracteresEspeciales=[8,9,13,14,15,];
	if (caracteresEspeciales.indexOf(codigoCar)==-1)
		return (caracteresPermitidos.test(letra));
	else
		return true;
}





function soloLetrasEspacio(e)
{
	var codigoCar=e.keyCode;	
	var letra=String.fromCharCode(codigoCar);
	var caracteresPermitidos=/[A-Za-záéíóúÁÉÍÓÚñÑ\s]/;
	var caracteresEspeciales=[8,9,13,14,15,];
	if (caracteresEspeciales.indexOf(codigoCar)==-1)
		return (caracteresPermitidos.test(letra));
	else
		return true;
}


function soloNumero(e)
{
	var codigoCar=e.keyCode;	
	var letra=String.fromCharCode(codigoCar);
	var caracteresPermitidos=/[0-9]/;
	var caracteresEspeciales=[];
	if (caracteresEspeciales.indexOf(codigoCar)==-1)
		return (caracteresPermitidos.test(letra));
	else
		return true;
}
function soloNumeroPunto(e)
{
	var codigoCar=e.keyCode;	
	var letra=String.fromCharCode(codigoCar);
	var caracteresPermitidos=/[0-9]/;
	var caracteresEspeciales=[];
	if (caracteresEspeciales.indexOf(codigoCar)==-1)
		return (caracteresPermitidos.test(letra));
	else
		return true;
}




function LetrasNumero(e)
{
	var codigoCar=e.keyCode;	
	var letra=String.fromCharCode(codigoCar);
	var caracteresPermitidos=/[0-9A-Za-zñ]/;
	var caracteresEspeciales=[8,9,13,14,15,32];
	if (caracteresEspeciales.indexOf(codigoCar)==-1){
		return (caracteresPermitidos.test(letra));
	}
	else{
		return true;
	}

}


//validacione n impubos prueba

