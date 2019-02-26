<?
include_once("menu.php");
include_once 'clases/conexion.php';
$mensaje = "";
$rpRegistro = 0;
$rpRegistro = $_SESSION["id2"];
$idEmpresa = $_SESSION["empresa"];
?>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Selecione la Fiesta</div>

            <div class="card-body">
              <div class="table-responsive">
                <!-- form -->
                <form class="form" method="GET" action="bloquearFiestaTodos.php">
                  <table class="table table-bordered">
                    <tr></tr>


                  </table>
                  <form class="form" method="GET" action=".php">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>

                      <tr>
                        <th>Fiestas para inscripción automática</th>
                        <th>Dar de Baja</th>


                      </tr>
                    </thead>

                    <tbody>

                      <?php

                        $consulta3= "SELECT * FROM fiestas  where inscripcion_automatica = 1";

                        $resultado3 = mysqli_query( $conexion, $consulta3 ) or die ( "Algo ha ido mal en la consulta a la base de datos.");


                      	while ($columna3 = mysqli_fetch_array( $resultado3 ))
                      	{

                      	  echo "<tr><td>".utf8_encode($columna3['nombre_fiesta'])."</td>

                          <td><a  type='submit'style='color:black;' class='btn btn-primary btn-lg' href='bloquearInscripciones.php?id_fiesta=".$columna3['id_fiesta']."'><i title='Bloquear' class='fas fa-times-circle'></i></a></td>

                          </tr>  ";

                      	}







                          ?>
                    </tbody>
                  </table>





                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>

                    <tr>
                      <th>Fiestas</th>
                      <th>Seleccionar</th>


                    </tr>
                  </thead>

                  <tbody>

                    <?php

                      $consulta1= "SELECT * FROM fiestas ";

                      $resultado1 = mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos.");


                    	while ($columna = mysqli_fetch_array( $resultado1 ))
                    	{

                    	  echo "<tr><td>".utf8_encode($columna['nombre_fiesta'])."</td>

                        <td><a  type='submit'style='color:black;' class='btn btn-primary btn-lg' href='inscripciones.php?id_fiesta=".$columna['id_fiesta']."'><i title='Selecionar' class='fas fa-check-circle'></i></a></td>

                        </tr>  ";

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
