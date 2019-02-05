<?
include_once("menu.php");
$idEmpresa = $_SESSION["empresa"];
$idFiesta= $_GET["SelectFiesta"];
?>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Lista de asistentes</div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- form -->
                <form class="form" method="GET" action=".php">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>

                      <th>RP</th>
                      <th>Repartidor</th>
                      <th>fiesta</th>
                      <th>asistencia</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>

                      <th>RP</th>
                      <th>Repartidor</th>
                      <th>fiesta</th>
                      <th>asistencia</th>
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

                      $consulta = "select * from asistencia
                      inner join rp on rp.id=asistencia.rp
                       inner join estate on estate.id=asistencia.estado
                       inner join repartidores as re on re.id_repartidor = asistencia.repartidor
                       inner join fiestas on fiestas.id_fiesta = asistencia.fiesta
                        WHERE rp=".$rpapp." and id_fiesta = ".$idFiesta."
                       ORDER BY repartidor DESC, estado DESC";
                    	$consulta2 = "SELECT count(*) as total from asistencia WHERE `estado`=1 and rp=".$rpapp." and fiesta= ".$idFiesta." ";
                    	$resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos.");
                    	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

  	$consulta3 = "SELECT count(*) as total from asistencia WHERE rp=".$rpapp." and fiesta = ".$idFiesta."";

	$resultado3 = mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos2.");
		while ($columna3 = mysqli_fetch_array( $resultado3 ))
	{

	  echo "<h3> Usted tiene ";
	  echo  $columna3['total'];
     echo " invitados </h3>";
	}


                    		while ($columna2 = mysqli_fetch_array( $resultado2 ))
                    	{

                    	  echo "<h3> Usted tuvo ";
                    	  echo  $columna2['total'];
                         echo " asistentes </h3>";
                    	}


                    	while ($columna = mysqli_fetch_array( $resultado ))
                    	{


                    	  $rutsql =  $columna['rut'];

                    	  echo "<tr><td>".utf8_encode($columna['nombre'])."</td><td>".utf8_encode($columna['nombrerp'])."</td><td>".utf8_encode($columna['nombre_repartidor'])."</td><td>".utf8_encode($columna['nombre_fiesta'])."</td><td>".utf8_encode($columna['estate'])."</td>

                        <td><a OnClick='confirmar(event)'  type='submit'style='color:black;' class='btn btn-primary btn-lg' href='ejecutarEliminarLista.php?id_asistencia=".$columna['id_asistencia']."&id_rp=".$rpapp." '>Eliminar</a>
                        <a  type='submit' style='color:black;''  class='btn btn-primary btn-lg' href='editarAsistentes.php?id_asistencia=".$columna['id_asistencia']."'> Editar </a></td></tr>  ";

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


    <script src="confirmacion.js"></script>


  </body>

</html>
