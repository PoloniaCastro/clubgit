<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");
$nombreRepartidor = $_POST["txtNombreRepartidores"];
$rpId=  $_SESSION["id2"];
$idEmpresa = $_SESSION["empresa"];

$consulta = "INSERT INTO repartidores(nombre_repartidor, id_rp,id_empresa ) VALUES ('".$nombreRepartidor."', '".$rpId."', '".$idEmpresa."' )";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

if($resultado)
{
  echo "<script>
             alert('Registro exitoso');
             window.location= 'registrarRepartidores.php'
 </script>";



}

?>
