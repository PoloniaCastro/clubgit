<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");

$nombreAsis = $_POST["txtNombre"];
//$rutAsist = $_POST["txtRut"];
$repartidorAsis = $_POST["SelectRepartidor"];
$fiestaAsis = $_POST["SelectFiesta"];
$idAsistentes = $_POST["id_asistente"];

$consulta = "UPDATE asistencia SET nombre = '".$nombreAsis."', repartidor = '".$repartidorAsis."', fiesta ='".$fiestaAsis."' WHERE id_asistencia = '".$idAsistentes."'";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

if($resultado)
{
  echo "<script>
             alert('Modificación exitosa');
             window.location= 'listar.php'
 </script>";
}

?>
