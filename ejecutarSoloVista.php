<?
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");

$nombreValida = utf8_decode($_POST["txtNombre"]);
$correoValida = $_POST["txtCorreo"];
$contraseniaValida = md5($_POST["txtContrasenia"]);
$idFiesta = $_POST["SelectFiesta"];
$permisos = 2;

$consultaSelect = "SELECT * FROM rp where correo='$correoValida'";
$resultado2 = mysqli_query( $conexion, $consultaSelect ) or die ( "Algo ha ido mal en la consulta a la base de datos");
$fila = mysqli_fetch_array($resultado2);
$scan = $fila[0];
if($scan ==0)
{
  $consulta = "INSERT INTO rp (nombrerp, correo, contrasenia, permisos) VALUES ('".$nombreValida."', '".$correoValida."', '".$contraseniaValida."', '".$permisos."')";
  $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

  $consulta3 = "SELECT * FROM rp  order by id desc limit 0,1";
  $resultado3 = mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
  while ($columna2 = mysqli_fetch_array( $resultado3 ))
  {
    $consulta4 = "INSERT INTO rp_fiestas(id, id_fiesta) VALUES ('".$columna2['id']."', '".$idFiesta."')";
    $resultado4 = mysqli_query( $conexion, $consulta4 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    if($resultado4)
    {
      echo "<script>
                 alert('Registro  exitoso');
                 window.location= 'registrarSoloVista.php'
     </script>";
    }
  }


}
else {
  echo "<script>
             alert('Correo ya existe');
             window.location= 'registrarSoloVista.php'
 </script>";
}
?>
