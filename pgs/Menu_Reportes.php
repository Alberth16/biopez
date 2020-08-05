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
        <h3>Reportes de Procesos</h3>
        <button class="btnsiembra"><i class="fas fa-database"></i>    Curva de crecimiento</button>    
        <button class="btnlecturas"><i class="far fa-chart-bar"></i>  Ventas</button>    
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
            window.location='Menu.php';
        });
    </script>
</body>
</html>