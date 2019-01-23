<?php
include_once "conexion.php";
include_once "asistencia.php";

class servicio
{
  private $con;

  function __construct()
  {
    $this->con = new conexion();
  }

  public function ingresarUsuario($nombre, $rut)
  {

    $sql = "INSERT INTO asistencia (nombre, rut)"."VALUES ($nombre, $rut)";
    return $this->con->query($sql);
  }

  public function ingresarNombre($nombre)
  {

    $sql = "INSERT INTO ASISTENCIA (nombre)"."VALUES ($nombre)";
    return $this->con->query($sql);
  }







  public function validaRut($rut, $dv)
  {
    $rut = isset($_GET['txtRut']) ? $_GET['txtRut'] : null;
    $dv = isset($_GET['txtDv']) ? $_GET['txtDv'] : null;

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
      //echo "valido";
      return true;
    }else{
      //echo "no valido";
      return false;
    }

  }




  public function buscarRut($rut)
  {
    $sql = "SELECT count(*) FROM asistencia WHERE rut = '$rut'";
    $result = $this->con->query($sql);
    $fila = mysqli_fetch_array($result);
    $scan = $fila[0];
    if ($scan == 1)
    {
        return true;
    }
    return false;

  }
}

 ?>
