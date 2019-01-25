<?
include_once 'clases/conexion.php';

$idFiesta = $_GET['id_fiesta'];

  $consulta3 = "DELETE  FROM fiestas WHERE id_fiesta ='".$idFiesta."' ";
  $resultado3 = mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos $idFiesta");

  if($resultado3)
  {

    echo "<script>
               alert('FIESTA ELIMINADO');
               window.location= 'index.php'
    </script>";


 }





?>
