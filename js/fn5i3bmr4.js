
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
	objAjax("../p34hc3p/5i3bmr4.php?f/s6o%n=1", '')
	.done(function (info) {
		var datos = JSON.parse(info);
		$('#noEspecie').append('<option value="0">Especie</option>');
		for(var i in datos.data) {
			$('#noEspecie').append('<option value="'+datos.data[i].ID_Espe+'">'+datos.data[i].Especie+'</option>');
		}
	});
}

function Registrar_Datos() {
	var FechaSiembra = $('#datepicker').val();;
	var NoEstanque = $('#txt_Estanque').val();	
	var Especie = $('#noEspecie').val();
	var LitroAgua = $('#txt_LitrosAgua').val();
	var CantidadSiembra = $('#txt_cantidadSiembra').val();
	var TallaInicial = $('#txt_TallaInicial').val();
	var ID_Finca = $('#idFinca').html();
	var finca = $('#descFinca').html();
	var ID_user = $('#ID_user').html();

	data={FechaSiembra,NoEstanque,Especie, LitroAgua, CantidadSiembra, TallaInicial, ID_Finca, ID_user, finca};
	
	objAjax('../p34hc3p/5i3bmr4.php?f/s6o%n=2', data)
	.done(function (info) {
		var datos =JSON.parse(info);
		$('#msgbox').htm(datos.data[0]);
		setTimeout(function () {
			$('#msgbox').slideDown();
		}, 3000);
		
	});
}
