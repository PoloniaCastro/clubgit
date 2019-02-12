<!DOCTYPE html>
<?php
include_once("menu.php");
include_once 'clases/conexion.php';
$idFiesta = $_GET['id_fiesta'];
$idRp = $_GET['id'];

$consulta2 = "SELECT count(*) FROM rp_fiestas where id_fiesta = '".$idFiesta."' and id = '".$idRp."'";
$resultado2= mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos ");
$fila = mysqli_fetch_array($resultado2);

$scan = $fila[0];
if($scan ==0)
{
  $consulta = "INSERT INTO rp_fiestas (id, id_fiesta) VALUES ('".$idRp."','".$idFiesta."')";
  $resultado3 = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos ");
  if($resultado3)
  {
    echo "<script>
               alert('Acceso Exitoso');
               window.location= 'fiestaSoloVista.php?id=$idRp'
   </script>";
  }
}
else {
  echo "<script>
             alert('Fiesta permitida anteriormente');
             window.location= 'fiestaSoloVista.php?id=$idRp'
 </script>";
}
