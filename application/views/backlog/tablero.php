
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Kanban Board</h1>
          </div>
          <div class="col-sm-6 d-none d-sm-block">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kanban Board</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content pb-3">
      <div class="container-fluid h-100">
        <div class="card card-row card-secondary" id="columna_backlog">
          <div class="card-header" id="header_backlog">
            <h3 class="card-title">
              Backlog
            </h3>
          </div>
          <!--  -->
          <div class="card-body" id="body_backlog">
          <?php
                  //
                  function calcularTiempoTranscurrido($fechaPasada) {
                    $fechaPasada = new DateTime($fechaPasada);
                    $fechaActual = new DateTime();
                
                    $intervalo = $fechaPasada->diff($fechaActual);
                
                    $anos = $intervalo->y;
                    $meses = $intervalo->m;
                    $dias = $intervalo->d;
                    $horas = $intervalo->h;
                    $minutos = $intervalo->i;
                    $segundos = $intervalo->s;
                
                    if ($anos > 0) {
                        return "Hace " . $anos . " años y " . $dias . " días.";
                    } elseif ($dias > 0) {
                        return "Hace " . $dias . " días.";
                    } elseif ($horas > 0) {
                        return "Hace " . $horas . " horas.";
                    } elseif ($minutos > 0) {
                        return "Hace " . $minutos . " minutos.";
                    } else {
                        return "Hace " . $segundos . " segundos.";
                    }
                }
                  //
                  $url = base_url()."index.php/backlog/c_tablero/lista_tablero"; // URL a la que hacer la petición
                  $ch = curl_init($url); // Inicia una nueva sesión cURL

                  // Configura las opciones para la transferencia cURL
                  curl_setopt($ch, CURLOPT_POST, 1);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                  $respuesta = curl_exec($ch); // Ejecuta la petición POST

                  curl_close($ch); // Cierra la sesión cURL

                  $json = json_decode($respuesta, true); // Decodifica el JSON recibido

                  foreach ($json as $index => $item) {
                      $resultado = json_decode($item["resultado"], true);
                      if($resultado["estadohistoria"]=="backlog"){
                        echo "<script>console.log(".$resultado["codbacklog"].");</script>";
                        //
                        echo '<div class="card card-light card-outline" id="card_'.$resultado["codbacklog"].'">';
                        echo  '<div class="card-header" >';
                        echo    '<h6 class="card-title font-weight-bold" >'.$resultado["nombreproyecto"].' </h6>';
                        echo     '<div class="card-tools">';
                        echo       '<a><small>'.calcularTiempoTranscurrido($resultado["fecha_creacion"]).'</small></a>';
                        echo       '<a href="#" class="btn btn-tool btn-link">#'.$resultado["codbacklog"].'</a>';
                        echo       '<a id="modal-51969" href="#modal-container-51969" role="button" data-toggle="modal" class="btn btn-tool" onClick="cargar_modal('.$resultado["codbacklog"].')">';
                        echo         '<i class="fas fa-eye"></i>';
                        echo       '</a>';
                        echo     '</div>';
            
                        echo   '</div>';
                        echo   '<div class="card-body">';
                        echo     '<p>';
                        echo      $resultado["descripcion"];
                        echo    '</p>';
                        echo   '</div>';
                        echo '</div>';
                      }
                      //
                  }
            ?>
          <!--  -->
          </div>
        </div>
        <div class="card card-row card-primary" id="columna_to_do">
          <div class="card-header" id="header_to_do">
            <h3 class="card-title">
              To Do
            </h3>
          </div>
          <div class="card-body" id="body_to_do">
          <?php
                  //
                  $url = base_url()."index.php/backlog/c_tablero/lista_tablero"; // URL a la que hacer la petición
                  $ch = curl_init($url); // Inicia una nueva sesión cURL

                  // Configura las opciones para la transferencia cURL
                  curl_setopt($ch, CURLOPT_POST, 1);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                  $respuesta = curl_exec($ch); // Ejecuta la petición POST

                  curl_close($ch); // Cierra la sesión cURL

                  $json = json_decode($respuesta, true); // Decodifica el JSON recibido

                  foreach ($json as $index => $item) {
                      $resultado = json_decode($item["resultado"], true);
                      if($resultado["estadohistoria"]=="todo"){
                        echo "<script>console.log(".$resultado["codbacklog"].");</script>";
                        //
                        echo '<div class="card card-light card-outline" id="card_'.$resultado["codbacklog"].'">';
                        echo  '<div class="card-header" >';
                        echo    '<h6 class="card-title font-weight-bold" >'.$resultado["nombreproyecto"].' </h6>';
                        echo     '<div class="card-tools">';
                        echo       '<a><small>'.calcularTiempoTranscurrido($resultado["fecha_creacion"]).'</small></a>';
                        echo       '<a href="#" class="btn btn-tool btn-link">#'.$resultado["codbacklog"].'</a>';
                        echo       '<a id="modal-51969" href="#modal-container-51969" role="button" data-toggle="modal" class="btn btn-tool" onClick="cargar_modal('.$resultado["codbacklog"].')">';
                        echo         '<i class="fas fa-eye"></i>';
                        echo       '</a>';
                        echo     '</div>';
            
                        echo   '</div>';
                        echo   '<div class="card-body">';
                        echo     '<p>';
                        echo      $resultado["descripcion"];
                        echo    '</p>';
                        echo   '</div>';
                        echo '</div>';
                      }
                      //
                  }
            ?>
          </div>
        </div>
        <div class="card card-row card-default" id="columna_in_progress">
          <div class="card-header bg-info" id="header_in_progress">
            <h3 class="card-title">
              In Progress
            </h3>
          </div>
          <div class="card-body" id="body_in_progress">
          <?php
                  //
                  
                  //
                  $url = base_url()."index.php/backlog/c_tablero/lista_tablero"; // URL a la que hacer la petición
                  $ch = curl_init($url); // Inicia una nueva sesión cURL

                  // Configura las opciones para la transferencia cURL
                  curl_setopt($ch, CURLOPT_POST, 1);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                  $respuesta = curl_exec($ch); // Ejecuta la petición POST

                  curl_close($ch); // Cierra la sesión cURL

                  $json = json_decode($respuesta, true); // Decodifica el JSON recibido

                  foreach ($json as $index => $item) {
                      $resultado = json_decode($item["resultado"], true);
                      if($resultado["estadohistoria"]=="inprogress"){
                        echo "<script>console.log(".$resultado["codbacklog"].");</script>";
                        //
                        echo '<div class="card card-light card-outline" id="card_'.$resultado["codbacklog"].'">';
                        echo  '<div class="card-header" >';
                        echo    '<h6 class="card-title font-weight-bold" >'.$resultado["nombreproyecto"].' </h6>';
                        echo     '<div class="card-tools">';
                        echo       '<a><small>'.calcularTiempoTranscurrido($resultado["fecha_creacion"]).'</small></a>';
                        echo       '<a href="#" class="btn btn-tool btn-link">#'.$resultado["codbacklog"].'</a>';
                        echo       '<a id="modal-51969" href="#modal-container-51969" role="button" data-toggle="modal" class="btn btn-tool" onClick="cargar_modal('.$resultado["codbacklog"].')">';
                        echo         '<i class="fas fa-eye"></i>';
                        echo       '</a>';
                        echo     '</div>';
            
                        echo   '</div>';
                        echo   '<div class="card-body">';
                        echo     '<p>';
                        echo      $resultado["descripcion"];
                        echo    '</p>';
                        echo   '</div>';
                        echo '</div>';
                      }
                      //
                  }
            ?>            
          </div>
        </div>
        <div class="card card-row card-success" id="card_done">
          <div class="card-header" id="header_done">
            <h3 class="card-title">
              Done
            </h3>
          </div>
          <div class="card-body" id="body_done">
          <div class="card card-primary card-outline"  id="card_1">
              <div class="card-header">
                <h5 class="card-title">Create repo</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#1</a>
                  <a id="modal-51969" href="#modal-container-51969" role="button" data-toggle="modal" class="btn btn-tool" onClick="cargar_modal()">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
            </div>
            <?php
                  //
                  
                  //
                  $url = base_url()."index.php/backlog/c_tablero/lista_tablero"; // URL a la que hacer la petición
                  $ch = curl_init($url); // Inicia una nueva sesión cURL

                  // Configura las opciones para la transferencia cURL
                  curl_setopt($ch, CURLOPT_POST, 1);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                  $respuesta = curl_exec($ch); // Ejecuta la petición POST

                  curl_close($ch); // Cierra la sesión cURL

                  $json = json_decode($respuesta, true); // Decodifica el JSON recibido

                  foreach ($json as $index => $item) {
                      $resultado = json_decode($item["resultado"], true);
                      if($resultado["estadohistoria"]=="done"){
                        echo "<script>console.log(".$resultado["codbacklog"].");</script>";
                        //
                        echo '<div class="card card-light card-outline" id="card_'.$resultado["codbacklog"].'">';
                        echo  '<div class="card-header" >';
                        echo    '<h6 class="card-title font-weight-bold" >'.$resultado["nombreproyecto"].' </h6>';
                        echo     '<div class="card-tools">';
                        echo       '<a><small>'.calcularTiempoTranscurrido($resultado["fecha_creacion"]).'</small></a>';
                        echo       '<a href="#" class="btn btn-tool btn-link">#'.$resultado["codbacklog"].'</a>';
                        echo       '<a id="modal-51969" href="#modal-container-51969" role="button" data-toggle="modal" class="btn btn-tool" onClick="cargar_modal('.$resultado["codbacklog"].')">';
                        echo         '<i class="fas fa-eye"></i>';
                        echo       '</a>';
                        echo     '</div>';
            
                        echo   '</div>';
                        echo   '<div class="card-body">';
                        echo     '<p>';
                        echo      $resultado["descripcion"];
                        echo    '</p>';
                        echo   '</div>';
                        echo '</div>';
                      }
                      //
                  }
            ?>   
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- Importar la biblioteca Sortable.js -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.10.2/Sortable.min.js"></script>

