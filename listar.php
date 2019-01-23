<<<<<<< HEAD
=======
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema Invitados</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

  
>>>>>>> 1f0e9b0bb3e307ca88436907ab019220b647a73a
<?
include_once("menu.php");
?>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Lista de asistentes</div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- form -->
                <form class="form" method="GET" action="listaE.php">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>RP</th>
                      <th>Repartidor</th>
                      <th>Asistencia</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>RP</th>
                      <th>Repartidor</th>
                      <th>Asistencia</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    include_once("clases/conexion.php");
                    	// Ejemplo de conexión a base de datos MySQL con PHP.
                    	//
                    	// Ejemplo realizado por Oscar Abad Folgueira: http://www.oscarabadfolgueira.com y https://www.dinapyme.com

                    	// Datos de la base de datos
                    	$rpapp = $_SESSION['id2'];

                    	// Selección del a base de datos a utilizar
                    	//$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
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

                        <td><a type='submit'style='color:black;' class='btn btn-primary btn-lg' href='ejecutarEliminarLista.php?id_asistencia=".$columna['id_asistencia']."&id_rp=".$rpapp." '>Eliminar</a></td></tr>  ";

                    	}






                    	mysqli_close( $conexion );
                        ?>
                  </tbody>
                </table>
                </form>
              </div>
            </div>
          <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Grupo Macer 2019</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
