<!DOCTYPE html>
<?php
include_once("menu.php");
include_once 'clases/conexion.php';
$idFiesta = $_GET['id_fiesta'];

$consultaSelect = "SELECT * FROM rp where id!=1";
$resultado1 = mysqli_query( $conexion, $consultaSelect ) or die ( "Algo ha ido mal en la consulta a la base de datos ");
while ($columna = mysqli_fetch_array( $resultado1))
{
  $consulta = "DELETE  FROM rp_fiestas where id_fiesta= '".$idFiesta."' and id = '".$columna['id']."'";
  $resultado3 = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos ");
  if($resultado3)
  {
    echo "<script>
               alert('Bloqueo Exitoso');
               window.location= 'bloquearFiestasRp.php'
   </script>";
  }


}

?>
