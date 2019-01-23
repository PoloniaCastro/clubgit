<?php



     $servidor = "localhost";
     $usuario = "root";//grupomac_club
     $password = "";//Martina13*
     $basededatos = "grupomac_club";
     $link;


    $conexion = mysqli_connect( $servidor, $usuario, "$password" ) or die ("No se ha podido conectar al servidor de Base de datos");

    	// Selección del a base de datos a utilizar
    	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

?>
