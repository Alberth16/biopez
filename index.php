<?php
    try{
        session_start();
        include "php/conexion.php";

        if(isset($_COOKIE['REF']) && isset($_COOKIE['MARK'])){
            if($_COOKIE['REF']!="" || $_COOKIE['MARK']!=""){
    
                $sql_c = $CNN->prepare("SELECT * FROM cookies WHERE marca=:marca AND marca<>''");
                // $sql_c->bindValue(':ids',$_COOKIE["ref"]); ID_user=:ids AND
                $sql_c->bindValue(':marca',$_COOKIE["MARK"]);
                $sql_c->execute();
                $datos = $sql_c->fetch(PDO::FETCH_ASSOC);

                if($datos['ID']>=1){
                    $query = "SELECT us.ID as ID, us.Nombre as Nombre, us.Correo as Correo, us.Clave as Clave, us.Rol as Rol, us.Estado as Estado, ra.Descripcion as DescRols  
                            FROM usuarios us INNER JOIN rangos ra ON us.Rol = ra.ID
                            WHERE us.ID=:ids";
                    $resultadoS = $CNN->prepare($query);
                    $resultadoS->bindValue(':ids',$datos['ID_user']);
                    $resultadoS->execute();
                    $resul = $resultadoS->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['Activo'] = $resul;
                }

                if(isset($_SESSION['Activo'])){
                    switch($_SESSION['Activo']['Rol']){
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
            }
        }

            if(isset($_POST['txt_Email']) || isset($_POST['txt_Clave'])){
                $usuario = strtolower($_POST['txt_Email']);
                $clave = md5($_POST['txt_Clave']);

                $query = "SELECT us.ID, us.Nombre, us.Correo, us.Clave, us.Rol, us.Estado, ra.Descripcion as DescRols  
                            FROM usuarios us INNER JOIN rangos ra ON us.Rol = ra.ID
                            WHERE us.Correo = :usuario";
                $resultado = $CNN->prepare($query);
                $resultado->bindParam(':usuario', $usuario); 
                $resultado->execute();
                $data = $resultado->fetch(PDO::FETCH_ASSOC);

                echo $ids = $data['ID'];

                if($data['Correo'] == $usuario && $data['Estado']==1){	
                    if ($data['Clave'] == $clave ) {
                        $_SESSION['Activo'] = $data;

                        if(isset($_POST['remember'])){
                            if($_POST['remember'] == true){
                                mt_srand(time());
                                $rand = mt_rand(1000000,9999999);
            
                                $log = $CNN->prepare("INSERT INTO cookies (ID_user, Navegador, marca) VALUES (?, ?, ?)");
                                $log->bindValue(1, $ids);
                                $log->bindValue(2, $_SERVER['HTTP_USER_AGENT']);
                                $log->bindValue(3, $rand);
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
        <form action="<?php $_SERVER ['SCRIPT_NAME'] ?>" method="POST">
        <div class="container" id="registros">
            <label for="uname"><b>Usuario</b></label>
            <input type="email" class="TxtAll" placeholder="Introdusca su email" id="txt_Email" required name="txt_Email">

            <label for="psw"><b>Contraseña</b></label>
            <input type="password" class="TxtAll" placeholder="Introdusca su Contraseña" id="txt_Clave" required name="txt_Clave">

            <label>
                <input type="checkbox"  name="remember" id="Chk_Recordar"> Recordarme
            </label>

            <button type="submit" id="btn_Aceptar"><i class="far fa-check-circle"></i>   Aceptar</button>
        </div>
        </form>
        <div class="container container_login" style="background-color:#f1f1f1">
            <span class="psw">Olviodó su <a href="pgs/menu.php" id="Restablecer_Clave">Contraseña?</a></span>
        </div>
    </div>
    <script>
    
    </script>
</body>
</html>