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
<<<<<<< HEAD
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
=======
                <a href="Indicadores.php" target="Contenido" class=""  onclick="myFunction();"><i class="far fa-chart-bar"></i>  Indicadores de Consumo</a>
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-book"></i>    Reportes de proceso <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="Curva.php" target="Contenido" id="btnsiembra" onclick="myFunction();"><i class="fas fa-database"></i>    Curva de crecimiento</a>
                        <a href="Reportes.php" target="Contenido" id="btnlecturas" onclick="myFunction();"><i class="far fa-chart-bar"></i>  Descargar Datos</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn"><i class="fas fa-database"></i>    Registro de Datos <i class="fa fa-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="Compras.php" target="Contenido" id="btncompras" onclick="myFunction();"><i class="far fa-money-bill-alt"></i>    Compras </a>
                        <a href="Consumos.php" target="Contenido" id="btnconsumos" onclick="myFunction();"><i class="far fa-chart-bar"></i>  Consumos</a>
                        <a href="Siembra.php" target="Contenido" id="btnsiembra" onclick="myFunction();"><i class="fas fa-book"></i>    Siembra</a>
                        <a href="Monitoreo.php" target="Contenido" id="btnmonitoreo" onclick="myFunction();"><i class="fas fa-book"></i>    Monitoreo</a>
                        <a href="Biometrico.php" target="Contenido"  id="btnbiometrico" onclick="myFunction();"><i class="fas fa-database"></i>    Biometrico</a>
                    </div>
                </div>

                <a href="javsascript:void(0);" class="icon" onclick="myFunction();"><i class="fa fa-bars"></i></a>
>>>>>>> 46c3a551dce152eaba9b556b8c12d0f590e58ca1
            </nav>


            <div class="contenedor">
<<<<<<< HEAD
                <iframe id="Contenido" src="Siembra.php" name="Contenido" frameborder="0" width="100%" height="100%" ></iframe>
=======
                <iframe id="Contenido" src="Biometrico.php" name="Contenido" frameborder="0" width="100%" height="100%" scrolling="yes"></iframe>
>>>>>>> 46c3a551dce152eaba9b556b8c12d0f590e58ca1
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
            window.location='../php/logout.php';
        });
    </script>
</body>
</html>