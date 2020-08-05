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
        <h3>Registro de datos</h3>
        <button class="btnsiembra"><i class="fas fa-database"></i>    Siembra</button>    
        <button class="btnlecturas"><i class="far fa-chart-bar"></i>  Lecturas</button>        
        <button class="btnmonitoreo"><i class="fas fa-book"></i>    Monitoreo</button>        
        <button class="btncompras"><i class="fas fa-database"></i>    Compras </button>
        <button class="btnbiometrico"><i class="fas fa-database"></i>    Biometrico</button>
        
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
        $(document).on('click', '.btnbiometrico', function() {
            window.location='Biometrico.php';
        });
        $(document).on('click', '.btnsiembra', function() {
            window.location='Siembra.php';
        });

        
    </script>
</body>
</html>