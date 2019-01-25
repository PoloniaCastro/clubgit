<?
include_once 'clases/conexion.php';

$idRp = $_GET['id'];
//$rpId=  $_SESSION["id2"];


$consulta3 = "DELETE  FROM rp WHERE id ='".$idRp."' ";
$resultado3 = mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos $idRp");

  if($resultado3)
  {

    echo "<script>
               alert('REPARTIDOR ELIMINADO');
               window.location= 'listarRp.php'
    </script>";


 }





?>
