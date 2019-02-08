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


$consulta = "UPDATE empresas SET  nombre_empresas = '".$nombre."', rut_empresas = '".$rutEm."', direccion_empresas ='".$direccionEm."', nombre_repr_legal='".$nomLegal."', telefono='".$telefonoEm."', correo_empresas='".$correoEm."'
WHERE id_empresas= '". $_SESSION['empresa']."'";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");


$consultaSelect = "SELECT id_empresas FROM empresas where id_empresas='".$_SESSION['empresa']."'";
$resultadoSelect = mysqli_query( $conexion, $consultaSelect ) or die ( "Algo ha ido mal en la consulta a la base de datos");
while ($columna = mysqli_fetch_array( $resultadoSelect ))
{
  $id_not = $columna['id_empresas'];

}
  if(is_uploaded_file($_FILES['imagen']['tmp_name']))
  {
      $imagen1 = $id_not."_1".".jpg";
      $ruta = "img/$imagen1";
      $imagen = "img/$imagen1";
      if(copy($_FILES['imagen']['tmp_name'], $imagen))
      {
      }
      $consultaUpdate = "UPDATE empresas set ruta_img='".$ruta."' where id_empresas= '".$_SESSION['empresa']."'";
      $resultadoUp = mysqli_query( $conexion, $consultaUpdate ) or die ( "Algo ha ido mal en la consulta a la base de datos");

      if($consultaUpdate)
      {
        echo "<script>
                   alert('Modificación exitosa');
                   
                   window.location= 'verEmpresa.php'
       </script>";
     }
  }






?>
