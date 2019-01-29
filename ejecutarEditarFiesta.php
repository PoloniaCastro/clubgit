<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");

$nombreFiesta = $_POST["txtNombreFiesta"];
$lugar = $_POST["txtLugar"];
$fecha = $_POST["txtFecha"];
$hora = $_POST["txtHora"];
$empresa = $_POST["selectEmpresa"];
$idEmpresa = $_SESSION["empresa"];
$idFiesta = $_POST["id_fiesta"];

$consulta = "UPDATE fiestas SET nombre_fiesta = '".$nombreFiesta."', lugar_fiesta = '".$lugar."', fecha_fiesta ='".$fecha."', hora_fiesta='".$hora."', id_empresa ='".$idEmpresa."' WHERE id_fiesta = '".$idFiesta."'";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

if($resultado)
{
  echo "<script>
             alert('Modificación exitosa');
             window.location= 'registrarFiesta.php'
 </script>";
}

?>
