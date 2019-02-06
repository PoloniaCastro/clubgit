<?
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");

$nombre = utf8_decode($_POST["txtNombre"]);
$rutEm = $_POST["txtRut"];
$direccionEm = utf8_decode($_POST["txtDireccion"]);
$nomLegal = utf8_decode($_POST["txtNombreLegal"]);
$telefonoEm = $_POST["txtTelefono"];
$correoEm =$_POST["txtCorreo"];
$imagen = $_FILES["imagen"]["name"];//obtiene el nombre_empresas
$archivo = $_FILES["imagen"]["tmp_name"];//contiene el archivo
$ruta = "images";
$ruta=$ruta."/".$imagen; ///images/nombre.jpg

move_uploaded_file($archivo, $ruta);

$consulta = "UPDATE empresas SET  nombre_empresas = '".$nombre."', rut_empresas = '".$rutEm."', direccion_empresas ='".$direccionEm."', nombre_repr_legal='".$nomLegal."', telefono='".$telefonoEm."', correo_empresas='".$correoEm."', nombre_img ='".$imagen."', ruta_img ='".$ruta."'
WHERE id_empresas= '". $_SESSION['empresa']."'";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

if($resultado)
{
  echo "<script>
             alert('Modificación exitosa');
             window.location= 'verEmpresa.php'
 </script>";
}
?>
