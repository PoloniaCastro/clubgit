<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");

$nombreFiesta = utf8_decode($_POST["txtNombreFiesta"]);
$lugar = utf8_decode($_POST["txtLugar"]);
$fecha = $_POST["txtFecha"];
$hora = $_POST["txtHora"];
$ciudad = utf8_decode($_POST["txtCiudad"]);
$horaFinal = $_POST["txtHoraTermino"];
$calle = utf8_decode($_POST["txtDireccion"]);
$numero = $_POST["txtNumero"];
$comuna = utf8_decode($_POST["txtComuna"]);
$cantidadAsis = $_POST["txtCantidad"];
$empresa = $_POST["SelectEmpresa"];
$idEmpresa = $_SESSION["empresa"];
$evento = utf8_decode($_POST["txtEvento"]);
$tipoFiesta = utf8_decode($_POST["txtTipoFiesta"]);
$espacio = utf8_decode($_POST["txtEspacio"]);
$rango = utf8_decode($_POST["txtRango"]);

$consulta = "INSERT INTO fiestas(nombre_fiesta, lugar_fiesta, id_empresa, fecha_fiesta,hora_fiesta, ciudad_fiesta, hora_termino,
calle_fiesta, numero, comuna_fiesta, cantidad_asistentes, nombre_evento, inscripcion_automatica, tipo_fiesta, espacio, rango_etario)
VALUES ('".$nombreFiesta."', '".$lugar."', '".$empresa."', '".$fecha."', '".$hora."', '".$ciudad."', '".$horaFinal."',
'".$calle."', '".$numero."', '".$comuna."', '".$cantidadAsis."','".$evento."',"0" ,'".$tipoFiesta."','".$espacio."','".$rango."' )";
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
