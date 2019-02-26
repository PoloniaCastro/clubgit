<?php
include_once 'clases/servicio.php';
include_once 'clases/conexion.php';
include_once("menu.php");
$mensaje = "";

  //captura de Datos
 $nombre = utf8_decode($_POST["txtNombre"]);

 $rut = $_POST["txtRut"];
 $dv = $_POST["txtDv"];

 $varRepartidor = "Sin Repartidor";
 $varFiesta = $_POST["id_fiesta"];
 //$idEmpresa = $_SESSION["empresa"];

$varAutoma = utf8_decode("Automático");

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
    $consulta1 = "SELECT count(*) FROM asistencia WHERE rut = '$rutUnido' and fiesta='$varFiesta' ";
    $resultado = mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    $fila = mysqli_fetch_array($resultado);

    $scan = $fila[0];
    if($scan ==0)
    {
        //inicio
            $consulta3 = "SELECT * FROM repartidores where nombre_repartidor= '".$varAutoma."' and id_rp =1";
            $resultado3 = mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos");
            while ($columna3 = mysqli_fetch_array( $resultado3 ))
            {
              $consulta = "INSERT INTO asistencia(nombre, rut, rp, repartidor, fiesta) VALUES ('".$nombre."', '".$rutUnido."', 1, '".$columna3['id_repartidor']."', '".$varFiesta."')";
              $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

              if($resultado)
              {
                echo "<script>
                           alert('Registro exitoso');
                             window.location= 'index.php'
               </script>";



              }
            }








        //final





      }else {

              echo "<script>
                 alert('El rut ya existe');
                   window.location= 'index.php'
                </script>";
              }

  }else{
    echo "<script>
         alert('Rut incorrecto');
         window.location= 'inscripcionAutomatica.php?id_fiesta=$varFiesta'
        </script>";
  }

?>
