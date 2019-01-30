<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");

$selectFiesta = $_POST["selectFiestaOrigen"];
$selectEstado = $_POST["selectEstado"];
$selectFiesDes = $_POST["selectFiestaDestino"];





$consultaSelect = "SELECT id_asistencia, nombre, rut, rp, repartidor, estado, fiesta FROM asistencia where fiesta = '".$selectFiesta."' and estado ='".$selectEstado."'";
$resultadoSelect = mysqli_query( $conexion, $consultaSelect ) or die ( "Algo ha ido mal en la consulta a la base de datos");
while($fila = mysqli_fetch_array($resultadoSelect))
{
  $consultaRut = "SELECT rut FROM asistencia ";
  $resultado = mysqli_query($conexion, $consultaRut) or die ( "Algo ha ido mal en la consulta a la base de datos");
  while($fila2 = mysqli_fetch_array($resultado))
  {
    $rutConsulta = $fila2['rut'];
    $rutConsulta2 = $fila['rut'];
    if(strcmp($rutConsulta,$fila['rut']) ===0)
    {
echo $rutConsulta;
      }

    else
    {
      $consulta = "INSERT INTO `asistencia`(id_asistencia, nombre, rut, rp, repartidor, estado, fiesta) VALUES ('','".$fila['nombre']."','".$fila['rut']."','".$fila['rp']."','".$fila['repartidor']."','".$fila['estado']."','".$selectFiesDes."')";
      $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido malito en la consulta a la base de datos");
      if($resultado)
      {
        echo "<script>
                   alert('Modificación exitosa $rutConsulta2 ');
                   window.location= 'exportarAsistentes.php'
       </script>";
    }
   }
}//fin 2do while

}//fin while
echo "<script>
           alert('No se pudo realizar la operación, verifique campos');
           window.location= 'exportarAsistentes.php'
</script>";


?>
