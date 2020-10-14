<?php
    // include "../incl/EstadoUser.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <?php include "../incl/links.php"?>
</head>
<body class="cuerpo">
    <header>
        <h1>Resgistro de Usuario</h1>
    </header>
    <div class="container">
        <h3>Biometrico</h3>
        <div class="form">
        
            <div class="txts">
                <label for="txt_Nombre"><b>Nombre:</b></label>
                <input 
                    type="text"
                    class=""
                    id="txt_Nombre"
                    name="txt_Nombre"
                    required
                    maxlength="100"
                />
            </div>

            <div class="txts">
                <label for="txt_Correo"><b>Correo:</b></label>
                <input 
                    type="email"
                    class=""
                    id="txt_Correo"
                    name="txt_Correo"
                    required
                    maxlength="60"
                />
            </div>
            
            <div class="txts">
                <label for="txt_Clave"><b>Contraseña:</b></label>
                <input 
                    type="password"
                    class=""
                    id="txt_Clave"
                    name="txt_Clave"
                    required
                />
            </div>

            <div class="txts">
                <label for="txt_Clave2"><b>Repita Contraseña:</b></label>
                <input 
                    type="password"
                    class=""
                    id="txt_Clave2"
                    name="txt_Clave2"
                    required
                    
                /> <span class="verificarPass"></span>
            </div>

            <div class="txts">
                <label for="txt_Finca"><b>Nombre de Finca:</b></label>
                <input 
                    type="text"
                    class=""
                    id="txt_Finca"
                    name="txt_Finca"
                    required
                    maxlength="100"
                />
            </div>

            <div class="txts">
                <label for="Tamaño"><b>Rol del Usuario:</b></label>
                <select name="Roles" id="Roles" class="select_"></select>
            </div>

            <button id="btnGuardar" class="button"> Siguiente <i class="fas fa-arrow-circle-right"></i></button>
        </div>
    </div>

    <script>
        window.onload=function(){
            FechaActual();
            HoraActual();
            Combroles();
        }

        $(document).on('click', '.cancelbtn', function() {
            window.location='Menu_Registro.php';
        });
        
    
    </script>
</body>
</html>