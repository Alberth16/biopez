<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>
    <?php include "../incl/links.php"?>
</head>
<body class="cuerpo">
    <?php include "../incl/header.php"?>
    
    <div class="container">
        <div class="msgbox"></div>
        <h3>Consumos de Suministros</h3>
        <div class="form">
        
            <div class="txts">
                <div class="Boton_Div">Energia Electrica:</div>

                <div class="oculto" id="Energia">

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
                                disabled
                                required
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
                    
                    <div class="resultados">4525</div>Watts Consumidos
                </div>                
            </div>

            <div class="txts Boton_Div">
                <label for="">Consumo de Agua:</label>                
                <input 
                    type="text" 
                    class="Txt100" 
                    id="Compra_Compras" 
                    placeholder="Compra"
                    required                     
                /> litros
            </div>


            <button class="btnGuardar"><i class="far fa-save"></i> Guardar</button>
        </div>
    </div>
    .
    <div class="container transp80 footer">
        <?php include "../incl/footer.php"?>
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

    </script>
</body>
</html>