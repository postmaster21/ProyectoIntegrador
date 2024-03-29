var tabla;

//funcion que se ejecuta al inicio

function init()
{
	mostrarForm(false);
	listar();
}

//funcion mostrar el formulario

function mostrarForm(flag)
{
	//limpiar();
	if (flag) {
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnagregar").prop("disabled",false);
		$("#btnagregar").hide();
	}else{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").hide();
	}
}

//funcion listar

function listar()
{
	tabla = $('#tbllistado').dataTable({
		"aProcessing":true,
		"aServerSide":true,
		dom: 'Bfrtip',
		buttons: [
			'copyHtml5',
			'excelHtml5',
			'csvHtml5',
			'pdf'
		],
		"ajax":
			{
				url: '../ajax/permiso.php?op=listar',
				type: 'get',
				dataType: "json",
				error: function(e){
					console.log(e.responseText);
				}
			},
		"bDestroy": true,
		"iDisplayLength": 5,
		"order": [[ 0, "desc"]]
	}).DataTable();
}


init();