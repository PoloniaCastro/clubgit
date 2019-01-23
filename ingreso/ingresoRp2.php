<?
include_once 'clases/servicio.php';


$mensaje = "";
$cbbxi = $_POST["cmbi"];




session_start();
$_SESSION["rp"] = $cbbxi;
header("location: registro.php");



?>
