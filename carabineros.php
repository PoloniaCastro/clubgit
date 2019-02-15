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
$comuna= utf8_decode($columna2['comuna_fiesta']);
$lugar = utf8_decode($columna2['lugar_fiesta']);
$calle = utf8_decode($columna2['calle_fiesta']);
$evento =utf8_decode($columna2['nombre_evento']);
$empresa = $columna2['nombre_empresas'];
$cantidad = $columna2['cantidad_asistentes'];
$mini ="           ";

$pdf->Cell(15,30,''.$espacio.''.$espacio.''.$espacio.''.strtoupper($comuna).', '.$mes.' del '.$fechaAnio.'.',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,5,utf8_decode('SEÑORES'),0,1);
$pdf->Cell(10,5,'PREFECTURA DE CARABINEROS DE '.strtoupper($comuna).'',0,1);
$pdf->Cell(10,5,'PRESENTE.',0,1);
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(10,5,utf8_decode('De mi consideración:'),0,2);
$pdf->Cell(10,5,'',0,1,'C');
$pdf->Cell(10,5,'',0,1);


$pdf->MultiCell(190,5,utf8_decode(''.$espacio.'Informo a Ud., que el día '.$dia.' de '.$mes.' del '.$anioActual.', a contar de las '.$hora.' horas y hasta las '.$horafinal.' horas del día siguiente, se realizará en el '.$lugar.', ubicado
en calle ' .$calle.' de la comuna de '.$comuna.', el evento denominado "'.strtoupper($evento).'", producido por la empresa '.$empresa.', Rut Nº '.$columna2['rut_empresas'].' y con la presencia de '.$cantidad.' personas.'));
$pdf->Cell(50,5,'',0,1);
$pdf->MultiCell(190,5,utf8_decode(''.$espacio.'Que, para llevar a cabo dicho evento, se ha cumplido con los diversos trámites de solicitudes de permisos e informar a las autoridades administrativas, salud, emergencias y Carabineros,
estando en trámite el envío de la Directiva de Funcionamiento a la Autoridad Fiscalizadora OS-10 al contarse con servicios de Guardias de Seguridad Privados provistos por una empresa debidamente autorizada para asegurar el desarrollo de este evento.'));
$pdf->Cell(10,5,'',0,1);
$pdf->MultiCell(170,5,utf8_decode(''.$espacio.''.$mini.''.$mini.' Es cuanto se informa para su conocimiento.'));
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(10,5,''.$espacio.''.$mini.''.$mini.' Saluda atentamente a UD.');


$pdf->Output();
}
?>
