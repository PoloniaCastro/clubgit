<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';

$idFiesta = $_GET['id_fiesta'];

$consulta = "UPDATE fiestas set inscripcion_automatica = 1 where id_fiesta = '".$idFiesta."'";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
if($resultado)
{
  echo "<script>
             alert('Fiesta añadida');

             window.location= 'inscripcionFiesta.php'
 </script>";
}
?>
