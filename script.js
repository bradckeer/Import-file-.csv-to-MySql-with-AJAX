function goSubirArvhivo(){

	var connect, form, response, result, uploadfile;

	uploadfile = document.getElementById('uploadeFile').value;
	
	if (uploadfile != 'undefined') {

			form = 'uploadfile=' + uploadfile;

			connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsfot.XMLHTTP');

			connect.onreadystatechange = function(){
				if (connect.readyState == 4 && connect.status == 200) {
					if (connect.responseText == 1) {
						result  = '<div class="alert alert-dismissible alert-success">';
						result += '<button type="button" class="close" data-dismiss="alert">×</button>';
						result += '<strong>¡Registro Completado!</strong>';
			  			result += ' - Los registros se almacenaron correctamente...';
						result += '</div>';
						__('_AJAX_FILE_').innerHTML = result;
						location.reload();
					} else {
					__('_AJAX_FILE_').innerHTML = connect.responseText;				
					}
				} else if (connect.readyState != 4) {
					result  = '<div class="alert alert-dismissible alert-info">';
					result += '<button type="button" class="close" data-dismiss="alert">×</button>';
					result += '<strong>¡Procesando!</strong>';
		  			result += ' - Enviando los datos a la Base de Datos.';
					result += '</div>';
					__('_AJAX_FILE_').innerHTML = result;
				}
			}
			connect.open('POST', 'subirFile.php?mode=subirFile', true);
			connect.setRequestHeader('Content-Type', 'multipart/form-data');
			connect.send(form);
			window.setTimeout(function(){location.reload()},2000);
	} else {

		result  = '<div class="alert alert-dismissible alert-warning">';
		result += '<button type="button" class="close" data-dismiss="alert">×</button>';
		result += '<strong>¡Atención!</strong>';
	  	result += ' - Debes subir un archivo .csv valido para completar el registro de esta operación.';
		result += '</div>';
		__('_AJAX_FILE_').innerHTML = result;

	}

}

function importFile(e){
	if(e.keyCode == 13){
		goSubirArvhivo();
	}
}
