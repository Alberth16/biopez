<?php
    include "../incl/EstadoUser.php";
    // session_start();
	if(isset($_SESSION['Activo'] )){		
		switch($_SESSION['Activo']['rol']){
            case  1:
                //header('location: ../pgs/menu.php');
                break;
            case  2:
                header('location: ../pgs/menu.php');
                break;
            case  3:
                header('location: ../pgs/menu.php');
                break;
            case  4:
                header('location: ../pgs/menu.php');
                break;
        }
    }

