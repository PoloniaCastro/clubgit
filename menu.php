    <?
session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>InvitApp</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php">InvitAPP</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
         <div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">

        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">0</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Nada aun</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Nada aun</a>
          </div>
        </li>

<?

if (!$_SESSION) {
  ?>


        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="modal" data-target="#loginModal" role="button"  aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>Iniciar Sesión
          </a>

        </li>

<?
}else{

  ?>

        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i><?echo $_SESSION['nombre'];?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Otra cosa<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>

<?
}

?></a>




      </ul>

    </nav>

    <div id="wrapper">

<?
        if (!$_SESSION) {
  ?>

      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>DEBES INICIAR SESIÓN</span>
          </a>
        </li>
</ul>
<?
} else {
?>

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Menú</span>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Registrar</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Asistentes</h6>
            <a class="dropdown-item" href="registrarAsistente.php">Registrar</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Repartidores</h6>
            <a class="dropdown-item" href="registrarRepartidores.php">Registrar</a>


<?

if ($_SESSION['permisos']==1) {
  ?>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Fiestas</h6>
            <a class="dropdown-item" href="registrarFiesta.php">Registrar Fiesta</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">RP</h6>
            <a class="dropdown-item" href="registrarRp.php">Registrar RP</a>

          </div>
        </li>

<?
}
?>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-fw fa-folder"></i>
                      <span>Listar</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                      <h6 class="dropdown-header">Asistentes</h6>
                      <a class="dropdown-item" href="listar.php">Listar asistentes</a>
                      <h6 class="dropdown-header">Repartidores</h6>
                      <a class="dropdown-item" href="listarRepartidores.php">Listar repartidores</a>

                      <?

                      if ($_SESSION['permisos']==1) {
                        ?>

                      <h6 class="dropdown-header">RP</h6>
                      <a class="dropdown-item" href="listarRp.php">Listar rp</a>
                      <h6 class="dropdown-header">Fiesta</h6>
                      <a class="dropdown-item" href="index.php">Listar Fiesta</a>
                      <?}?>

                  </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Copiar asistentes</span></a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
              <h6 class="dropdown-header">Asistentes</h6>
              <a class="dropdown-item" href="exportarAsistentes.php">Copiar Asistentes</a>
            </div>
        </li>

                <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-table"></i>
            <span>Modificar Empresa</span></a>
        </li>

                <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-fw fa-table"></i>
            <span>Centro de documentos</span></a>
        </li>
      </ul>


<?

}
?>


      <div id="content-wrapper">

        <div class="container-fluid">
<img class="img-fluid" src="img/club.png">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Inicio</a>
            </li>
            <li class="breadcrumb-item active">Variable de inicio</li>
          </ol>



              <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Quiéres cerrar sesión?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Presiona salir para cerrar tu sesión</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="logout.php">SALIR</a>
          </div>
        </div>
      </div>
    </div>

                  <!-- login Modal-->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Iniciar una nueva sesión</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">

    <form class="form" method="POST" action="ejecutarInicioSesion.php">
      <table>

        <tr>
          <td>Correo</td>
          <td><input type="text" class="form-control" name="txtCorreo" placeholder="correo@algo.com"/></td>
        <td>&nbsp;</td>
        </tr>

        <tr>
          <td>Contraseña</td>
          <td><input type="password" style="width:300px;height:30px" class="form-control form-control- " name="txtContrasenia" placeholder="Contraseña"/></td>
          </th>
        </tr>

        <tr>
          <td></td>
          <td><div>
            <button type="submit" class="btn btn-primary btn-lg">Ingresar</button>
          </div></td>
          <th></th>
        </tr>
      </table>








  </form>

          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>

          </div>
        </div>
      </div>
    </div>
