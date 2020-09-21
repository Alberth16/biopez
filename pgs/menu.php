<?php 
    include "../incl/EstadoUser.php";
?>
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
    
    
        <h2>Menu Principal</h2>
        <div class="datos">

            <nav class="topnav" id="myTopnav">
                <a ref="Indicadores.php" target="Contenido" class="dropdown"><i class="far fa-chart-bar"></i>  Indicadores de Consumo</a>
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-book"></i>    Reportes de proceso <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="#" id="btnsiembra"><i class="fas fa-database"></i>    Curva de crecimiento</a>
                        <a href="#" id="btnlecturas"><i class="far fa-chart-bar"></i>  Ventas</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-database"></i>    Registro de Datos <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="Compras.php" target="Contenido" id="btncompras"><i class="far fa-money-bill-alt"></i>    Compras </a>
                        <a href="Consumos.php" target="Contenido" id="btnconsumos"><i class="far fa-chart-bar"></i>  Consumos</a>
                        <a href="Siembra.php" target="Contenido" id="btnsiembra"><i class="fas fa-book"></i>    Siembra</a>
                        <a href="Monitoreo.php" target="Contenido" id="btnmonitoreo"><i class="fas fa-book"></i>    Monitoreo</a>
                        <a href="Biometrico.php" target="Contenido"  id="btnbiometrico"><i class="fas fa-database"></i>    Biometrico</a>
                    </div>
                </div>

                <!-- <a href="javsascript:void(0);" class="icon" onclick="cambiaClase();"><i class="fa fa-bars"></i></a> -->
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
            </nav>





            <div class="contenedor">
                <iframe src="Indicadores.php" name="Contenido" frameborder="0" width="100%" height="100%"></iframe>
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
        $(document).on('click', '.btnregistros', function() {
            window.location='Menu_Registro.php';
        });
    </script>
</body>
</html>