<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



    </head>
<body>
<form class="form" method="GET" action="listaE.php">
    <img src="club.png">
    <div class="container">

<table class="table">
  <thead>
    <tr>

      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">RP</th>
      <th scope="col">Repartidor</th>
      <th scope="col">Asistencia</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>





<?php
	// Ejemplo de conexión a base de datos MySQL con PHP.
	//
	// Ejemplo realizado por Oscar Abad Folgueira: http://www.oscarabadfolgueira.com y https://www.dinapyme.com

	// Datos de la base de datos
	$rpapp = $_GET['rp'];
	$usuario = "grupomac_club";
	$password = "Martina13*";
	$servidor = "localhost";
	$basededatos = "grupomac_club";
	$inception = 0;
	$rutsql=0;
	//$token = $rutapp2;
    	// creación de la conexión a la base de datos con mysql_connect()
	$conexion = mysqli_connect( $servidor, $usuario, "$password" ) or die ("No se ha podido conectar al servidor de Base de datos");

	// Selección del a base de datos a utilizar
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
	// establecer y realizar consulta. guardamos en variable.
	$consulta = "select * from asistencia inner join rp on rp.id=asistencia.rp inner join estate on estate.id=asistencia.estado WHERE rp=".$rpapp." ORDER BY repartidor DESC, estado DESC";
	$consulta2 = "SELECT count(*) as total from asistencia WHERE `estado`=1 and rp=".$rpapp."";
	$resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos.");
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");




		while ($columna2 = mysqli_fetch_array( $resultado2 ))
	{

	  echo "<h1> Usted tuvo ";
	  echo  $columna2['total'];
     echo " asistentes </h1>";
	}


	while ($columna = mysqli_fetch_array( $resultado ))
	{
	  $rutsql =  $columna['rut'];

	  echo "<tr><td>".utf8_encode($columna['nombre'])."</td><td>".utf8_encode($columna['apellido'])."</td><td>".$columna['nombrerp']."</td><td>".$columna['repartidor']."</td><td>".$columna['estate']."</td>

    <td><a type='submit'style='color:black;' class='btn btn-primary btn-lg' href='listaE.php?id_asistencia=".$columna['id_asistencia']."&id_rp=".$rpapp." '>Eliminar</a></td></tr>  ";

	}






	mysqli_close( $conexion );
    ?>
  </tbody>
</table>

</div>

</form>
</body>

</html>
