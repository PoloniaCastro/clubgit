<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");

$nombreRp = $_POST["txtNombre"];
$correoRp = $_POST["txtCorreo"];
$contraseniaRp = $_POST["txtContrasenia"];
$contrasenia = md5($contraseniaRp);
$nom = utf8_decode($nombreRp);
$sinRepartidor = "Sin repartidor";
$repartidorAutomatico = utf8_decode("Automático");
$limite = $_POST["txtLimite"];

$consultaSelect = "SELECT * FROM rp where correo='$correoRp'";
$resultado2 = mysqli_query( $conexion, $consultaSelect ) or die ( "Algo ha ido mal en la consulta a la base de datos");
$fila = mysqli_fetch_array($resultado2);
$scan = $fila[0];
if($scan ==0)
{
  $consulta = "INSERT INTO rp (nombrerp, correo, contrasenia, limite) VALUES ('".$nom."', '".$correoRp."', '".$contrasenia."', '".$limite."')";
  $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

  $consulta2 = "SELECT id FROM rp order by id desc limit 0,1";
  $resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la  3º consulta a la base de datos");
  while ($columna = mysqli_fetch_array( $resultado2 ))
  {
    $consulta3 = "INSERT INTO repartidores(id_rp, nombre_repartidor) VALUES ('".$columna['id']."', '".$sinRepartidor."')";
    $resultado3 = mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la 4º consulta a la base de datos");
    if($columna['id'] == 1)
    {
      $consulta5 = "INSERT INTO repartidores(id_rp, nombre_repartidor) VALUES ('".$columna4['id']."', '".$repartidorAutomatico."')";
      $resultado5 = mysqli_query( $conexion, $consulta5 ) or die ( "Algo ha ido mal en la 6º consulta a la base de datos");
      if($resultado5)
      {
        echo "<script>
                   alert('Registro  de RP exitoso');
                   window.location= 'registrarRp.php'
       </script>";
      }
    }
      if($resultado3)
      {
        echo "<script>
                   alert('Registro  de RP exitoso');
                   window.location= 'registrarRp.php'
       </script>";
      }
    }






}else {
  echo "<script>
             alert('Correo ya existe');
             window.location= 'registrarRp.php'
 </script>";
}


?>
