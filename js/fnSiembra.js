
/* Limpiar Formulario */
function limpiar_form() {
	$('#txt_cantidadSiembra').val('');
	$('#txt_TallaInicial').val('');
	$('#txt_LitrosAgua').val('');
	$('#noEspecie').val(0);
	$('#txt_Estanque').val('');
	$("#datepicker").datepicker({
		dateFormat: 'dd-M-yy'
	}).datepicker("setDate", new Date());
	$('#txt_Estanque').focus();
}

function llenarComboEspecie() {
	objAjax("../php/watch.php?f/s6o%n=1", '')
	.done(function (info) {
		var datos = JSON.parse(info);
		$('#noEspecie').append('<option value="0">Especie</option>');
		for(var i in datos.data) {
			$('#noEspecie').append('<option value="'+datos.data[i].ID_Espe+'">'+datos.data[i].Especie+'</option>');
		}
	});
}

function CargarLista() {
	var buscador = $('#buscador').val();
	var data = { "buscador": buscador };
	objAjax("filePHP/fnClientes.php?f/s6o%n=1", data)
	.done(function (info) {
		$('#tabla_lista_registros').html(info);
	});
}


function LLenarDatos(ID) {
	var NumID = $(ID).attr("id");
	$('#registrar').text('');
	$('#registrar').append('Actualzar Cliente <i class="fa fa-fw fa-edit"></i>');
	$('#formulario').html("R");

	var data = { NumID };
	objAjax("filePHP/fnClientes.php?f/s6o%n=2", data)
	.done(function (info) {
		var datos = JSON.parse(info);

		$('#form_Registro_Datos').slideDown();
		$('#ID').html(datos.data[0].idcliente);
		$('#RTN').val(datos.data[0].RTN);
		$('#correoCliente').val(datos.data[0].correo);
		$('#NombreCliente').val(datos.data[0].nombre);
		$('#telefonoCliente').val(datos.data[0].telefono);
		$('#direccion').val(datos.data[0].direccion);

		$('.listado_registros').slideUp();
	});
}


function Registrar_Datos() {
	var vID = $('#ID').html();;
	var vRTN = $('#RTN').val();	
	var vcorreoCliente = $('#correoCliente').val();
	var vNombreCliente = $('#NombreCliente').val();
	var vtelefonoCliente = $('#telefonoCliente').val();
	var vdireccion = $('#direccion').val();
		if (vNombreCliente == "") {
			Alerta("Ingrese nombre del Cliente", 2);
			$('#nombre').focus();
			return;
		} else {
			if (vtelefonoCliente == "") {
				Alerta("Ingrese el telefono del Cliente", 2);
				$('#correo').focus();
				return;
			} else {
				if (vdireccion == "") {
					Alerta("Ingrese la diereccion del Cliente", 2);
					$('#clave').focus();
					return;
				}else{
					var data = {};
					Indicador = $('#formulario').html();
					var ruta = "";
					if (Indicador == "N") {
						ruta = "filePHP/fnClientes.php?f/s6o%n=3";
						data = {"vRTN":vRTN, "vcorreoCliente": vcorreoCliente, "vNombreCliente": vNombreCliente, "vtelefonoCliente": vtelefonoCliente, "vdireccion": vdireccion };
					} else {
						ruta = "filePHP/fnClientes.php?f/s6o%n=4";
						data = { "vID": vID, "vRTN":vRTN, "vNombreCliente": vNombreCliente, "vcorreoCliente": vcorreoCliente, "vtelefonoCliente": vtelefonoCliente, "vdireccion": vdireccion };
						$('#formulario').html('N');
					}

					objAjax(ruta, data)
						.done(function (info) {
							var datos =JSON.parse(info);

							var resu = Alerta(datos.data[0], datos.data[1]);

							if (resu == '1') {
								setTimeout(function () {
									limpiar_form();
									$('#form_Registro_Datos').slideUp();
									$('.listado_registros').slideDown('slow');
								}, 3000);
								CargarLista();
							}
						});
					}
				}
			}
	}


function eliminarUsuario() {
	var vID = $('#ID').html();

	var data = { "vID": vID };
	objAjax("filePHP/fnClientes.php?f/s6o%n=5", data)
		.done(function (info) {
			var datos = JSON.parse(info);
			Alerta(datos.data[0], 2);
		});
}

function Marcar_eliminarRegistro(ID) {
	ActivarPg("Si");
	$('#msgconfirmacion').slideDown();
	let NumID = $(ID).attr('id');
	$('#ID').html(NumID);

	var data = { NumID };
	objAjax("filePHP/fnClientes.php?f/s6o%n=2", data)
		.done(function (info) {
			var datos = JSON.parse(info);
			$('#mensaje').html('Eliminara el Cliente: <strong>' + datos.data[0].nombre + '</strong>, <br/>Presione <strong>Si</strong> para continuar, <strong>No</strong> para cancelar');
		});
}



/********************************************************************************************************** */
