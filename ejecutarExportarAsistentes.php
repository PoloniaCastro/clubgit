<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");

$selectFiesta = $_POST["selectFiestaOrigen"];
$selectEstado = $_POST["selectEstado"];
$selectFiesDes = $_POST["selectFiestaDestino"];




$consultaSelect = "SELECT * FROM asistencia where fiesta = '".$selectFiesta."' and estado ='".$selectEstado."'";
$resultadoSelect = mysqli_query( $conexion, $consultaSelect ) or die ( "Algo ha ido mal en la consulta a la base de datos");
$fila = mysqli_fetch_array($resultadoSelect);
$scan = $fila[0];
while($scan !=0)

{
  $consulta = "INSERT INTO `asistencia`(id_asistencia, nombre, rut, rp, repartidor, estado, fiesta) VALUES ('','nombre','rut','rp','repartidor','estado','".$selectFiesDes."')";
  $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido malito en la consulta a la base de datos");

}




?>
