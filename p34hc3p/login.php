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
                    $query = "SELECT us.ID, us.Nombre, us.Correo, us.FechaRegistro, us.Rol, fn.*, ra.*
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
                //$query= null;
            }
        }

            if(isset($_POST['txt_Email']) || isset($_POST['txt_Clave'])){
                $usuario = strtolower($_POST['txt_Email']);
                $clave = md5($_POST['txt_Clave']);

                $query = "SELECT us.ID, us.Nombre, us.Correo, us.FechaRegistro, us.Rol, fn.*, ra.*
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
                        
                        $Sesion[] = $data;

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
                        json_encode($Sesion);
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
