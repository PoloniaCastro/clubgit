<?php

include_once 'clases/conexion.php';

$idAsistencia = $_GET['id_asistencia'];
$idFiesta = $_GET['selectFiesta'];


$consulta = "UPDATE asistencia SET estado = 1 where id_asistencia= '".$idAsistencia."' ";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

if($resultado)
{
  header("location: listarAsistentesAdmin.php?selectFiesta=".$idFiesta."");

}
?>
