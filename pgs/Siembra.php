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

    
    <div class="container">
        <div class="msgbox"></div>
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
                <label for="">No. Estanque:</label>
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
                <label for="">Capacidad Agua:</label>
                <input 
                    type="text" 
                    class="Txt100 TxtNumb"
                    id="txt_LitrosAgua"
                    placeholder="Litros" 
                    name="txt_LitrosAgua" 
                    onkeypress="return esNumero(event, this.id);"
                    required 
                />litros
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
                />unidades

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
                /> gm
            </div>

            <button id="btnGuardar" class="button"><i class="far fa-save"></i> Guardar</button>
        </div>
    </div>


    <script>
        window.onload=function(){
            FechaActual();
            HoraActual();
        }

        $(document).on('click', '.cancelbtn', function() {
            window.location='Menu_Registro.php';
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