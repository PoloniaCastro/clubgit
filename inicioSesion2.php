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
  $fila2 = mysqli_fetch_array($resultado2);
  if($fila2)
  {

    header("location: s.php");
    //echo "hola ".$_SESSION['correo'];
    //echo "hola";
     $_SESSION['nombre']= $fila2['nombrerp'];
     //echo "hola".$_SESSION['nombre'];

  }
  else {
    echo "Contraseña incorrecta";
  }
}









//session_start();
//$_SESSION["rp"] = $correo;
//header("location: login.php");
//**




?>
