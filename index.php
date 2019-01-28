<?
include_once("menu.php");
?>


          <!-- Area Chart Example-->
          <form class="form" method="GET" action="ejecutarEliminarFiesta.php">

          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Fiestas</div>
            <div class="card-body">
              <div class="row">

             <!-- Bucle de fiestas-->
<?
if ($_SESSION) {

            if ($_SESSION['permisos']==1) {

                          $rpapp=0;

             include_once("clases/conexion.php");
             $consulta2 = "SELECT * FROM fiestas WHERE `id_empresa`=".$_SESSION['empresa']."";
            $resultado2 = mysqli_query( $conexion, $consulta2 ) or die ( "Algo ha ido mal en la consulta a la base de datos. ".$rpapp." ");
            while ($columna2 = mysqli_fetch_array( $resultado2 )){
              $timestamp = strtotime($columna2['hora_fiesta']);


?>
              <div class="col-xl-3 col-sm-6">
                <div class="card text-white bg-info o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-fw fa-life-ring"></i>
                    </div>
                    <div class="mr-5"><? echo $columna2['nombre_fiesta']; ?></div>
                    <div class="mr-5">Lugar:<? echo  utf8_encode($columna2['lugar_fiesta']); ?></div>
                    <div class="mr-5">Fecha:<? echo  date('j/m/Y',strtotime($columna2['fecha_fiesta'])); ?></div>
                    <div class="mr-5">Hora:<? echo  date('H:i',$timestamp) ; ?></div>


                    </div>
                  <a class="card-footer text-white clearfix small z-1" href="#">

                    <a OnClick='confirmar(event)' type="submit" style="color:black;"  class="btn btn-primary btn-lg" href="ejecutarEliminarFiesta.php?id_fiesta=<? echo  utf8_encode($columna2['id_fiesta']); ?>"> Eliminar</a>
                    <a  type="submit" style="color:black;"  class="btn btn-primary btn-lg" href="editarFiesta.php?id_fiesta=<? echo  utf8_encode($columna2['id_fiesta']); ?>"> Editar</a>

                    <span class="float-right">

                    </span>

                  </a>

                </div>

              </div>
<?
 }


            }else{
echo "Bienvenido RP, para ingresar gente revise su menú lateral";

            }

          }else{
            echo "Para ver este contenido debe iniciar sesión";
          }
?>


</div>

            </div>

          </div>
        </form>


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
