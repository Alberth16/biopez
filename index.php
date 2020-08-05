<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login de usuario</title>
    <link rel="stylesheet" href="css/principal.css">
    <link rel="stylesheet" href="css/formularios.css">    
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script src="js/icons.js"></script>
</head>
<body>
    <div class="recuadro">
        <div class="imgcontainer">
            <img src="img/usuario.png" alt="Avatar" class="avatar">
        </div>

        <div class="container" id="registros">
            <label for="uname"><b>Usuario</b></label>
            <input type="email" class="TxtAll" placeholder="Introdusca su email" name="uname" required id="txt_Usuario">

            <label for="psw"><b>Contraseña</b></label>
            <input type="password" class="TxtAll" placeholder="Introdusca su Contraseña" name="psw" required id="txt_Clave">

            <button type="submit" id="btn_Aceptar"><i class="far fa-check-circle"></i>   Aceptar</button>
            <label>
            <input type="checkbox" checked="checked" name="remember" id="Chk_Recordar"> Recordarme
            </label>
        </div>

        <div class="container container_login" style="background-color:#f1f1f1">
            <span class="psw">Olviodó su <a href="pgs/menu.php" id="Restablecer_Clave">Contraseña?</a></span>
        </div>
    </div>
    <script>
    
    </script>
</body>
</html>