<?php
    include "../incl/EstadoUser.php";

    // session_start();
    if(isset($_GET['funcion']) && !empty($_GET['funcion'])){
        $funcion = intval($_GET['funcion']); 
        if($funcion == 1){
            listar_registro();
        }elseif($funcion == 2){
            Buscar();
        }elseif($funcion == 3){
            Agregar();
        }elseif($funcion == 4){
            Modificar();
        }elseif($funcion == 5){
            Eliminar();
        }
    }
   
    function listar_registro(){
        try {
            
            include "conexion.php";
    
            if(isset($_POST['buscador'])){
                $valorbuscado = $_POST['buscador'];
                $html="";
                $boton="";

                if(empty($_POST['buscador'])){
                    $query = ("SELECT U.fecha_registro, U.idusuario AS IDUSERS, U.usuario AS USERS, U.nombre AS NAMES, U.correo AS MAILS, U.rol as UROL, R.rol AS ROLS 
                                FROM usuario AS U INNER JOIN rol R ON U.rol =R.idrol 
                                WHERE estado = 1 ORDER BY U.idusuario DESC");
                    $resultado = $CNN->prepare($query);
                    $resultado->execute();
                 }else{
                    $query = "SELECT U.fecha_registro, U.idusuario AS IDUSERS, U.usuario AS USERS, U.nombre AS NAMES, U.correo AS MAILS, U.rol as UROL, R.rol AS ROLS 
                                FROM usuario AS U INNER JOIN rol R ON U.rol =R.idrol 
                                WHERE U.nombre LIKE ? AND U.estado = 1 AND U.rol <> 1 ORDER BY nombre";
                    $resultado = $CNN->prepare($query);
                    $resultado->bindValue(1,'%'.$valorbuscado.'%');
                    $resultado->execute();
                 }

                    while($datos = $resultado->fetch(PDO::FETCH_ASSOC)){

                        if(($_SESSION['activo']['rol'] != 1 && $datos['UROL'] == 1)){
                        }else{
                            if(($datos['UROL'] == 1 || $datos['UROL'] == 2) || ($_SESSION['activo']['idusuario'] == $datos['IDUSERS'])){
                                $boton='';
                            }else{       
                                $boton = '<a href="#" id="'.$datos['IDUSERS'].'" class="btn_Eliminar" onclick="Marcar_eliminarRegistro(this)"><i class="fas fa-trash-alt"></i></a>';
                            }
                            if($_SESSION['activo']['rol'] == 1){
                                $boton = '<a href="#" id="'.$datos['IDUSERS'].'" class="btn_Eliminar" onclick="Marcar_eliminarRegistro(this)"><i class="fas fa-trash-alt"></i></a>';
                            }

                            $html.=
                            '<tr class="'.$datos['IDUSERS'].'">'
                            .'<td class="NoVer">'.$datos['IDUSERS']
                            .'</td><td>'.$datos['USERS']
                            .'</td><td><a href="#" id="'.$datos['IDUSERS'].'" class="Link_Editar" onclick="LLenarDatosRegistros(this);">'.$datos['NAMES']
                            .'</a></td><td class="NoVer">'.$datos['MAILS']
                            .'</td><td>'.$datos['ROLS']
                            .'</td><td class="NoVer">'.$datos['fecha_registro']
                            .'</td><td>'.$boton.'</td></tr>';
                        }
                    }

                    if(empty($html)){
                        $html.='<tr><td colspan="6" id="userNoFound"> Usuario no Encontrado</td></tr>';
                    }
            }else{
                echo "Error";
            }
    
            echo $html;
    
            $CNN=null;
    
        } catch (PDOException $e) {
            echo "<br>Hubo un error 1: " . $e->getMessage(); 
            die();
        }
    }

    function Buscar(){
        include "conexion.php";
        try {
            if(isset($_POST['NumID'])){
                $Id = $_POST['NumID'];
                $query = ('SELECT idusuario, usuario, nombre, correo, usuario, rol FROM usuario WHERE idusuario = ?');
                $consulta = $CNN->prepare($query);
                $consulta->bindValue(1,$Id);
                $consulta->execute();

                while($valor =$consulta->fetch(PDO::FETCH_ASSOC)){
                    $data['data'][]=$valor;
                }

                echo jsonEncodeArray($data);
            }

            $CNN=null;
        } catch (PDOException $e) {
            echo "Ocurrio un Error" . $e->getMessage();
            die();
        }
    }

    function Agregar(){
        try{
            include "conexion.php";
            include "functions.php";

            if(isset($_POST['vUsuario']) || isset($_POST['vClave'])){
    
                $username = $_POST['vUsuario'];
                $correo = $_POST['vCorreo'];
                $nombre = $_POST['vNombre'];
                $fechaIng = fechaC();
                $hora = HoraLarga();
                $rol = $_POST['vRol'];
                $password = md5($_POST['vClave']);

    
                $resultado = $CNN->prepare("SELECT * FROM usuario WHERE usuario=:usuario");
                $resultado->bindValue(':usuario', $username); 
                $resultado->execute();
                $datos = $resultado->fetch(PDO::FETCH_ASSOC);
    
                if($datos['usuario'] != $username){
                        $registro = $CNN->prepare(
                            'INSERT INTO usuario (usuario, nombre, rol, correo, clave, fecha_registro, hora, estado) 
                            VALUES (:usuario, :nombre, :rol, :correo, :clave, :fechaIng, :hora, 1)'
                        );
                        $registro->bindValue(':usuario', $username); 
                        $registro->bindValue(':nombre', $nombre); 
                        $registro->bindValue(':rol', $rol); 
                        $registro->bindValue(':correo', $correo); 
                        $registro->bindValue(':clave', $password); 
                        $registro->bindValue(':fechaIng',$fechaIng);
                        $registro->bindValue(':hora',$hora);

                        if($registro->execute()){
                            $data =array('data'=>array("El Usuario ".$username.", ha sido Registrado.",1));
                        }
                }else{
                    $data =array('data'=>array("Usuario ". $username ." ya existe, intente con otro nombre.",2));
                }
            }
    
            echo jsonEncodeArray($data); //json_encode
    
            $CNN = null; 
            
        } catch (PDOException $e){
            echo $nombre . "<br>Hubo un error: " . $e->getMessage() . "<br>" ;
            die();
        }
    }

    function Modificar(){
        try{
            include "conexion.php";        
            if(isset($_POST['vUsuario']) || isset($_POST['vClave'])){
    
                $iduser =$_POST['vIduser'];
                $username = $_POST['vUsuario'];
                $correo = $_POST['vCorreo'];
                $nombre = $_POST['vNombre'];
                $rol = $_POST['vRol'];
                $password = md5($_POST['vClave']);

                $resultado = $CNN->prepare("SELECT idusuario, usuario FROM usuario WHERE idusuario=:iduser");
                $resultado->bindValue(':iduser', $iduser); 
                $resultado->execute();
                $datos = $resultado->fetch(PDO::FETCH_ASSOC);
    
                if($datos['idusuario'] == $iduser){
                        $registro = $CNN->prepare('UPDATE usuario SET nombre=:nombre, rol=:rol, correo=:correo, clave=:clave, usuario=:usuario WHERE idusuario=:iduser');
                        $registro->bindParam(':usuario', $username); 
                        $registro->bindParam(':nombre', $nombre); 
                        $registro->bindParam(':rol', $rol); 
                        $registro->bindParam(':correo', $correo); 
                        $registro->bindParam(':clave', $password); 
                        $registro->bindParam(':iduser', $iduser); 
    
                        if($registro->execute()){
                            $data =array('data'=>array("El Usuario ".$username.", ha sido Modificado.",1));
                        }
                }else{
                    $data =array('data'=>array("Usuario ". $username ." No existe, intente con otro nombre.",2));
                }
            }
    
            echo jsonEncodeArray($data); //json_encode
    
            $CNN = null; 
            
        } catch (PDOException $e){
            echo $nombre . "<br>Hubo un error: " . $e->getMessage() . "<br>" ;
            die();
        }
    }

    function Eliminar(){
        try {
            include_once "conexion.php";
    
            if(isset($_POST['iduser']) ){                
                
                $iduser =$_POST['iduser'];
    
                $resultado = $CNN->prepare("SELECT * FROM usuario WHERE idusuario=:iduser");
                $resultado->bindValue(':iduser', $iduser); 
                $resultado->execute();
                $datos = $resultado->fetch(PDO::FETCH_ASSOC);

                if($iduser==1){
                    $data =array('data'=>array("Usuario ". $datos['nombre'] ." No se puede Eliminar.",2));
                    echo jsonEncodeArray($data);
                    exit;
                }
    
                if($datos['idusuario'] == $iduser){
                    // $queryE = 'DELETE FROM usuario WHERE idusuario=:iduser';
                    $queryM = 'UPDATE usuario SET estado = 0 WHERE idusuario=:iduser';
                    $registro = $CNN->prepare($queryM);
                    $registro->bindParam(':iduser', $iduser); 
    
                    if($registro->execute()){
                        $data =array('data'=>array("El Usuario ".$datos['nombre'].", ha sido Eliminado.",1));
                    }
                }else{
                    $data =array('data'=>array("Usuario ". $datos['nombre'] ." No existe, intente con otro nombre.",2));
                }
            }
            echo jsonEncodeArray($data);
            $CNN =null;
            
        } catch (PDOException $e) {
            echo "Hubo un error ".$e->getMessage();
        }
    }

    ?>