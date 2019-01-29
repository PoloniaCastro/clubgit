<!DOCTYPE html>
<?php
include_once("menu.php");
include_once 'clases/conexion.php';
$mensaje = "";
$rpRegistro = 0;
$rpRegistro = $_SESSION["id2"];
$idEmpresa = $_SESSION["empresa"];
$idAsistentes = $_GET["id_asistencia"];

?>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Editar registro de asistentes</div>

              <?
              $consultaAsistencia = "SELECT * FROM asistencia
              inner join repartidores on repartidores.id_repartidor = asistencia.repartidor
              inner join fiestas on fiestas.id_fiesta = asistencia.fiesta
              WHERE id_asistencia='".$idAsistentes."'";
              $resultadoAsistencia = mysqli_query( $conexion, $consultaAsistencia ) or die ( "Algo ha ido mal en la consulta a la base de datos");
              while ($columnaAsistencia = mysqli_fetch_array( $resultadoAsistencia )) {

              ?>

            <div class="card-body">
              <div class="table-responsive">
                <!-- form -->
                <form class="form" method="POST" action="ejecutarEditarAsistentes.php">
                  <table  style="margin: 0 auto;">
                    <tr>
            <td>&nbsp;</td>

                    </tr>
                    <tr>
                      <td>Nombre</td>
                      <td><input type="text" class="form-control" name="txtNombre"   placeholder="Nombre" value="<? echo $columnaAsistencia['nombre']; ?>"/></td>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
            <td>&nbsp;</td>

                    </tr>
                    <tr>
                      <td>Rut</td>
                      <td><input type="text" style="width:300px;height:30px" class="form-control form-control- " name="txtRut"  placeholder="Rut sin puntos (k minúscula) ->" value="<? echo $columnaAsistencia['rut']; ?>" readonly/></td>


                    </tr>
                    <tr>
            <td>&nbsp;</td>

                    </tr>



                    <tr>
                      <td>RP</td>
                      <td>
                        <?
                        include_once 'clases/conexion.php';

                            $consulta = "select id, nombrerp from rp where id='".$_SESSION["id2"]."'";
                            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

                            while ($columna = mysqli_fetch_array( $resultado ))
                          {
                            ?>
                           <h3> <?=$columna["nombrerp"];?> </h3>
<input type="hidden" class="form-control" name="selecionRp" placeholder="<?=$columna["nombrerp"];?>" value="<?=$_SESSION["id2"];?>"/>

<?
                          }


                        ?>
            </td>
                      <th></th>
                    </tr>

                    <tr>
            <td>&nbsp;</td>
<input type="hidden" name="id_asistente" value="<?=$idAsistentes?>"
                    </tr>

                    <tr>
                      <td>Repartidor</td>
                      <td><select name="SelectRepartidor">
                          <option value="<? echo $columnaAsistencia['repartidor']; ?>"><? echo $columnaAsistencia['nombre_repartidor']; ?></option>
                          <?
                          include_once 'clases/conexion.php';

                              $consultaRepartidor = "select id_repartidor, nombre_repartidor from repartidores where id_rp='".$rpRegistro."' ";
                              $resultadoRepartidor = mysqli_query( $conexion, $consultaRepartidor ) or die ( "Algo ha ido mal en la consulta a la base de datos");

                              while ($columnaRepartidor = mysqli_fetch_array( $resultadoRepartidor ))
                            {
                              if ($rpRegistro==$columnaRepartidor['id_repartidor'])
                              {
                                $varfea="selected";

                              }else {
                                $varfea="";
                              }
                              echo '<option '.$varfea.' value="'.$columnaRepartidor['id_repartidor'].'">'.$columnaRepartidor['nombre_repartidor'].'</option>';

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
                          <option value="<? echo $columnaAsistencia['fiesta']; ?>"><? echo $columnaAsistencia['nombre_fiesta']; ?></option>
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
                        <button type="submit" class="btn btn-primary btn-lg">Modificar</button>
                      </div></td>
                      <th></th>
                    </tr>
                  </table>
                </form>
              </div>
            </div>
            <?}
            ?>

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
