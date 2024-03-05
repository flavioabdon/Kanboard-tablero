    <!-- Content Header (Page header) -->
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Cod Backlog</th>
                    <th>Cod Historia</th>
                    <th>Asignador</th>
                    <th>Asignado</th>
                    <th>Revisado</th>
                    <th>Fecha</th>
                  </tr>
                  </thead>
                  <tbody >
                  <!--  -->
                  <?php
                  $url = base_url()."index.php/backlog/c_listar/listar_backlog"; // URL a la que hacer la petición
                  $ch = curl_init($url); // Inicia una nueva sesión cURL

                  // Configura las opciones para la transferencia cURL
                  curl_setopt($ch, CURLOPT_POST, 1);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                  $respuesta = curl_exec($ch); // Ejecuta la petición POST

                  curl_close($ch); // Cierra la sesión cURL

                  $json = json_decode($respuesta, true); // Decodifica el JSON recibido

                  foreach ($json as $index => $item) {
                      $resultado = json_decode($item["resultado"], true);
                      echo "<tr>";
                      echo "<td>" . $resultado["codbacklog"] . "</td>";
                      echo "<td>" . $resultado["codhistoria"] . "</td>";
                      echo "<td>" . $resultado["codusuario_asignado_por"] . "</td>";
                      echo "<td>" . $resultado["codusuario_asignado_a"] . "</td>";
                      echo "<td>" . $resultado["codusuario_revision"] . "</td>";
                      echo "<td>" . $resultado["fecha_creacion"] . "</td>";
                      echo "</tr>";
                  }

                  ?>
                  <!--  -->
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <div>
    <script type="text/javascript">
        $(document).ready(function() {
             $.ajax({
                 url: "<?php echo site_url('backlog/c_listar/listar_backlog') ?>",
                 type: "POST",
                 success: function(respuesta) {
                    var json = JSON.parse(respuesta);
                    console.log(json);
                     //
                    json.forEach(function(item, index) {
                        var resultado = JSON.parse(item.resultado);
                        console.log("Objeto " + index + ": ", resultado);
                    });
                    //    
                    // var table = document.getElementById('myTable');

                    //     json.forEach(function(item, index) {

                    //     var resultado = JSON.parse(item.resultado);

                    //     var row = table.insertRow(-1); // Inserta una nueva fila al final de la tabla

                    //     var cell0 = row.insertCell(0);   // Inserta una nueva celda en la fila
                    //     var cell1 = row.insertCell(1); // Inserta una segunda celda en la fila
                    //     var cell2 = row.insertCell(2); // Inserta una tercera celda en la fila
                    //     var cell3 = row.insertCell(3); // Inserta una cuarta celda en la fila
                    //     var cell4 = row.insertCell(4); // Inserta una  celda en la fila
                    //     var cell5 = row.insertCell(5); // Inserta una  celda en la fila

                    //     cell0.innerHTML = resultado.codbacklog; // Añade el valor de columna1 a la segunda celda
                    //     cell1.innerHTML = resultado.codhistoria; // Añade el valor de columna2 a la tercera celda
                    //     cell2.innerHTML = resultado.codusuario_asignado_por; // Añade el valor de columna3 a la cuarta celda
                    //     cell3.innerHTML = resultado.codusuario_asignado_a; 
                    //     cell4.innerHTML = resultado.codusuario_revision;
                    //     cell5.innerHTML = resultado.fecha_creacion; 
                    //     });
                 }
             });
        });
    </script>
  </div>
</div>