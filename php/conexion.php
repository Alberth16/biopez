<?php
    function jsonEncodeArray( $array ){
		array_walk_recursive( $array, function(&$item) { 
		   $item = utf8_encode( $item ); 
		});
		return json_encode( $array, JSON_NUMERIC_CHECK | JSON_PRESERVE_ZERO_FRACTION | JSON_FORCE_OBJECT);
	};

	try{
		// $dbname = 'id12220197_facturar';
		// $User = 'id12220197_alberth16';
		// $Pass = 'Macarena1';

        $dbname = 'biopez';
		$User = 'root';
		$Pass = '';

		$CNN = new PDO('mysql:host=localhost;dbname='.$dbname, $User, $Pass );
        $CNN->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	} catch (PDOException $e){
		Print "Hubo un error: " . $e->getMessage() . "" ; 
		die();
	}