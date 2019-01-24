<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';

$nombreRepartidor = $_POST["txtNombreRepartidores"];

$consulta = "INSERT INTO repartidores(nombre_repartidor) VALUES ('".$nombreRepartidor."')";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

if($resultado)
{
  echo "<script>
             alert('Registro exitoso');
             window.location= 'registrarRepartidores.php'
 </script>";



}

?>
