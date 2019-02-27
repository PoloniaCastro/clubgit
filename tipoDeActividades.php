<?php
require('fpdf/fpdf.php');
include_once("clases/conexion.php");
setlocale(LC_TIME, "spanish","es_ES@euro","es_ES","esp");
session_start();
$idFiesta = $_GET["id_fiesta"];

$consulta2 = "SELECT * FROM fiestas
inner join empresas on empresas.id_empresas= fiestas.id_empresa
WHERE `id_empresa`=".$_SESSION['empresa']." and id_fiesta = '".$idFiesta."'";
$resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos. ");

while ($columna2 = mysqli_fetch_array( $resultado2 ))
{
  $fecha_actual =  $columna2['fecha_fiesta'];
  //resto 2 semanas
  $fechaMenos= date("d-m-Y",strtotime($fecha_actual."- 2 week"));
  $fechaMes = date("m", strtotime($fecha_actual."- 2 week"));
  $fechaAnio =date("Y", strtotime($fecha_actual));
  $dia = date("d", strtotime($fecha_actual));
  $mesActual = date("m", strtotime($fecha_actual));
  $anioActual = date("Y", strtotime($fecha_actual));
  $fechafinale =date(' F Y', strtotime($fechaMenos));
  switch ($fechaMes||$mesActual) {
    case 01:$mes="Enero";  break;
    case 02:$mes="Febrero";break;
    case 03:$mes="Marzo";break;
    case 04:$mes="Abril";break;
    case 05:$mes="Mayo";break;
    case 06:$mes="Junio";break;
    case 07:$mes="Julio";break;
    case 0x8:$mes="Agosto";break;
    case 0x9:$mes="Septiembre";  break;
    case 0x10:$mes="Octubre";break;
    case 0x11:$mes="Noviembre";break;
    case 0x12:$mes="Diciembre";break;
    default:
      break;
  }
$timestamp = strtotime($columna2['hora_fiesta']);
$hora = date('H:i',$timestamp);
$horaF = strtotime($columna2['hora_termino']);
$horafinal = date('H:i',$horaF);

$mes = strtolower($mes);
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',11);
$espacio= "                                    ";
$ciudad =utf8_decode($columna2['ciudad_fiesta']);
$comuna= utf8_decode($columna2['comuna_fiesta']);
$lugar = utf8_decode($columna2['lugar_fiesta']);
$calle = utf8_decode($columna2['calle_fiesta']);
$evento =utf8_decode($columna2['nombre_evento']);
$empresa = utf8_decode($columna2['nombre_empresas']);
$cantidad = $columna2['cantidad_asistentes'];
$varEdadMin = "edad";
$varEdadMax ="edad";
$varEspacio =utf8_decode($columna2['espacio']);
$rutLegal =$columna2['rut_legal'];
$fijo= $columna2['telefono_fijo'];
$correo= utf8_decode($columna2['correo_empresas']);
$mini ="            ";
$tipoFiesta =utf8_decode($columna2['tipo_fiesta']);
$edad =utf8_decode($columna2['rango_etario']);
$pdf->Image('img/G_valparaiso.jpg',25,15,38,38);
$pdf->Cell(15,30,''.$espacio.''.$espacio.''.$espacio.''.strtoupper($comuna).', '.date("d").' '.$mes.' del '.$fechaAnio.'.',0,1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,15,utf8_decode(''),0,1);
$pdf->Cell(10,5,utf8_decode(''.$mini.'Señor'),0,1);
$pdf->Cell(10,5,utf8_decode(''.$mini.'Gobernador'),0,1);
$pdf->Cell(10,5,utf8_decode(''.$mini.'Provincial de valparaíso'),0,1);
$pdf->Cell(10,5,utf8_decode(''.$mini.'PRESENTE'),0,1);
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.'TIPO DE ACTIVIDAD(BREVE DESCRIPCIÓN):'),0,1);
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(10,5,utf8_decode(''.$mini.'(CONCIERTOS, CARNAVALES, FIESTAS, OTROS)'),0,1);
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.strtoupper($tipoFiesta).''),0,1);
$pdf->Cell(10,5,utf8_decode(''.$mini.'EVENTO PRIVADO DENOMINADO "'.strtoupper($evento).'"'),0,1);
$pdf->Cell(10,5,utf8_decode(''.$mini.'RANGO ETARIO DE '.strtoupper($edad).' AÑOS'),0,1);
$pdf->Cell(10,5,utf8_decode(''.$mini.'ACCESO CON INVITACIÓN'),0,1);
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.'LUGAR, ESPACIO O RECINTO:'),0,1);
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(10,5,utf8_decode(''.$mini.'RECINTO: '),0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.''.$mini.''.strtoupper($lugar).''),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.'DIRECCIÓN: '),0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.''.$mini.''.strtoupper($calle).''),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.'ESPACIO: '),0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.''.$mini.''.strtoupper($varEspacio).''),0,1);
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.'CIUDAD: '),0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.''.$mini.''.$mini.''.strtoupper($ciudad).''),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.'FECHA: '),0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.''.$mini.''.$mini.''.$dia.' DE '.strtoupper($mes).' DE '.$fechaAnio.''),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.'HORA DE INICIO: '),0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.''.$mini.''.$mini.''.$hora.' HRS. '),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.'HORA TÉRMINO: '),0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.''.$mini.''.$mini.''.$horafinal.' HRS. '),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.'AFORO: '),0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.''.$mini.''.$mini.''.$cantidad.' PERSONAS. '),0,1);
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.'RESPONSABLE: '),0,1);
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.'NOMBRE: '),0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.''.$mini.''.$mini.''.$mini.''.strtoupper($columna2['nombre_repr_legal']).'. ('.$rutLegal.')'),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.'ORGANIZACIÓN: '),0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.''.$mini.''.$mini.''.$mini.''.strtoupper($columna2['nombre_empresas']).''),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.'ACTIVIDAD: '),0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.''.$mini.''.$mini.''.$mini.''.strtoupper($columna2['nombre_evento']).''),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.'CÉDULA DE IDENTIDAD: '),0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.''.$mini.''.$mini.''.$mini.''.strtoupper($columna2['rut_empresas']).''),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.'DOMICILIO: '),0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.''.$mini.''.$mini.''.$mini.''.strtoupper($columna2['direccion_empresas']).''),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.'TELÉFONO RED FIJA: '),0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.''.$mini.''.$mini.''.$mini.''.$fijo.''),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.'TELÉFONO CELULAR: '),0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.''.$mini.''.$mini.''.$mini.''.$columna2['telefono'].''),0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.'EMAIL '),0,0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,utf8_decode(''.$mini.''.$mini.''.$mini.''.$mini.''.$correo.''),0,1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(10,5,''.$espacio.''.$mini.''.$mini.''.$mini.''.$mini.''.$mini.' FIRMA SOLICITANTE');


$pdf->Output();
}

?>
