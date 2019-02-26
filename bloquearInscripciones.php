<!DOCTYPE html>
<?php
include_once("menu.php");
include_once 'clases/conexion.php';
$idFiesta = $_GET['id_fiesta'];


$consulta = "UPDATE fiestas set inscripcion_automatica = 0 where id_fiesta = '".$idFiesta."'";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
if($resultado)
{
  echo "<script>
             alert('Fiesta Bloqueada');

             window.location= 'inscripcionFiesta.php'
 </script>";
}

?>
