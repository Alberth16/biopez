<?php
    include "../incl/EstadoUser.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siembra</title>
    <?php include "../incl/links.php"?>
    
</head>
<body class="cuerpo">

    <div class="oculto">
    <?php include "../incl/header.php"?>
    </div>

    <div class="container">
        <div id="msgbox"></div>
        <h3>Siembra</h3>
        <div class="form">
        
            <div class="txts">
                <label for="">Fecha de Siembra:</label>
                <input 
                    type="text"
                    class="Txt100"
                    id="datepicker"
                    required
                />	
            </div>

            <div class="txts">
                <label for="">Nombre de Estanque:</label>
                <input 
                    type="text" 
                    class="Txt100" 
                    id="txt_Estanque" 
                    placeholder="Estanque" 
                    name="txt_Estanque" 
                    required
                />
            </div>

            <div class="txts">
                <label for="">Especimen:</label>
                <select class="select_" id="noEspecie"></select>
            </div>

            <div class="txts">
                <label for="">Capacidad Agua:</label>
                <input 
                    type="text" 
                    class="Txt100 TxtNumb"
                    id="txt_LitrosAgua"
                    placeholder="Litros" 
                    name="txt_LitrosAgua" 
                    onkeypress="return esNumero(event, this.id);"
                    required 
                /> <span>litros</span>
            </div>

            <div class="txts">
                <label for="">Cantidad Siembra:</label>
                <input 
                    type="text" 
                    class="Txt100 TxtNumb"
                    id="txt_cantidadSiembra"
                    placeholder="Cantidad" 
                    name="txt_QtySiembra" 
                    onkeypress="return esNumero(event, this.id);"
                    required 
                /> <span>unid.</span>
            </div>

            <div class="txts">
                <label for="">Tamaño Inicial Siembra:</label>
                <input 
                    type="text" 
                    class="Txt100 TxtNumb"
                    id="txt_TallaInicial"
                    placeholder="Tamaño" 
                    name="TallaInicial" 
                    onkeypress="return esNumero(event, this.id);"
                    required
                /> <span>gm</span>
            </div>

            <button id="btnGuardar" class="button"><i class="far fa-save"></i> Guardar</button>
        </div>
    </div>

    <script>
        window.onload=function(){
            FechaActual();
            HoraActual();
            llenarComboEspecie();
        }

        $(document).on('click', '.cancelbtn', function() {
            window.location='Menu_Registro.php';
        });

        $(document).on('click', '#btnGuardar', function() {
            Registrar_Datos();
            limpiar_form();
        });
        
        $(function() {
			$.datepicker.setDefaults($.datepicker.regional["es"]);
			$("#datepicker").datepicker({
				dateFormat: 'dd-M-yy'
			}).datepicker("setDate", new Date());
        });

    </script>
</body>
</html>