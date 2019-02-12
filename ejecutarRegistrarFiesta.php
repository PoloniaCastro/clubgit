<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");

$nombreFiesta = utf8_decode($_POST["txtNombreFiesta"]);
$lugar = utf8_decode($_POST["txtLugar"]);
$fecha = $_POST["txtFecha"];
$hora = $_POST["txtHora"];
$empresa = $_POST["SelectEmpresa"];
$idEmpresa = $_SESSION["empresa"];

$consulta = "INSERT INTO fiestas(nombre_fiesta, lugar_fiesta, fecha_fiesta,hora_fiesta, id_empresa)
VALUES ('".$nombreFiesta."', '".$lugar."', '".$fecha."', '".$hora."', '".$empresa."' )";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

$consulta2 = "SELECT id_fiesta FROM fiestas order by id_fiesta desc limit 0,1";
$resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la  3º consulta a la base de datos");
while ($columna2 = mysqli_fetch_array( $resultado2 ))
{
  $consulta3 = "SELECT id FROM rp";
  $resultado3 = mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la  3º consulta a la base de datos");
  while ($columna3 = mysqli_fetch_array( $resultado3 ))
  {
    $consulta4 = "INSERT INTO rp_fiestas(id, id_fiesta) VALUES ('".$columna3['id']."', '".$columna2['id_fiesta']."')";
    $resultado4= mysqli_query( $conexion, $consulta4 ) or die ( "Algo ha ido mal en la  3º consulta a la base de datos");
    if($resultado4)
    {
      echo "<script>
                 alert('Registro exitoso');
                 window.location= 'registrarFiesta.php'
     </script>";
    }
  }
}





?>
