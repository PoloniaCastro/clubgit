<?php
<<<<<<< HEAD

=======
//session_start();
>>>>>>> d1f55f4a0267caddf83689b8026d0a2c173120f9
include_once 'clases/conexion.php';

$correo = $_POST["txtCorreo"];
$contrasenia = $_POST['txtContrasenia'];
$_SESSION['correo'] = $correo;



$consulta1 = "SELECT * FROM rp WHERE correo = '$correo' and contrasenia = '$contrasenia' ";
$resultado = mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");


  //$consulta2 = "SELECT * FROM rp WHERE contrasenia = '$contrasenia' ";
  //$resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
  if($fila2 = mysqli_fetch_array( $resultado ))
  {
<<<<<<< HEAD
session_start();
=======
    session_start();
>>>>>>> d1f55f4a0267caddf83689b8026d0a2c173120f9
     $_SESSION['nombre']= $fila2['nombrerp'];
     $_SESSION['id2'] = $fila2['id'];
     $_SESSION['permisos'] = $fila2['permisos'];
     $_SESSION['empresa'] = $fila2['id_empresa'];
      header("location: index.php");


  }else {
    echo "<script>
               alert('contraseña o correo incorrectos');
               window.location= 'index.php'
   </script>";
  }

//$fila = mysqli_fetch_array($resultado);
//$scan = $fila[0];
//if($scan ==0)



?>
