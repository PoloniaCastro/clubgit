<!DOCTYPE html>
<?php
include_once("menu.php");
$rpRegistro = 0;
$rpRegistro = $_SESSION["id2"];

?>


          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Registro de fiestas</div>

<?

if ($_SESSION['permisos']==1) {
  ?>

            <div class="card-body">
              <div class="table-responsive">
                <!-- form -->
                <form class="form" method="POST" action="ejecutarRegistrarFiesta.php">
                  <table  style="margin: 0 auto;">
                    <tr>
            <td>&nbsp;</td>

                    </tr>
                    <tr>
                      <td>Nombre de fiesta</td>
                      <td><input type="text" class="form-control" name="txtNombreFiesta" placeholder="Nombre"/></td>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
            <td>&nbsp;</td>

                    </tr>
                    <tr>
                      <td>Lugar</td>
                      <td><input type="text" style="width:300px;height:30px" class="form-control form-control- " name="txtLugar" placeholder="Ej: Viña del Mar"/></td>
                      </th>
                    </tr>
                    <tr>
            <td>&nbsp;</td>

                    </tr>
                    <tr>
                      <td>Fecha</td>
                      <td><input type="text" style="width:300px;height:30px" class="form-control form-control- " name="txtFecha" placeholder="AAAA-MM-DD"/></td>
                      </th>
                    </tr>
                    <tr>
            <td>&nbsp;</td>

                    </tr>
                    <tr>
                      <td>Hora</td>
                      <td><input type="text" style="width:300px;height:30px" class="form-control form-control- " name="txtHora" placeholder="HH:MM"/></td>
                      </th>
                    </tr>
                    <tr>
            <td>&nbsp;</td>

                    </tr>
                    <tr>
                      <td>Empresa</td>
                      <td><select name="SelectEmpresa">
                          
                          <?
                          include_once 'clases/conexion.php';
                              $consulta2 = "SELECT id_empresas, nombre_empresas FROM empresas ";
                              $resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");

                              while ($columna2 = mysqli_fetch_array( $resultado2 ))
                            {
                              if ($rpRegistro==$columna2['id_empresas'])
                              {
                                $varfea="selected";

                              }else {
                                $varfea="";
                              }
                              echo '<option '.$varfea.' value="'.$columna2['id_empresas'].'">'.$columna2['nombre_empresas'].'</option>';

                            }

                          ?>

                      </td>

                    <td>&nbsp;</td>
                    </tr>

                    <tr>
            <td>&nbsp;</td>

                    </tr>
                    <tr>
                      <td></td>
                      <td><div>
                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>

                      </div></td>
                      <th></th>
                    </tr>
                  </table>
                </form>
              </div>
            </div>
          <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->

          <?
}else{
          ?>
No tienes permiso para ver este contenido

<?
}
?>
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
