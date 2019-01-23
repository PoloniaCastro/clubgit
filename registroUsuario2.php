<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
//captura de Datos
$nombre = $_POST["txtNombre"];
$correo = $_POST["txtCorreo"];
$contrasenia = $_POST["txtContrasenia"];
$pass = sha1($contrasenia);

$consulta1 = "SELECT count(*) FROM rp WHERE correo = '$correo'" ;
$resultado = mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
$fila = mysqli_fetch_array($resultado);

$scan = $fila[0];
if($scan ==0)
{
  $consulta = "INSERT INTO rp(nombrerp, correo, contrasenia) VALUES ('".$nombre."', '".$correo."', '".$pass."')";
  $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
  if($resultado)
  {
    echo "hola";
    //header("location: ingreso/registro.php");



  }
}
else
{
  echo "<script>
     alert('Correo ya existe');
     window.location= 'registroUsuario.php'
    </script>";
}

?>
