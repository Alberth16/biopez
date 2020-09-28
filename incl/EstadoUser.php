<<<<<<< HEAD
<?php
	session_start();

	if(isset($_SESSION['Activo'])){
		if($_SESSION['Activo']['Rol'] != "1"){			
			if($_SESSION['Activo']['Rol'] != "2"){
				if($_SESSION['Activo']['Rol'] != "3"){
					if($_SESSION['Activo']['Rol'] != "4"){
						if($_SESSION['Activo']['Rol'] != "5"){
							header("location: ../");
						}
					}
				}
			}
		}
	}else{
		header("location: ../");
	}
=======
<?php
	session_start();

	if(isset($_SESSION['Activo'])){
		if($_SESSION['Activo']['Rol'] != "1"){			
			if($_SESSION['Activo']['Rol'] != "2"){
				if($_SESSION['Activo']['Rol'] != "3"){
					if($_SESSION['Activo']['Rol'] != "4"){
						if($_SESSION['Activo']['Rol'] != "5"){
							header("location: ../");
						}
					}
				}
			}
		}
	}else{
		header("location: ../");
	}
>>>>>>> 46c3a551dce152eaba9b556b8c12d0f590e58ca1
?>