<!-- Importar la biblioteca Sortable.js -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.10.2/Sortable.min.js"></script>

<script>
  // Obtener las columnas del tablero Kanban utilizando sus IDs
  var backlog = document.getElementById('body_backlog');
  var toDo = document.getElementById('body_to_do');
  var inProgress = document.getElementById('body_in_progress');
  var done = document.getElementById('body_done');

  // Crear una nueva instancia de Sortable para la columna 'backlog'
  new Sortable(backlog, {
    group: 'shared', // establecer el mismo grupo para todas las listas
    animation: 600,  // duración de la animación en ms
    onEnd: function (evt) {  // función que se ejecuta cuando se detiene el arrastrar y soltar
      if (evt.to != toDo) {  // si la tarjeta no se movió a la columna 'toDo'
        //obtener el id del card que se movio
        var card1 = document.getElementById(evt.item.id);

        //cuando se mueve el card, regresar a la columna backlog
        var backlg = document.getElementById('body_backlog');
        backlg.appendChild(card1);  // mover la tarjeta a la columna todo
      }
      else{
        //mostrar modal para llenar asignar a un usuario.
        // Obtén una referencia al modal
        var modal = document.getElementById('modal-container-5200');

        // Utiliza la funcionalidad de Bootstrap para abrir el modal
        $(modal).modal('show');
      }
      // mostrar un mensaje en la consola con el ID de la tarjeta y las columnas de origen y destino
      console.log("Card " + evt.item.id + " moved from column " + evt.from.id + " to column " + evt.to.id);
      console.log("Old index: " + evt.oldIndex + ", New index: " + evt.newIndex);
    },
  });

  // Crear una nueva instancia de Sortable para la columna 'toDo', similar a la anterior
  new Sortable(toDo, {
    group: 'shared',
    animation: 600,
    onEnd: function (evt) {
      if (evt.to !== inProgress) {
        //obtener el id del card que se movio
        var card1 = document.getElementById(evt.item.id);

        //cuando se mueve el card, regresar a la columna todoQ
        var todo1 = document.getElementById('body_to_do');
        todo1.appendChild(card1);  // mover la tarjeta a la columna todo
      }
      console.log("Card " + evt.item.id + " moved from column " + evt.from.id + " to column " + evt.to.id);
      console.log("Old index: " + evt.oldIndex + ", New index: " + evt.newIndex);
    },
  });

  // Crear una nueva instancia de Sortable para la columna 'inProgress', similar a las anteriores
  new Sortable(inProgress, {
    group: 'shared',
    animation: 600,
    onEnd: function (evt) {
      if (evt.to !== done) {
                //obtener el id del card que se movio
                var card1 = document.getElementById(evt.item.id);

                //cuando se mueve el card, regresar a la columna progress
                var progrs = document.getElementById('body_in_progress');
                progrs.appendChild(card1);  // mover la tarjeta a la columna
      }
      else{
        //mostrar modal para llenar incidencia.
        // Obtén una referencia al modal
        var modal = document.getElementById('modal-container-51900');

        // Utiliza la funcionalidad de Bootstrap para abrir el modal
        $(modal).modal('show');
      }
      console.log("Card " + evt.item.id + " moved from column " + evt.from.id + " to column " + evt.to.id);
      console.log("Old index: " + evt.oldIndex + ", New index: " + evt.newIndex);
    },
  });

  // Crear una nueva instancia de Sortable para la columna 'done'
  new Sortable(done, {
    group: 'shared',
    animation: 1000,
    onEnd: function (evt){
      if (evt.to !== backlog) {
      //obtener el id del card que se movio
      var card1 = document.getElementById(evt.item.id);

      //cuando se mueve el card, regresar a la columna done
      var done1 = document.getElementById('body_done');
      done1.appendChild(card1);  // mover la tarjeta a la columna destino  
      }
      //
      console.log("Card " + evt.item.id + " moved from column " + evt.from.id + " to column " + evt.to.id);
      console.log("Old index: " + evt.oldIndex + ", New index: " + evt.newIndex);
    },
  });
