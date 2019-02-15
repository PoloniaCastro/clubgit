<!DOCTYPE html>
<?php
include_once("menu.php");
include_once 'clases/conexion.php';
$idFiesta = $_GET['id_fiesta'];
$consultaSelect = "SELECT * FROM rp where id!=1";
$resultado1 = mysqli_query( $conexion, $consultaSelect ) or die ( "Algo ha ido mal en la consulta a la base de datos ");

$consulta2 = "SELECT count(*) FROM rp_fiestas where id_fiesta = '".$idFiesta."' and id !=1";
$resultado2= mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos ");
$fila = mysqli_fetch_array($resultado2);

$scan = $fila[0];
if($scan ==0)
{
  while ($columna = mysqli_fetch_array( $resultado1))
  {

      $consulta = "INSERT INTO rp_fiestas (id, id_fiesta) VALUES ('".$columna['id']."','".$idFiesta."')";
      $resultado3 = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos ");
      if($resultado3)
      {
        echo "<script>
                   alert('Acceso exitoso');
                   window.location= 'bloquearFiestasRp.php'
       </script>";

      }

    }
  }
else {
      echo "<script>
                 alert('Fiesta permitida anteriormente');
                 window.location= 'bloquearFiestasRp.php'
     </script>";
      }
