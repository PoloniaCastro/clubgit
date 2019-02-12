<?
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");

$permisos= $_POST["selectPermisos"];
$idrp = $_POST["hiddenRp"];



$consulta = "UPDATE rp set permisos = '".$permisos."' WHERE id = '".$idrp."'";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

if($resultado)
{
  echo "<script>
             alert('Modificación exitosa');
             window.location= 'permisosRp.php'
 </script>";
}
?>
