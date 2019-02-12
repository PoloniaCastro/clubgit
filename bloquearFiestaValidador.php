<!DOCTYPE html>
<?php
include_once("menu.php");
include_once 'clases/conexion.php';
$idFiesta = $_GET['id_fiesta'];
$idRp = $_GET['id'];


$consulta = "DELETE  FROM rp_fiestas where id_fiesta= '".$idFiesta."' and id='".$idRp."'";
$resultado3 = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos ");
if($resultado3)
{
  echo "<script>
             alert('Bloqueo Exitoso');
             window.location= 'fiestasValidador.php?id=$idRp'
 </script>";
}

?>
