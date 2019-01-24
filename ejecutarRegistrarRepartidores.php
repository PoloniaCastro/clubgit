<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");
$nombreRepartidor = $_POST["txtNombreRepartidores"];
$rpId=  $_SESSION["id2"];

$consulta = "INSERT INTO repartidores(nombre_repartidor, id_rp) VALUES ('".$nombreRepartidor."', '".$rpId."' )";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

if($resultado)
{
  echo "<script>
             alert('Registro exitoso');
             window.location= 'registrarRepartidores.php'
 </script>";



}

?>
