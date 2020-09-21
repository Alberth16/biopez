<?php
    try {
        session_start();
        include_once "conexion.php";
        $log = $CNN->prepare("DELETE FROM cookies WHERE marca=:row1");
        $log->bindValue(':row1',$_COOKIE["MARK"]);
        $log->execute();

        if(isset($_COOKIE['REF']) && isset($_COOKIE['MARK'])){
            if($_COOKIE['REF']!="" || $_COOKIE['MARK']!=""){
                setcookie("REF", "", 0);
                setcookie("MARK", "", 0);

                unset($_COOKIE['REF']);
                unset($_COOKIE['MARK']);
                // $_SERVER['PHP_SELF'];
            }
        }

        unset($_SESSION['Activo']);
        session_unset();
        session_destroy();

        header('location: ../index.php');
        

    } catch (PDOException $e){
        echo "<br>Hubo un error: Salir" . $e->getMessage() . "<br>" ; 
        die();
    }