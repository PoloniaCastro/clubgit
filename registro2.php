<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';

$mensaje = "";

  //captura de Datos
 $nombre = $_POST["txtNombre"];

 $rut = $_POST["txtRut"];
 $dv = $_POST["txtDv"];
 $cbbxi = $_POST["cmb"];

$rutUnido=$rut."-".$dv;
/*
validación de rut
*/

  $rut = strrev($rut);
  $cant = strlen($rut);
  $c=0;
  $r = null;
  while($c<$cant)
  {
    $r[$c]=substr($rut,$c,1);
    $c++;
  }

  $ca=count($r);
  $m=2;
  $c2=0;
  $suma=0;
  while($c2<$ca)
  {
    $suma=$suma+($r[$c2]*$m);
    if($m==7)
    {
      $m=2;
    }
    else
    {
      $m++;
    }
      $c2++;
  }

  $resto=$suma%11;
  $digito=11-$resto;

  if($digito==10)
  {
    $digito="k";
  }else{
  if($digito==11)
  {
    $digito="0";
  }
  }

  if($dv==$digito)
  {
    $consulta1 = "SELECT count(*) FROM asistencia WHERE rut = '$rutUnido '";
    $resultado = mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    $fila = mysqli_fetch_array($resultado);

    $scan = $fila[0];
    if($scan ==0)
    {





              $consulta = "INSERT INTO asistencia(nombre, rut, rp) VALUES ('".$nombre."', '".$rutUnido."', '".$cbbxi."')";
              $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

              if($resultado)
              {
                echo "<script>
                           alert('Registro exitoso');
                           window.location= 'registrarAsistente.php?cmbi=$cbbxi'
               </script>";



              }
            }else {

              echo "<script>
                 alert('RUT YA INGRESADO ');
                 window.location= 'registrarAsistente.php?cmbi=$cbbxi'
                </script>";
              }

  }else{
    echo "<script>
         alert('Rut incorrecto');
         window.location= 'registrarAsistente.php?cmbi=$cbbxi'
        </script>";
  }

?>
