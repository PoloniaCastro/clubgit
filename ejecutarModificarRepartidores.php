<?
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");

$nombreRepar = utf8_decode($_POST["txtNombreRepartidor"]);
$idRepartidor = $_POST["hiddenRepartidor"];

$consulta = "UPDATE repartidores SET nombre_repartidor ='".$nombreRepar."' where id_repartidor = '".$idRepartidor."'";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

if($resultado)
{
  echo "<script>
             alert('Modificación exitosa');
             window.location= 'listarRepartidores.php'
 </script>";
}
?>
