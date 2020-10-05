<?php
	session_start();
	if(isset($_SESSION['Activo'])){
		if($_SESSION['Activo']['Rol'] != "1"){
			if($_SESSION['Activo']['Rol'] != "2"){
				if($_SESSION['Activo']['Rol'] != "3"){
					header("location: ../");
					echo "No llego";
				}
			}
		}
	}else{
		header("location: ../");
		echo 'no ide';
	}
?>