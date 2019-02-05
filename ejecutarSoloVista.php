<?
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");

$nombreValida = utf8_decode($_POST["txtNombre"]);
$correoValida = $_POST["txtCorreo"];
$contraseniaValida = md5($_POST["txtContrasenia"]);
$permisos = 2;

$consultaSelect = "SELECT * FROM rp where correo='$correoValida'";
$resultado2 = mysqli_query( $conexion, $consultaSelect ) or die ( "Algo ha ido mal en la consulta a la base de datos");
$fila = mysqli_fetch_array($resultado2);
$scan = $fila[0];
if($scan ==0)
{
  $consulta = "INSERT INTO rp (nombrerp, correo, contrasenia, permisos) VALUES ('".$nombreValida."', '".$correoValida."', '".$contraseniaValida."', '".$permisos."')";
  $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
  if($resultado)
  {
    echo "<script>
               alert('Registro  exitoso');
               window.location= 'registrarSoloVista.php'
   </script>";
  }
}
else {
  echo "<script>
             alert('Correo ya existe');
             window.location= 'registrarSoloVista.php'
 </script>";
}
?>
