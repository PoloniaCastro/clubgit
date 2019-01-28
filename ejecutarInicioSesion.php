<?php

include_once 'clases/conexion.php';

$correo = $_POST["txtCorreo"];
$contrasenia = $_POST['txtContrasenia'];
$_SESSION['correo'] = $correo;



$consulta1 = "SELECT * FROM rp WHERE correo = '$correo' and contrasenia = '$contrasenia' ";
$resultado = mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");


  if($fila2 = mysqli_fetch_array( $resultado ))
  {

    session_start();

     $_SESSION['nombre']= $fila2['nombrerp'];
     $_SESSION['id2'] = $fila2['id'];
     $_SESSION['permisos'] = $fila2['permisos'];
     $_SESSION['empresa'] = $fila2['id_empresa'];
     $_SESSION['fiestas'] = $fila2['id_fiesta'];
      header("location: index.php");


  }else {
    echo "<script>
               alert('contraseña o correo incorrectos');
               window.location= 'index.php'
   </script>";
  }



?>
