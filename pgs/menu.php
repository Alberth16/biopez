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
    
    
        <h2 id="Nombre_Empresa"></h2>
        <div class="datos">

            <nav class="topnav" id="myTopnav">
                <a href="Indicadores.php" target="Contenido" class=""  onclick="CambioClase();"><i class="fas fa-chart-line"></i>   Indicadores de Consumo</a>
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-book"></i>   Reportes de proceso <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="Curva.php" target="Contenido" id="btnsiembra" onclick="CambioClase();"><i class="fas fa-chart-bar"></i>   Curva de crecimiento</a>
                        <a href="Reportes.php" target="Contenido" id="btnlecturas" onclick="CambioClase();"><i class="fas fa-database"></i>   Descargar Datos</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-clipboard-check"></i>   Registro de Datos <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="Compras.php" target="Contenido" id="btncompras" onclick="CambioClase();"><i class="far fa-money-bill-alt"></i>   Compras </a>
                        <a href="Consumos.php" target="Contenido" id="btnconsumos" onclick="CambioClase();"><i class="fas fa-dollar-sign"></i>   Consumos</a>
                        <a href="Siembra.php" target="Contenido" id="btnsiembra" onclick="CambioClase();"><i class="fab fa-pagelines"></i>   Siembra</a>
                        <a href="Monitoreo.php" target="Contenido" id="btnmonitoreo" onclick="CambioClase();"><i class="fas fa-eye-dropper"></i>   Parametros</a>
                        <a href="Biometrico.php" target="Contenido"  id="btnbiometrico" onclick="CambioClase();"><i class="fas fa-tag"></i>   Biometrico</a>
                    </div>
                </div>

                <a href="javsascript:void(0);" class="icon" onclick="CambioClase();"><i class="fa fa-bars"></i></a>
            </nav>


            <div class="contenedor">
                <iframe id="Contenido" src="Siembra.php" name="Contenido" frameborder="0" width="100%" height="100%" ></iframe>
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
        $(document).on('click', '#btncancel', function() {
            window.location='../p34hc3p/logout.php';
        });
    </script>
</body>
</html>