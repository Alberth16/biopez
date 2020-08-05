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
            <label for="uname"><b>% Muestra</b></label>
            <input type="number" class="Txt100" max="100" min="1" placeholder="% MUestra" name="uname" required id="txt_Muestra" value="5">
            
            <label for="uname"><b>Peso Libras:</b></label>
            <input type="text" class="TxtNumb" placeholder="Peso del pez" name="Peso" required id="txt_Peso">

            <label for="uname"><b>Tamaño Centimetros:</b></label>
            <input type="text" class="TxtNumb" placeholder="Tamaño del pez" name="uname" required id="txt_Tamañoepez">

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