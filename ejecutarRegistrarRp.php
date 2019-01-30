<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");

$nombreRp = $_POST["txtNombre"];
$correoRp = $_POST["txtCorreo"];
$contraseniaRp = $_POST["txtContrasenia"];
$contrasenia = sha1($contraseniaRp);
$nom = utf8_decode($nombreRp);

$consultaSelect = "SELECT * FROM rp where correo='$correoRp'";
$resultado2 = mysqli_query( $conexion, $consultaSelect ) or die ( "Algo ha ido mal en la consulta a la base de datos");
$fila = mysqli_fetch_array($resultado2);
$scan = $fila[0];
if($scan ==0)
{
  $consulta = "INSERT INTO rp (nombrerp, correo, contrasenia) VALUES ('".$nom."', '".$correoRp."', '".$contrasenia."')";
  $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

  if($resultado)
  {
    echo "<script>
               alert('Registro  de RP exitoso');
               window.location= 'registrarRp.php'
   </script>";
  }
}else {
  echo "<script>
             alert('Correo ya existe');
             window.location= 'registrarRp.php'
 </script>";
}


?>
