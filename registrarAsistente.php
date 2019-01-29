<!DOCTYPE html>
<?php
include_once("menu.php");
$mensaje = "";
$rpRegistro = 0;
$rpRegistro = $_SESSION["id2"];
$idEmpresa = $_SESSION["empresa"];

?>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Registro de asistentes</div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- form -->
                <form class="form" method="POST" action="ejecutarRegistrarAsistente.php">
                  <table  style="margin: 0 auto;">
                    <tr>
            <td>&nbsp;</td>

                    </tr>
                    <tr>
                      <td>Nombre</td>
                      <td><input type="text" class="form-control" name="txtNombre" required  placeholder="Nombre"/></td>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
            <td>&nbsp;</td>

                    </tr>
                    <tr>
                      <td>Rut</td>
                      <td><input type="text" style="width:300px;height:30px" class="form-control form-control- " name="txtRut" required  placeholder="Rut sin puntos (k minúscula) ->"/></td>
                      <td>-</td>
                      <th><input type="text" style="width:80px;height:30px" class="form-control form-control-xs " name="txtDv" required placeholder="dv"/>
                    </th>
                    </tr>
                    <tr>
            <td>&nbsp;</td>

                    </tr>



                    <tr>
                      <td>RP</td>
                      <td>
                        <?
                        include_once 'clases/conexion.php';

                          //  $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
                           // establecer y realizar consulta. guardamos en variable.
                            $consulta = "select id, nombrerp from rp where id='".$_SESSION["id2"]."'";
                            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

                            while ($columna = mysqli_fetch_array( $resultado ))
                          {
                            ?>
                           <h3> <?=$columna["nombrerp"];?> </h3>
<input readonly type="hidden" class="form-control" name="selecionRp" placeholder="<?=$columna["nombrerp"];?>" value="<?=$_SESSION["id2"];?>"/>

<?
                          }


                        ?>
            </td>
                      <th></th>
                    </tr>

                    <tr>
            <td>&nbsp;</td>

                    </tr>

                    <tr>
                      <td>Repartidor</td>
                      <td><select name="SelectRepartidor">
                          
                          <?
                          include_once 'clases/conexion.php';

                              $consulta2 = "select id_repartidor, nombre_repartidor from repartidores where id_rp='".$rpRegistro."' ";
                              $resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos");

                              while ($columna2 = mysqli_fetch_array( $resultado2 ))
                            {
                              if ($rpRegistro==$columna2['id_repartidor'])
                              {
                                $varfea="selected";

                              }else {
                                $varfea="";
                              }
                              echo '<option '.$varfea.' value="'.$columna2['id_repartidor'].'">'.$columna2['nombre_repartidor'].'</option>';

                            }

                          ?>

                      </td>

                    <td>&nbsp;</td>
                    </tr>
                    <tr>
            <td>&nbsp;</td>

                    </tr>
                    <tr>
                      <td>Fiesta</td>
                      <td><select name="SelectFiesta">
                          
                          <?
                          include_once 'clases/conexion.php';
                              $consulta2 = "SELECT id_fiesta, nombre_fiesta FROM fiestas where id_empresa= '".$idEmpresa."' ";
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
                              echo '<option '.$varfea.' value="'.$columna2['id_fiesta'].'">'.$columna2['nombre_fiesta'].'</option>';

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
