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
        <button id="btncompras"><i class="far fa-money-bill-alt"></i>    Compras </button>
        <button id="btnconsumos"><i class="far fa-chart-bar"></i>  Consumos</button>  
        <button id="btnsiembra"><i class="fas fa-book"></i>    Siembra</button>
        <button id="btnmonitoreo"><i class="fas fa-book"></i>    Monitoreo</button>
        <button id="btnbiometrico"><i class="fas fa-database"></i>    Biometrico</button>
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
        $(document).on('click', '#btnbiometrico', function() {
            window.location='Biometrico.php';
        });
        $(document).on('click', '#btnsiembra', function() {
            window.location='Siembra.php';
        });
        $(document).on('click', '#btncompras', function() {
            window.location='Compras.php';
        });
        $(document).on('click', '#btnmonitoreo', function() {
            window.location='Monitoreo.php';
        });
        $(document).on('click', '#btnconsumos', function() {
            window.location='Consumos.php';
        });
        
    </script>
</body>
</html>