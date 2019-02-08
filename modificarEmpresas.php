<!DOCTYPE html>
<?php
include_once("menu.php");
include_once 'clases/conexion.php';
$mensaje = "";
$rpRegistro = 0;
$rpRegistro = $_SESSION["id2"];
$idEmpresa = $_SESSION["empresa"];
//$idRp = $_GET['id'];

?>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Modificación De Empresa</div>

            <?
            $consultaEmpresas = "SELECT * FROM empresas where id_empresas = '".$idEmpresa."'";
            $resultadoEmpresas = mysqli_query( $conexion, $consultaEmpresas ) or die ( "Algo ha ido mal en la consulta a la base de datos");
            while ($columnaEmpresa = mysqli_fetch_array( $resultadoEmpresas )) {

            ?>

            <div class="card-body">
              <div class="table-responsive">
                <!-- form -->
                <form class="form" enctype="multipart/form-data" method="POST" action="ejecutarModificarEmpresas.php">
                  <table  style="margin: 0 auto;">
                    <tr>
            <td>&nbsp;</td>

                    </tr>
                    <tr>
                      <td>Nombre</td>
                      <td><input type="text" class="form-control" name="txtNombre" required  placeholder="Nombre" value="<? echo utf8_encode($columnaEmpresa['nombre_empresas']); ?>"/></td>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
            <td>&nbsp;</td>

                    </tr>
                    <tr>
                      <td>Rut</td>
                      <td><input type="text" class="form-control" name="txtRut" required  placeholder="Rut" value="<? echo utf8_encode($columnaEmpresa['rut_empresas']); ?>"/></td>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
            <td>&nbsp;</td>

                    </tr>
                    <tr>
                      <td>Dirección</td>
                      <td><input type="text" class="form-control" name="txtDireccion" required  placeholder="Direccion" value="<? echo utf8_encode($columnaEmpresa['direccion_empresas']); ?>"/></td>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
            <td>&nbsp;</td>

                    </tr>
                    <tr>
                      <td>Nombre Representante Legal</td>
                      <td><input type="text" class="form-control" name="txtNombreLegal" required  placeholder="Nombre Representante Legal" value="<? echo utf8_encode($columnaEmpresa['nombre_repr_legal']); ?>"/></td>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
            <td>&nbsp;</td>

                    </tr>
                    <tr>
                      <td>Teléfono</td>
                      <td><input type="text" class="form-control" name="txtTelefono" required  placeholder="123456789" value="<? echo utf8_encode($columnaEmpresa['telefono']); ?>"/></td>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
            <td>&nbsp;</td>

                    </tr>
                    <input  type="hidden" class="form-control" name="hiddenRp"  value="<?=$idRp?>"/>

                    <tr>
                      <td>Correo</td>
                      <td><input type="email"  class="form-control " name="txtCorreo" required  placeholder="Ej: algo@gmail.com" value="<? echo utf8_encode($columnaEmpresa['correo_empresas']); ?>"/></td>
                      </th>
                    </tr>
                    <tr>
            <td>&nbsp;</td>

                    </tr>
                    <tr>
                      <td>Imagen Corporativa (1025x183)</td>
                      <td><input  type="file" name="imagen" size="35"  class="input-add" /></td>
                      </th>
                    </tr>
                    <tr>
            <td>&nbsp;</td>

                    </tr>



                    <tr>
                      <td></td>
                      <td><div>
                        <button type="submit" class="btn btn-primary btn-lg">Modificar</button>
                      </div></td>
                      <th></th>
                    </tr>
                  </table>
                </form>
              </div>
            </div>
            <?}?>
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
