<?
include_once 'clases/conexion.php';


$id1 = $_GET['id_asistencia'];
$rp2 = $_GET['id_rp'];



  $consulta3 = "DELETE  FROM asistencia WHERE id_asistencia ='".$id1."' ";
  $resultado3 = mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos $id1");

  if($resultado3)
  {

    echo "<script>
               alert('ASISTENTE ELIMINADO');
               window.location= 'listar.php?rp=$rp2'
    </script>";


 }





?>
