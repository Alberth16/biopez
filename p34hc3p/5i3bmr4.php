<?php
    include "../incl/EstadoUser.php";

    if(isset($_GET['f/s6o%n']) && !empty($_GET['f/s6o%n'])){
        $funcion = intval($_GET['f/s6o%n']); 
        switch($funcion){
            case 1:
                Combo_Especie();
                break;
            case 2:
                Agregar();
                break;
            case 3:
                Buscar_Especie();
                break;
            case 4:
                Modificar();
                break;
            case 5;
                Eliminar();
                break;
        }
    }

    // Si
    function Combo_Especie(){
        include "conexion.php";
        try {
            $query = ('SELECT * FROM especies WHERE estado = 1');
            $consulta = $CNN->prepare($query);
            $consulta->execute();

            while($valor =$consulta->fetch(PDO::FETCH_ASSOC)){
                $data['data'][]=$valor;
            }

            echo jsonEncodeArray($data);
            $CNN=null;
        } catch (PDOException $e) {
            echo "LLenar especies " . $e->getMessage();
            die();
        }
    } 


    // Si
    function Agregar(){
        try{
            include "conexion.php";
            // include "functions.php";

            if(isset($_POST['NoEstanque'])){
    
                $FechaSiembra = $_POST['FechaSiembra'];
                $NoEstanque = $_POST['NoEstanque'];
                $Especie = $_POST['Especie'];
                $LitroAgua = $_POST['LitroAgua'];
                $CantidadSiembra = $_POST['CantidadSiembra'];
                $TallaInicial = $_POST['TallaInicial'];
                $ID_Finca = $_POST['ID_Finca'];
                $ID_user = $_POST['ID_user'];
                $finca = $_POST['finca'];

                $resultado = $CNN->prepare("SELECT * FROM siembras WHERE NoEstanque =? AND FechaSiembra =? AND ID_Finca =?");
                $resultado->bindValue(1, $NoEstanque); 
                $resultado->bindValue(2, $FechaSiembra); 
                $resultado->bindValue(3, $ID_Finca); 
                $resultado->execute();
                $datos = $resultado->rowCount().'<br>';
                
                if($datos >= 1){
                    $data =array('data'=>array("Siembra ya existe, intente con otro nombre de Estanque.",2));
                }else{
                    
                    $registro = $CNN->prepare(
                        'INSERT INTO siembras (FechaSiembra, NoEstanque, Especie, AgualLts, SiembraQty, Tamano, ID_Finca, ID_user)
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?)'
                    );
                    $registro->bindValue(1, $FechaSiembra); 
                    $registro->bindValue(2, $NoEstanque); 
                    $registro->bindValue(3, $Especie); 
                    $registro->bindValue(4, $LitroAgua);
                    $registro->bindValue(5, $CantidadSiembra); 
                    $registro->bindValue(6,$TallaInicial);
                    $registro->bindValue(7,$ID_Finca);
                    $registro->bindValue(8,$ID_user);

                    if($registro->execute()){
                        $fincas = $CNN->prepare('INSERT INTO fincas (Finca, Especie, id_user, Estado) VALUES(?, ?, ?, 1)');
                        $fincas->bindValue(1,$finca);
                        $fincas->bindValue(3,$ID_user);
                        $fincas->execute();

                        $estanques = $CNN->prepare('INSERT INTO estanques (`NoEstanque`, `ID_Espe`, `ID_user`, `ID_Finca`) 
                                                    VALUES');
                        $estanques->bindValue(1, $NoEstanque);
                        $estanques->bindValue(2, $NoEstanque);
                        $estanques->bindValue(3, $NoEstanque);
                        $estanques->bindValue(4, $NoEstanque);
                        $estanques->execute();

                        $data =array('data'=>array("Siembra Registrada.",1));
                    }
                }
            }
    
            echo json_encode($data); //json_encode
    
            $CNN = null; 
            
        } catch (PDOException $e){
            echo "Error: Agregar <br/>" . $e->getMessage();
            die();
        }
    }

    // No
    function Buscar_Especie(){
        try {
            
            include "conexion.php";
    
            if(isset($_POST['buscador'])){
                $valorbuscado = $_POST['buscador'];
                $html="";
                $boton="";

                if(empty($_POST['buscador'])){
                    $query = ("SELECT * FROM cliente WHERE estado = 1 ORDER BY idcliente DESC");
                    $resultado = $CNN->prepare($query);
                    $resultado->execute();
                    // $respuesta = $resultado->fetch(PDO::FETCH_ASSOC);

                    // if ($respuesta['idcliente'] > 0){                    
                    // }else{                        
                    //     exit;
                    // }

                    
                 }else{
                    $query = "SELECT * FROM cliente WHERE nombre LIKE ? AND estado = 1  ORDER BY nombre ASC";
                    $resultado = $CNN->prepare($query);
                    $resultado->bindValue(1,'%'.$valorbuscado.'%');
                    $resultado->execute();
                 }

                    while($datos = $resultado->fetch(PDO::FETCH_ASSOC)){

                            $boton = '<a href="#" id="'.$datos['idcliente'].'" class="btn_Eliminar" onclick="Marcar_eliminarRegistro(this)"><i class="fas fa-trash-alt"></i></a>';

                            $html.=
                            '<tr class="'.$datos['idcliente'].'">'
                            .'<td class="NoVer">'.$datos['idcliente']
                            .'</td><td>'.$datos['RTN']
                            .'</td><td><a href="#" id="'.$datos['idcliente'].'" class="Link_Editar" onclick="LLenarDatos(this);">'.$datos['nombre']
                            .'</a></td><td class="NoVer">'.$datos['correo']
                            .'</td><td class="NoVer">'.$datos['direccion']
                            .'</td><td>'.$datos['telefono']
                            .'</td><td class="NoVer">'.$datos['fecha_registro']
                            .'</td><td>'.$boton.'</td></tr>';
                    }
                    

                    if(empty($html)){
                        $html.='<tr><td colspan="8" id="userNoFound"> Usuario no Encontrado</td></tr>';
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

    // No
    function Buscar(){
        include "conexion.php";
        try {
            if(isset($_POST['NumID'])){
                $Id = $_POST['NumID'];
                $query = ('SELECT * FROM cliente WHERE idcliente = ?');
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
            echo "Ocurrio un Error, Busqueda Individual" . $e->getMessage();
            die();
        }
    }


    // No
    function Modificar(){
        try{
            include "conexion.php";        
            if(isset($_POST['vNombreCliente'])){
    
                $ID =$_POST['vID'];
                $rtn = $_POST['vRTN'];
                $correo = $_POST['vcorreoCliente'];
                $nombre = $_POST['vNombreCliente'];
                $telefonoCliente = $_POST['vtelefonoCliente'];
                $direccion = $_POST['vdireccion'];

                $resultado = $CNN->prepare("SELECT * FROM cliente WHERE idcliente=:idcliente");
                $resultado->bindValue(':idcliente', $ID); 
                $resultado->execute();
                $datos = $resultado->fetch(PDO::FETCH_ASSOC);
    
                if($datos['idcliente'] == $ID){
                        $registro = $CNN->prepare('UPDATE cliente SET nombre=:nombre, telefono=:telefonoCliente, correo=:correo, RTN=:rtn, direccion=:direccion WHERE idcliente=:ID');
                        $registro->bindValue(':rtn', $rtn); 
                        $registro->bindValue(':nombre', $nombre); 
                        $registro->bindValue(':correo', $correo); 
                        $registro->bindValue(':telefonoCliente', $telefonoCliente);
                        $registro->bindValue(':direccion', $direccion); 
                        $registro->bindParam(':ID', $ID); 
    
                        if($registro->execute()){
                            $data =array('data'=>array("El Cliente ".$nombre.", ha sido Modificado.",1));
                        }
                }else{
                    $data =array('data'=>array("Usuario ". $nombre ." No existe, intente con otro nombre.",2));
                }
            }
    
            echo jsonEncodeArray($data); //json_encode
    
            $CNN = null; 
            
        } catch (PDOException $e){
            echo $nombre . "<br>Hubo un error: Modificar" . $e->getMessage() . "<br>" ;
            die();
        }
    }

    // No
    function Eliminar(){
        try {
            include_once "conexion.php";
    
            if(isset($_POST['vID']) ){                
                
                $ID =$_POST['vID'];
    
                $resultado = $CNN->prepare("SELECT * FROM cliente WHERE idcliente=:ID");
                $resultado->bindValue(':ID', $ID); 
                $resultado->execute();
                $datos = $resultado->fetch(PDO::FETCH_ASSOC);

                // if($ID==1){
                //     $data =array('data'=>array("Cliente ". $datos['nombre'] ." No se puede Eliminar.",2));
                //     echo jsonEncodeArray($data);
                //     exit;
                // }
    
                if($datos['idcliente'] == $ID){
                    // $queryE = 'DELETE FROM usuario WHERE idcliente=:iduser';
                    $queryM = 'UPDATE cliente SET estado = 0 WHERE idcliente=:ID';
                    $registro = $CNN->prepare($queryM);
                    $registro->bindParam(':ID', $ID); 
    
                    if($registro->execute()){
                        $data =array('data'=>array("El Cliente ".$datos['nombre'].", ha sido Eliminado.",1));
                    }
                }else{
                    $data =array('data'=>array("Cliente ". $datos['nombre'] ." No existe, intente con otro nombre.",2));
                }
            }
            echo jsonEncodeArray($data);
            $CNN =null;
            
        } catch (PDOException $e) {
            echo "Hubo un error: Eliminar ".$e->getMessage();
        }
    }

    ?>