<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <?php include "../incl/links.php"?>
</head>
<body class="cuerpo">

    <?php include "../incl/header.php"?>
    
    <div class="container">
        <h2>Menu Principal</h2>        
        <button class="btnconsumo"><i class="far fa-chart-bar"></i>  Indicadores de Consumo</button>        
        <button class="btnreportes"><i class="fas fa-book"></i>    Reportes de proceso</button>
        <button class="btnregistros"><i class="fas fa-database"></i>    Registro de Datos</button>
        
    </div>
    <div class="container transp80 footer">
        <?php include "../incl/footer.php"?>
    </div>    

    <script>
        window.onload=function(){
            FechaActual();
            HoraActual();
        }
        $(document).on('click', '.btnregistros', function() {
            window.location='Menu_Registro.php';
        });
        $(document).on('click', '.btnreportes', function() {
            window.location='Menu_Reportes.php';
        });
        $(document).on('click', '.cancelbtn', function() {
            window.location='../';
        });
    </script>
</body>
</html>