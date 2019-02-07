<?
include_once 'clases/conexion.php';
$idValidador = $_GET["id"];

$consulta ="DELETE FROM rp where id = '".$idValidador."'";
$resultado3 = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos $idRepartidor");

  if($resultado3)
  {

    echo "<script>
               alert('VALIDADOR ELIMINADO');
               window.location= 'listarSoloVista.php'
    </script>";


 }
?>
