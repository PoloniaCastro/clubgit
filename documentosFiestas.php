<?
include_once("menu.php");
$idEmpresa = $_SESSION["empresa"];
$rpRegistro = $_SESSION["id2"];
?>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Lista General de Asistentes</div>
            <div class="card-body">
              <div class="table-responsive">

                <!-- form -->
                <form class="form" method="GET" action="intendencia.php">
                  <table  style="margin: 0 auto;">
                    <tr>
                      <td>Fiesta</td>
                      <td><select name="selectFiesta">
                          <option value="0">Seleccione</option>
                          <?
                          include_once 'clases/conexion.php';
                              $consulta2 = "SELECT * FROM fiestas
                              inner join rp_fiestas on rp_fiestas.id_fiesta = fiestas.id_fiesta
                              where id_empresa= '".$idEmpresa."' and id = $rpRegistro ";

                              //$consulta2 = "select id_repartidor, nombre_repartidor from repartidores where id_rp='".$rpRegistro."' ";
                              $resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");

                              while ($columna2 = mysqli_fetch_array( $resultado2 ))
                            {
                              if ($idEmpresa==$columna2['id_fiesta'])
                              {
                                $varfea="selected";

                              }else {
                                $varfea="";
                              }
                              echo '<option '.$varfea.' value="'.$columna2['id_fiesta'].'">'.utf8_encode($columna2['nombre_fiesta']).'</option>';

                            }





                          ?>



                      </td>

                    <td>&nbsp;</td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                      <td></td>
                      <td><button type="submit" class="btn btn-primary btn-lg">Ver</button></td>

                    </tr>
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
