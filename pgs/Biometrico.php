<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de datos </title>
    <?php include "../incl/links.php"?>
</head>
<body class="cuerpo">
    <?php include "../incl/header.php"?>
    
    <div class="container">
        <h3>Biometrico</h3>
        <div class="form">
            <label for=""><b>No. Muestra</b></label>
            <input type="text" class="Txt100" max="100" min="1"  name="pMuestra" required id="txt_Muestra" disabled value="10" 
            style=
            "text-align: center;
            font-weight:600;"
            >

            <label for="pMuestra"><b>% Muestra</b></label>
            <input type="number" class="Txt100" max="100" min="1" placeholder="% MUestra" name="pMuestra" required id="txt_Muestra" value="5">
            
            <label for="Peso"><b>Peso Libras:</b></label>
            <input type="text" class="TxtNumb" placeholder="Peso del pez" name="Peso" required id="txt_Peso">

            <label for="Tamaño"><b>Tamaño Centimetros:</b></label>
            <input type="text" class="TxtNumb" placeholder="Tamaño del pez" name="Tamaño" required id="txt_Tamañoepez">

            <button class="btnGuardar"><i class="far fa-save"></i> Guardar</button>
        </div>
    </div>
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
        
    
    </script>
</body>
</html>