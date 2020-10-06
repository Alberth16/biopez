<?php
    include "../incl/EstadoUser.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biometrico</title>
    <?php include "../incl/links.php"?>
</head>
<body class="cuerpo">
    
    <div class="container">
        <h3>Biometrico</h3>
        <div class="form">
        
            <div class="txts">
                <label for=""><b>No. Muestra:</b></label>
                <input 
                    type="text"
                    class="Txt100"
                    id="txt_Muestra"
                    max="100"
                    min="1"
                    name="pMuestra"
                    value="0"
                    required
                    disabled
                />
            </div>

            <div class="txts">
                <label for="pMuestra"><b>% Muestra:</b></label>
                <input 
                    type="number"
                    class="Txt100"
                    id="txt_Muestra"
                    max="100"
                    min="1"
                    placeholder="%"
                    name="pMuestra"
                    onkeypress="return esNumero(event, this.id);"
                    required
                    value="5"
                /><span>%</span>
            </div>
            
            <div class="txts">
                <label for="Peso"><b>Peso:</b></label>
                <input 
                    type="text"
                    class="Txt100 TxtNumb"
                    id="txt_Peso"
                    placeholder="Peso del pez" 
                    name="Peso"
                    onkeypress="return esNumero(event, this.id);"
                    required
                /><span>gm</span>
            </div>

            <div class="txts">
                <label for="Tamaño"><b>Tamaño:</b></label>
                <input 
                    type="text"
                    class="Txt100 TxtNumb"
                    id="txt_Tamañoepez"
                    placeholder="Largo del pez"
                    name="Tamaño"
                    onkeypress="return esNumero(event, this.id);"
                    required
                /><span>cm</span>
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
        
    
    </script>
</body>
</html>