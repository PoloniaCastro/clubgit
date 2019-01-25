<?php
session_start();
include_once 'clases/conexion.php';

$correo = $_POST["txtCorreo"];
$contrasenia = $_POST['txtContrasenia'];
$_SESSION['correo'] = $correo;



$consulta1 = "SELECT * FROM rp WHERE correo = '$correo' ";
$resultado = mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
$fila = mysqli_fetch_array($resultado);
$scan = $fila[0];
if($scan ==0)
{
  echo "correo no existe";
}
else
{

  $consulta1 = "SELECT * FROM rp WHERE contrasenia = '$contrasenia' ";
  $resultado2 = mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
  while ($fila2 = mysqli_fetch_array( $resultado2 ))
  {

     $_SESSION['nombre']= $fila2['nombrerp'];
     $_SESSION['id2'] = $fila2['id'];
     $_SESSION['permisos'] = $fila2['permisos'];
     $_SESSION['empresa'] = $fila2['id_empresa'];
      header("location: index.php");
     //echo "hola".$_SESSION['nombre'];

  }
   {
    echo "Contraseña incorrecta";
  }
}



?>
