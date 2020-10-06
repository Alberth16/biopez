<?php
    include "../incl/EstadoUser.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>
    <?php include "../incl/links.php"?>
</head>
<body class="cuerpo">
    
    
    <div class="container">
        <div class="msgbox"></div>
        <h3>Consumos de Suministros</h3>
        <div class="form">
        
            <div class="txts">
                <div class="Boton_Div">Energia Electrica:</div>

                <div class="ocultos" id="Energia">

                    <div class="txts" id="Lec_Anteriror">
                        <div class="txtInline">
                            <label for="">Fecha anterior:</label>
                            <input 
                                type="text" 
                                class="Txt100"
                                id="txt_fecha_Ant"
                                placeholder="fecha Ant."
                                disabled
                                required
                            />
                        </div>
                        <div class="txtInline">
                            <label for="">Lectura anterior:</label> 
                            <input 
                                type="text" 
                                class="Txt100 TxtNumb"
                                id="txt_Lectura_Ant"
                                placeholder="Lectura Amt."
                                onkeypress="return esNumero(event, this.id);"
                                disabled1
                                required
                                value="251412"
                            />
                        </div>
                    </div>
                    <div class="txts" id="Lec_Actual">
                        <label for="">Fecha actual:</label> 
                        <input 
                            type="text" 
                            class="Txt100"
                            id="txt_fecha_Act"
                            placeholder="fecha Act."
                            required
                        />
                        <label for="">Lectura actual:</label>
                        <input 
                            type="text" 
                            class="Txt100 TxtNumb"
                            id="txt_Lectura_Act"
                            placeholder="Lectura Act." 
                            onkeypress="return esNumero(event, this.id);"
                            required
                        />
                    </div>

                    <div class="resultados" id="resElectricidad"></div>Watts Consumidos
                </div>
            </div>

            <div class="txts Boton_Div">
                <label for="">Consumo de Agua:</label>
                <input 
                    type="text" 
                    class="Txt100" 
                    id="Compra_Compras" 
                    placeholder=""
                    required
                /> litros
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
			$("#txt_fecha_Ant").datepicker({
				dateFormat: 'dd-M-yy'
            }).datepicker("setDate", new Date());

            $("#txt_fecha_Act").datepicker({
				dateFormat: 'dd-M-yy'
			}).datepicker("setDate", new Date());
        });

        $(document).on('change', '#txt_Lectura_Ant', function() {
            $('#resElectricidad').html(calculoElectricidad('txt_Lectura_Ant', 'txt_Lectura_Act'));
            colorResultado();
        });

        $(document).on('change', '#txt_Lectura_Act', function() {
            $('#resElectricidad').html(calculoElectricidad('txt_Lectura_Ant', 'txt_Lectura_Act'));
            colorResultado();
        });

    </script>
</body>
</html>