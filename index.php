<?php
    try{
        session_start();
        include "p34hc3p/conexion.php";

        if(isset($_COOKIE['REF']) && isset($_COOKIE['MARK'])){
            if($_COOKIE['REF']!="" || $_COOKIE['MARK']!=""){
    
                $sql_c = $CNN->prepare("SELECT * FROM cookies WHERE marca=:marca AND marca<>''");
                // $sql_c->bindValue(':ids',$_COOKIE["ref"]); ID_user=:ids AND
                $sql_c->bindValue(':marca',$_COOKIE["MARK"]);
                $sql_c->execute();
                $datos = $sql_c->fetch(PDO::FETCH_ASSOC);

                if($datos['ID']>=1){
                    $query = "SELECT us.*, fn.*, ra.*
                            FROM usuarios AS us 
                                LEFT JOIN fincas AS fn ON fn.id_user = us.ID
                                LEFT JOIN rangos AS ra ON us.Rol = ra.ID_ra
                            WHERE us.ID=:ids";

                    $resultadoS = $CNN->prepare($query);
                    $resultadoS->bindValue(':ids',$datos['ID_user']);
                    $resultadoS->execute();
                    $resul = $resultadoS->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['Activo'] = $resul;
                }

                if(isset($_SESSION['Activo'])){
                    switch($_SESSION['Activo']['ID_ra']){
                        case 1:
                            header('location: pgs/menu.php');
                            break;
                        case 2:
                            header('location: pgs/menu.php');
                            break;
                        case 3:
                            header('location: pgs/menu.php');
                            break;
                        // default:
                        //     header('location: ../');
                        //     break;
                    }
                }
<<<<<<< HEAD
                //$query= null;
=======
                $query= null;
>>>>>>> 77ada48a42f540a3402ade30cfd3619cf2f4a52e
            }
        }

            if(isset($_POST['txt_Email']) || isset($_POST['txt_Clave'])){
                $usuario = strtolower($_POST['txt_Email']);
                $clave = md5($_POST['txt_Clave']);

                $query = "SELECT us.*, fn.*, ra.*
                        FROM usuarios AS us 
                            LEFT JOIN fincas AS fn ON fn.id_user = us.ID 
                            LEFT JOIN rangos AS ra ON us.Rol = ra.ID_ra
                        WHERE us.Correo = :usuario";

                $resultado = $CNN->prepare($query);
                $resultado->bindParam(':usuario', $usuario); 
                $resultado->execute();
                $data = $resultado->fetch(PDO::FETCH_ASSOC);

                $ids = $data['ID'];

                if($data['Correo'] != $usuario && $data['Estado']==1){	
                    echo"<script type=\"text/javascript\">alert(' Usuario incorrecto'); window.location='';</script>";
                }else{
                    if ($data['Clave'] == $clave ) {
                        
                        $_SESSION['Activo'] = $data;

                        if(isset($_POST['remember'])){
                            if($_POST['remember'] == true){
                                mt_srand(time());
                                $rand = mt_rand(1000000,9999999);
            
                                $log = $CNN->prepare("INSERT INTO cookies (ID_user, marca) VALUES (?, ?)");
                                $log->bindValue(1, $ids);
                                $log->bindValue(2, $rand);
                                $log->execute();
            
                                setcookie("REF", $ids, time()+(60*60*24*30));
                                setcookie("MARK", $rand, time()+(60*60*24*30));
                            }
                        }

                        header('location: pgs/menu.php');

                    }else{
                        echo"<script type=\"text/javascript\">alert(' Usuario o Clave de acceso incorrecto'); window.location='';</script>";
                    }
                }
                $CNN = null;
                $query= null;
            }
        
    }
    catch(PDOException $e){
        echo "<br>Error de Inicio: " . $e->getMessage() . "<br>" ; 
    	die();
    }
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="descripcion" content="Sistema de control de cultivo para piscicultores">
    <meta name="theme-color" content="#4da6ff">
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="./img/logo.png">
    <link rel="apple-touch-startup-image" href="./img/logo.png">
    <link rel="manifest" href="./manifest.json">

    <title>Login de usuario</title>
    <link rel="stylesheet" href="css/principal.css">
    <link rel="stylesheet" href="css/formularios.css">    
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <script src="js/icons.js"></script>
    <script src="js/sha1.js"></script>
</head>
<body>
    <div class="recuadro">
        <div class="imgcontainer">
            <img src="img/usuario.png" alt="Avatar" class="avatar">
        </div>
        <form action="<?php $_SERVER ['SCRIPT_NAME'] ?>" method="POST">
        <div class="container" id="registros">
            <label for="uname"><b>Usuario</b></label>
            <input type="email" class="TxtAll" placeholder="nombre@ejemplo.com" id="txt_Email" required name="txt_Email">

            <label for="psw"><b>Contraseña</b></label>
            <input type="password" class="TxtAll" placeholder="Contraseña" id="txt_Clave" required name="txt_Clave">

            <label>
                <input type="checkbox"  name="remember" id="Chk_Recordar"> Recordarme
            </label>

            <button type="submit" onclick="cifrar();" id="btn_Aceptar" class="button"><i class="far fa-check-circle"></i>   Aceptar</button>
        </div>
        </form>
        <div class="container container_login" style="background-color:#f1f1f1">
            <span class="psw">Olviodó su <a href="pgs/menu.php" id="Restablecer_Clave">Contraseña?</a></span>
        </div>
    </div>

<<<<<<< HEAD
    <script src="./script.js"></script>
    <script>
        var input_pass = document.getElementById("txt_Clave");
        function cifrar(){
            input_pass.value = sha1(input_pass.value);
            alert(input_pass.value );
=======
    <script src="js/sha1.js"></script>
    <script>
        function cifrar(){
            var input_pass = document.getElementById("txt_Clave");
            input_pass.value = sha1(input_pass.value);
>>>>>>> 77ada48a42f540a3402ade30cfd3619cf2f4a52e
        }
    </script>
    
</body>
</html>