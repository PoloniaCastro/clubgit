<?
include_once 'clases/conexion.php';


$id1 = $_GET['id_asistencia'];
$rp2 = $_GET['id_rp'];




$conexion = mysqli_connect( $servidor, $usuario, "$password" ) or die ("No se ha podido conectar al servidor de Base de datos");

// Selección del a base de datos a utilizar
$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
// establecer y realizar consulta. guardamos en variable.






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
