<?php
	session_start();
<<<<<<< HEAD
	if(isset($_SESSION['Activo'])){
		if($_SESSION['Activo']['Rol'] != "1"){
			if($_SESSION['Activo']['Rol'] != "2"){
				if($_SESSION['Activo']['Rol'] != "3"){
					header("location: ../");
					echo "No llego";
=======

	if(isset($_SESSION['Activo'])){
		if($_SESSION['Activo']['Rol'] != "1"){			
			if($_SESSION['Activo']['Rol'] != "2"){
				if($_SESSION['Activo']['Rol'] != "3"){
					if($_SESSION['Activo']['Rol'] != "4"){
						if($_SESSION['Activo']['Rol'] != "5"){
							header("location: ../");
						}
					}
>>>>>>> 77ada48a42f540a3402ade30cfd3619cf2f4a52e
				}
			}
		}
	}else{
		header("location: ../");
<<<<<<< HEAD
		echo 'no ide';
=======
>>>>>>> 77ada48a42f540a3402ade30cfd3619cf2f4a52e
	}
?>