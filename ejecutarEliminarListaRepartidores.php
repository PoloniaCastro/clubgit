<?
include_once 'clases/conexion.php';

$idRepartidor = $_GET['id_repartidor'];
//$rpId=  $_SESSION["id2"];


$consulta3 = "DELETE  FROM repartidores WHERE id_repartidor ='".$idRepartidor."' ";
$resultado3 = mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos $idRepartidor");

  if($resultado3)
  {

    echo "<script>
               alert('REPARTIDOR ELIMINADO');
               window.location= 'listarRepartidores.php'
    </script>";


 }





?>
