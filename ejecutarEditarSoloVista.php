<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");

$nombreRp = utf8_decode($_POST["txtNombre"]);
$correoRp = $_POST["txtCorreo"];

$idrp = $_POST["hiddenRp"];

$consulta = "UPDATE rp SET nombrerp = '".$nombreRp."', correo = '".$correoRp."' WHERE id = '".$idrp."'";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

if($resultado)
{
  echo "<script>
             alert('Modificación exitosa');
             window.location= 'listarSoloVista.php'
 </script>";
}
?>
