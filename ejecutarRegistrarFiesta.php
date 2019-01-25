<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");

$nombreFiesta = $_POST["txtNombreFiesta"];
$lugar = $_POST["txtLugar"];
$fecha = $_POST["txtFecha"];
$hora = $_POST["txtHora"];
$empresa = $_POST["SelectEmpresa"];
$idEmpresa = $_SESSION["empresa"];

$consulta = "INSERT INTO fiestas(nombre_fiesta, lugar_fiesta, fecha_fiesta,hora_fiesta, id_empresa)
VALUES ('".$nombreFiesta."', '".$lugar."', '".$fecha."', '".$hora."', '".$empresa."' )";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

if($resultado)
{
  echo "<script>
             alert('Registro exitoso');
             window.location= 'registrarFiesta.php'
 </script>";
}

?>
