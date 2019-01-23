<?php
$mensaje = "";
$cbbxi = 0;
$cbbxi = $_GET["cmbi"];
?>
<html>
    <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    </head>
<body>
        <img src="../club.png">  
    <div class="container"> 
    <form class="form" method="POST" action="registro2.php">
      <table>
        <tr>
<td>&nbsp;</td>

        </tr>
        <tr>
          <td>Nombre</td>
          <td><input type="text" class="form-control" name="txtNombre" placeholder="Nombre"/></td>
        <td>&nbsp;</td>
        </tr>
        <tr>
<td>&nbsp;</td>

        </tr>
        <tr>
          <td>Rut</td>
          <td><input type="text" style="width:300px;height:30px" class="form-control form-control- " name="txtRut" placeholder="Rut sin puntos (k minuscula) ->"/></td>
          <td>-</td>
          <th><input type="text" style="width:80px;height:30px" class="form-control form-control-xs " name="txtDv" placeholder="dv"/>
        </th>
        </tr>
        <tr>
<td>&nbsp;</td>

        </tr>
        <tr>
          <td>RP</td>
          <td><select name="cmb">
            <option value="0">Seleccione</option>
            <?
            include_once 'clases/conexion.php';

                $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
               // establecer y realizar consulta. guardamos en variable.
                $consulta = "select id, nombrerp from rp";
                $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

                while ($columna = mysqli_fetch_array( $resultado ))
              {
                if ($cbbxi==$columna['id'])
                {
                  $varfea="selected";

                }else {
                  $varfea="";
                }
                echo '<option '.$varfea.' value="'.$columna['id'].'">'.$columna['nombrerp'].'</option>';

              }


            ?>
</td>
          <th></th>
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
</body>
</html>
