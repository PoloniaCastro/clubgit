<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");

$nombreRp = utf8_decode($_POST["txtNombre"]);
$correoRp = $_POST["txtCorreo"];
$idFiesta = $_POST["SelectFiesta"];

$idrp = $_POST["hiddenRp"];

$consulta = "UPDATE rp SET nombrerp = '".$nombreRp."', correo = '".$correoRp."' WHERE id = '".$idrp."'";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

$consulta2 = "SELECT * FROM rp  order by id desc limit 0,1";
$resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
while ($columna2 = mysqli_fetch_array( $resultado2 ))
{
  $consulta3 = "UPDATE  rp_fiestas SET id_fiesta= '".$idFiesta."' where id = '".$idrp."'";
  $resultado3 = mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
  if($resultado3)
  {
    echo "<script>
               alert('Modificación exitosa');
               window.location= 'listarValidador.php'
   </script>";
  }
}


?>
