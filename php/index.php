<?php
    include "../incl/EstadoUser.php";
    // session_start();
	if(isset($_SESSION['activo'] )){		
		switch($_SESSION['activo']['rol']){
            case  1:
                header('location: sistema');
                break;
            case  2:
                header('location: sistema');
                break;
            case  3:
                header('location: sistema');
                break;
            case  4:
                header('location: sistema');
            break;
        }
    }
    
    try{
		include "sistema/filePHP/conexion.php";        
        if(isset($_POST['Usuario']) || isset($_POST['Clave'])){
            $username = $_POST['Usuario'];
            $password = md5($_POST['Clave']);

            if(empty($_POST['Usuario']) || empty($_POST['Clave'])){
                echo"<script type=\"text/javascript\">alert(' Ingrese su Usuario o Clave de acceso'); window.location='';</script>";
            }else{
           
                $resultado = $CNN->prepare('SELECT * FROM usuario WHERE usuario=:usuario');
                $resultado->bindValue(':usuario', $username); 
                $resultado->execute();
                $data = $resultado->fetch(PDO::FETCH_ASSOC);

                if($data['usuario'] == $username && $data['estado']==1){	
                    if ($data['clave'] == $password ) { 
                        // if($data['logueado'] == 1){
                        //     $Mensaje = "El Usuario: ".$username.", Ya inicio secion en el equipo: ". $data['equipo'].", Fecha: ".$data['fecha'];
                        //     session_destroy();
                        //     echo"<script type=\"text/javascript\">alert('.$Mensaje.'); window.location='';</script>";
                        // }else{
                            date_default_timezone_set('America/Guatemala');
                            $Fecha = date('d-M-Y');
                            $hora = date("h:i:s a");
                            $ip = getenv("REMOTE_ADDR");
                            $pc = @gethostbyaddr($ip);

                            $_SESSION['activo'] = $data;

                            $logueo2 = $CNN->prepare('INSERT INTO ingresousuarios (usuario, nombre, rol, ip, equipo, fecha, hora) VALUES (:usuario, :nombre, :rol, :ip, :pc, :fecha,:hora)');
                            $logueo2->bindValue(':usuario', $_SESSION['activo']['usuario']); 
                            $logueo2->bindValue(':nombre', $_SESSION['activo']['nombre']); 
                            $logueo2->bindValue(':rol', $_SESSION['activo']['rol']); 
                            $logueo2->bindValue(':ip', $ip); 
                            $logueo2->bindValue(':pc', $pc); 
                            $logueo2->bindValue(':fecha', $Fecha); 
                            $logueo2->bindValue(':hora',$hora);
                            $logueo2->execute();

                            $logueado = $CNN->prepare('UPDATE usuario SET logueado = 1, ip=:ip, equipo=:pc, fecha=:fecha WHERE usuario=:usuario');
                            $logueado->bindValue(':usuario', $username); 
                            $logueado->bindValue(':ip', $ip); 
                            $logueado->bindValue(':pc', $pc); 
                            $logueado->bindValue(':fecha', $Fecha); 
                            $logueado->execute();

                            header("location: sistema/"); 
                        // }
                    }else{
                        echo"<script type=\"text/javascript\">alert(' Clave incorrecta, vuelva a intentar'); window.location='';</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alert('Usuario no registrado, ".$data['nombre'].", vuelva a intentar'); window.location='';</script>";
                }
            }
        }

		$CNN = null; 
		
	} catch (PDOException $e){
		echo $nombre . "<br>Hubo un error: " . $e->getMessage() . "<br>" ; 
		echo "<h3>Intente de Nuevo</h3>"; 
    	die();
	}
?>

<!DOCTYPE html>
<html lang="es">
    <head>        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login | Sistema de Facturacion</title>
        <link rel="stylesheet" href="css/estilos.css">
        <script src="sistema/js/jquery.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon2.png"/>
    </head>
    <body>
        <section id="container">
            <div class="formulario">
                <form action="" method="POST" class="saludo">
                    <img src="img/login.png" alt="Login">
                    <input type="text" name="Usuario" id="Usuario" placeholder="Usuario">
                    <input type="password" name="Clave" id="Clave" placeholder="Clave">
                    <input type="submit" value="Iniciar Sesión">
                </form>
            </div>
        </section>

        <script>
			window.onload = function() {
				document.getElementById("Usuario").focus();
			};

            $(function() {    
                $('#Usuario').keyup(function upperCase() {
				    var x = document.getElementById('Usuario');
				    x.value = x.value.toUpperCase();
                });
            });
        </script>
    </body>
</html>