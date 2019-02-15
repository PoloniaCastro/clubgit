<?
include_once("menu.php");
include_once("clases/conexion.php");
$idFiesta = $_GET["selectFiesta"];
?>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Reportes de asistentes</div>


            <div class="card-body">
              <div class="table-responsive">
                <!-- form -->
                <?
                $consulta3 = "SELECT count(*) as total from asistencia where estado= 1 and fiesta = '".$idFiesta."'" ;
                $resultado3 = mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos2.");

                $consulta4 = "SELECT count(*) as noFueron FROM asistencia where estado =0  and fiesta = '".$idFiesta."'";
                $resultado4 = mysqli_query( $conexion, $consulta4 ) or die ( "Algo ha ido mal en la consulta a la base de datos2.");
                $consulta2 = "SELECT count(*) as total from asistencia where fiesta = ".$idFiesta." ";
                $resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la 1º consulta a la base de datos.");


                while ($columna3 = mysqli_fetch_array( $resultado3 ))
                {
                  while($columna4 = mysqli_fetch_array( $resultado4 ) )
                  {
                    while ($columna2 = mysqli_fetch_array( $resultado2 ))
                  {

                echo "<h2> Usted tiene: ";
                echo  $columna3['total'];
                echo " invitados que asistieron</h2>";

                echo "<h2>".$columna4['noFueron'];
                echo " no asistieron </h2>";
                echo "<h4> Usted registró a ";
                echo  $columna2['total'];
                 echo " asistentes </h4>";

                  }
                }}
                ?>
                <form class="form" method="GET" action="ejecutarEliminarListaRp.php">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Cupo</th>
                      <th>Invitados</th>
                      <th>Asistentes</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>Cupo</th>
                      <th>Invitados</th>
                      <th>Asistentes</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php


                    	//$rpapp = $_SESSION['id2'];

                      $consulta1= "SELECT * FROM rp ";
                      $resultado1 = mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos.");
                      while ($columna = mysqli_fetch_array( $resultado1 ))
                    	{
                        $consulta2= "SELECT count(*) as total FROM asistencia where fiesta='".$idFiesta."' and rp='".$columna['id']."'";
                        $resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos.");
                        while ($columna2 = mysqli_fetch_array( $resultado2 ))
                      	{
                          $consulta3= "SELECT count(*) as total2 FROM asistencia where fiesta='".$idFiesta."' and estado=1 and rp='".$columna['id']."'";
                          $resultado3 = mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos.");
                          while ($columna3 = mysqli_fetch_array( $resultado3 ))
                        	{
                            echo "<tr><td>".utf8_encode($columna['nombrerp'])."</td><td>".utf8_encode($columna['limite'])."</td>

                            <td>".utf8_encode($columna2['total'])."</td>
                            <td>".utf8_encode($columna3['total2'])."</td></tr>  ";
                          }
                        }
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
