<?
include_once("menu.php");
include_once 'clases/conexion.php';

$rutValidate = $_GET['txtRut'];
$idFies = $_GET['hiddenFiesta'];
$rutsql = 0;

?>
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Validación de asistentes </div>
  <div class="card-body">
    <div class="table-responsive">


<?
$consulta = "SELECT * FROM asistencia WHERE rut='".$rutValidate."' and fiesta=".$idFies."";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");


while ($columna = mysqli_fetch_array( $resultado ))
{
  $rutsql =  $columna['rut'];
}

if (strcmp($rutValidate,  $rutsql) == 0){
  $inception=1;


 echo  "<div align=\"center\">Rut aceptado</div>";
 echo  "<div align=\"center\">".$rutsql." </div><br>";





  $sql = "UPDATE asistencia SET estado='1' WHERE rut='".$rutValidate."'";

if ($conexion->query($sql) === TRUE) {
  echo "<div align=\"center\">Grabado</div>";
  echo "<div align=\"center\"><br><br><a href='validate.php?selectFiesta=$idFies' class='btn btn-primary'>Volver</a></div>";

} else {
  echo "Error actualizando estado: " . $conexion->error;
}

} else {
  echo "<div align=\"center\">No está registrado para esta fiesta.</div>";
  echo "<div align=\"center\"><br><br><a href='validate.php?selectFiesta=$idFies' class='btn btn-primary'>Volver</a></div>";



}




mysqli_close( $conexion );
?>

</div>
</div>
</div>
