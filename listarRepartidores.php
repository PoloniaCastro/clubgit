<?
include_once("menu.php");
?>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Lista de repartidores</div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- form -->
                <form class="form" method="GET" action="ejecutarEliminarListaRepartidores.php">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>

                      <th>RP</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>

                      <th>RP</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    include_once("clases/conexion.php");

                    	$rpapp = $_SESSION['id2'];

                      $consulta1= "SELECT * FROM repartidores
                      inner join rp on rp.id = repartidores.id_rp where id_rp = ".$rpapp."
                      ORDER by id_rp DESC";
                      $resultado1 = mysqli_query( $conexion, $consulta1 ) or die ( "Algo ha ido mal en la consulta a la base de datos.");


                    	while ($columna = mysqli_fetch_array( $resultado1 ))
                    	{


                    	  echo "<tr><td>".utf8_encode($columna['nombre_repartidor'])."</td><td>".utf8_encode($columna['nombrerp'])."</td>

                        <td><a OnClick='confirmar(event)' type='submit'style='color:black;' class='btn btn-primary btn-lg' href='ejecutarEliminarListaRepartidores.php?id_repartidor=".$columna['id_repartidor']." &id_rp=".$rpapp."'>Eliminar</a></td></tr>  ";

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
