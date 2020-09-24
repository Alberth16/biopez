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
        <h3>Compras</h3>
        <div class="form">
        
            <div class="txts">
                <label for="">Factura:</label>
                <input 
                    type="text"
                    class=""
                    id="Compra_Factura"
                    placeholder="NO. factura"
                    required
                />#
            </div>

            <div class="txts">
                <label for="">Fecha:</label>                
                <input 
                    type="text" 
                    class="Txt100" 
                    id="Compra_Compras" 
                    placeholder="Compra"
                    required                     
                />de Compra
            </div>

            <div class="txts">
                <label for="">Fecha:</label>
                <input 
                    type="text" 
                    class="Txt100 TxtNumb"
                    id="Compra_Vencimiento"
                    placeholder="Vence"
                    required 
                />Vencimiento
            </div>
            
            <div class="txts">
                <label for="">Producto:</label>
                <input 
                    type="text" 
                    class="Txt100 TxtNumb"
                    id="txt_Compra_Producto"
                    placeholder="Producto"                     
                    required 
                />Descripción

            </div>

            <div class="txts">
                <label for="">Cantidad:</label>
                <input 
                    type="text" 
                    class="Txt100 TxtNumb"
                    id="txt_Compra_cantidad"
                    placeholder="Cantidad" 
                    onkeypress="return esNumero(event, this.id);"
                    required 
                />
                <select id="Compra_Unidad" class="select_">
                    <option value="1">Lbs</option>
                    <option value="2">gms</option>
                    <option value="3">Kgs</option>
                    <option value="4">Eas</option>
                </select>

            </div>

            <div class="txts">
                <label for="">Precio:</label>
                <input 
                    type="text" 
                    class="Txt100 TxtNumb"
                    id="txt_Compra_Precio"
                    placeholder="Precio" 
                    onkeypress="return esNumero(event, this.id);"
                    required
                /> Lps.
            </div>

            <button class="btnGuardar"><i class="far fa-save"></i> Guardar</button>
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
			$("#Compra_Compras").datepicker({
				dateFormat: 'dd-M-yy'				
            }).datepicker("setDate", new Date());

            $("#Compra_Vencimiento").datepicker({
				dateFormat: 'dd-M-yy'				
			}).datepicker("setDate", new Date());
        });

    </script>
</body>
</html>