</script>
<!-- modal maostrar card -->
<div class="col-md-12">
			<div class="modal fade" id="modal-container-51969" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="titulo_modal">
							</h5> 
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
              <p id="parrafo_modal"></p>
						</div>
						<div class="modal-footer">
							 
							<button type="button" class="btn btn-primary">
								Save changes
							</button> 
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								Close
							</button>
						</div>
					</div>
					
				</div>
				
			</div>
			
</div>
<script>
  function cargar_modal( str){
    const url = '<?= base_url() ?>index.php/backlog/c_tablero/lista_tablero'; // URL a la que hacer la petición

    fetch(url, {
        method: 'POST',
    })
    .then(response => response.json())
    .then(data => {
        data.forEach(item => {
            const resultado = JSON.parse(item.resultado);
            if(resultado.codbacklog==""+str){
              //console.log("Descripcion:"+resultado.descripcion);
              document.getElementById("titulo_modal").innerHTML = "ti";
              document.getElementById("parrafo_modal").innerHTML = resultado.descripcion;
            }
        });
    })
    .catch(error => {
        console.error('Error:', error);
        toastr.error('Ha ocurrido un error al obtener los datos.'); // Muestra un mensaje de error con toast
    });
  }
</script>
<!-- modal maostrar card -->
<div class="col-md-12">
			 <a id="modal-51900" href="#modal-container-51900" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
			
			<div class="modal fade" id="modal-container-51900" role="dialog" aria-labelledby="done_modal" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="titulo_modal">
							</h5> 
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
              <p id="parrafo_modal"></p>
						</div>
						<div class="modal-footer">
							 
							<button type="button" class="btn btn-primary">
								Save changes
							</button> 
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								Close
							</button>
						</div>
					</div>
					
				</div>
				
			</div>
</div>
<!-- modal asignar card -->
<div class="col-md-12">
			 <a id="modal-5200" href="#modal-container-5200" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
			
			<div class="modal fade" id="modal-container-5200" role="dialog" aria-labelledby="asignar_modal" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="titulo_modal">Asignar
							</h5> 
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
              <p id="parrafo_modal">Aqui cargar datos</p>
						</div>
						<div class="modal-footer">
							 
							<button type="button" class="btn btn-primary">
								Save changes
							</button> 
							<button type="button" class="btn btn-secondary" data-dismiss="modal">
								Close
							</button>
						</div>
					</div>
					
				</div>
				
			</div>
</div>