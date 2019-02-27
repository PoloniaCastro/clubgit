<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");

$nombreFiesta = utf8_decode($_POST["txtNombreFiesta"]);
$lugar = utf8_decode($_POST["txtLugar"]);
$fecha = $_POST["txtFecha"];
$hora = $_POST["txtHora"];
$empresa = $_POST["selectEmpresa"];
$idEmpresa = $_SESSION["empresa"];
$idFiesta = $_POST["id_fiesta"];

$nombreEvento = utf8_decode($_POST["txtNombreFiesta"]);
$ciudad = utf8_decode($_POST["txtCiudad"]);
$direccion =utf8_decode($_POST["txtDireccion"]);
$numero = $_POST["txtNumero"];
$comuna =utf8_decode($_POST["txtComuna"]);
$horaTermino = $_POST["txtHoraTermino"];
$cantidad = $_POST["txtCantidad"];
$fiesta = utf8_decode($_POST["txtFiesta"]);
$espacio = utf8_decode($_POST["txtEspacio"]);
$rango = utf8_decode($_POST["txtRango"]);

$consulta = "UPDATE fiestas SET nombre_fiesta ='".$nombreFiesta."', lugar_fiesta = '".$lugar."', id_empresa ='".$idEmpresa."', fecha_fiesta='".$fecha."',
hora_fiesta ='".$hora."', ciudad_fiesta ='".$ciudad."', hora_termino='".$horaTermino."', calle_fiesta='".$direccion."',
numero ='".$numero."', comuna_fiesta='".$comuna."', cantidad_asistentes='".$cantidad."', nombre_evento='".$nombreEvento."', espacio ='".$espacio."', rango_etario='".$rango."',
tipo_fiesta='".$fiesta."'
 WHERE id_fiesta = '".$idFiesta."'";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

if($resultado)
{
  echo "<script>
             alert('Modificación exitosa');
             window.location= 'registrarFiesta.php'
 </script>";
}

?>
