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
        <div class="row">
          <div class="col-sm-12">
            <a id="modal-5300" onClick="cargar_nueva_historia()" href="#modal-container-5300" role="button" class="btn btn-primary float-sm-right" data-toggle="modal">Nueva historia</a>
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
                    // Crear objetos DateTime
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
                        $color = "";
                        if($resultado["valorprioridad"]=="Alta"){
                          $color = "card-danger ";
                        }
                        elseif($resultado["valorprioridad"]=="Media"){
                          $color = "card-warning";
                        }
                        else{
                          $color = "card-success";
                        }
                        //
                        echo '<div class="card '.$color.'  card-outline" id="'.$resultado["codbacklog"].'">';
                        echo  '<div class="card-header" >';
                        echo    '<p class="card-title" ><small class="font-weight-bold">'.$resultado["identificador"].'</small></p>';
                        echo     '<div class="card-tools">';
                        echo       '<a><small class="text-muted">'.calcularTiempoTranscurrido($resultado["fecha_creacion"]).'</small></a>';
                        echo       '<a href="#" class="btn btn-tool btn-link">#'.$resultado["codbacklog"].'</a>';
                        echo       '<a id="modal-51969" href="#modal-container-51969" role="button" data-toggle="modal" class="btn btn-tool" onClick="cargar_modal('.$resultado["codbacklog"].')">';
                        echo         '<i class="fas fa-eye"></i>';
                        echo       '</a>';
                        echo     '</div>';
            
                        echo   '</div>';
                        echo   '<div class="card-body">';
                        echo     '<p class="small"><b> Descripción:</b>'.$resultado["hdescripcion"].'</p>';
                        echo     '<p class="small"><b> Creado:</b>'.$resultado["nombre_asignado_por"].'</p>';
                        echo     '<p class="small"><b> Asignado a:</b>'.$resultado["nombre_asignado_a"].'</p>';
                        echo     '<p class="small"><b> Prioridad:</b>'.$resultado["valorprioridad"].'</p>';
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
                        $color = "";
                        if($resultado["valorprioridad"]=="Alta"){
                          $color = "card-danger ";
                        }
                        elseif($resultado["valorprioridad"]=="Media"){
                          $color = "card-warning";
                        }
                        else{
                          $color = "card-success";
                        }
                        //
                        echo '<div class="card '.$color.'  card-outline" id="'.$resultado["codbacklog"].'">';
                        echo  '<div class="card-header" >';
                        echo    '<p class="card-title" ><small class="font-weight-bold">'.$resultado["identificador"].'</small></p>';
                        echo     '<div class="card-tools">';
                        echo       '<a><small class="text-muted">'.calcularTiempoTranscurrido($resultado["fecha_creacion"]).'</small></a>';
                        echo       '<a href="#" class="btn btn-tool btn-link">#'.$resultado["codbacklog"].'</a>';
                        echo       '<a id="modal-51969" href="#modal-container-51969" role="button" data-toggle="modal" class="btn btn-tool" onClick="cargar_modal('.$resultado["codbacklog"].')">';
                        echo         '<i class="fas fa-eye"></i>';
                        echo       '</a>';
                        echo     '</div>';
            
                        echo   '</div>';
                        echo   '<div class="card-body">';
                        echo     '<p class="small"><b> Descripción:</b>'.$resultado["hdescripcion"].'</p>';
                        echo     '<p class="small"><b> Creado:</b>'.$resultado["nombre_asignado_por"].'</p>';
                        echo     '<p class="small"><b> Asignado a:</b>'.$resultado["nombre_asignado_a"].'</p>';
                        echo     '<p class="small"><b> Prioridad:</b>'.$resultado["valorprioridad"].'</p>';
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
                        $color = "";
                        if($resultado["valorprioridad"]=="Alta"){
                          $color = "card-danger ";
                        }
                        elseif($resultado["valorprioridad"]=="Media"){
                          $color = "card-warning";
                        }
                        else{
                          $color = "card-success";
                        }
                        //
                        echo '<div class="card '.$color.'  card-outline" id="'.$resultado["codbacklog"].'">';
                        echo  '<div class="card-header" >';
                        echo    '<p class="card-title" ><small class="font-weight-bold">'.$resultado["identificador"].'</small></p>';
                        echo     '<div class="card-tools">';
                        echo       '<a><small class="text-muted">'.calcularTiempoTranscurrido($resultado["fecha_creacion"]).'</small></a>';
                        echo       '<a href="#" class="btn btn-tool btn-link">#'.$resultado["codbacklog"].'</a>';
                        echo       '<a id="modal-51969" href="#modal-container-51969" role="button" data-toggle="modal" class="btn btn-tool" onClick="cargar_modal('.$resultado["codbacklog"].')">';
                        echo         '<i class="fas fa-eye"></i>';
                        echo       '</a>';
                        echo     '</div>';
            
                        echo   '</div>';
                        echo   '<div class="card-body">';
                        echo     '<p class="small"><b> Descripción:</b>'.$resultado["hdescripcion"].'</p>';
                        echo     '<p class="small"><b> Creado:</b>'.$resultado["nombre_asignado_por"].'</p>';
                        echo     '<p class="small"><b> Asignado a:</b>'.$resultado["nombre_asignado_a"].'</p>';
                        echo     '<p class="small"><b> Prioridad:</b>'.$resultado["valorprioridad"].'</p>';
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
                        $color = "";
                        if($resultado["valorprioridad"]=="Alta"){
                          $color = "card-danger ";
                        }
                        elseif($resultado["valorprioridad"]=="Media"){
                          $color = "card-warning";
                        }
                        else{
                          $color = "card-success";
                        }
                        //
                        echo '<div class="card '.$color.'  card-outline" id="'.$resultado["codbacklog"].'">';
                        echo  '<div class="card-header" >';
                        echo    '<p class="card-title" ><small class="font-weight-bold">'.$resultado["identificador"].'</small></p>';
                        echo     '<div class="card-tools">';
                        echo       '<a><small class="text-muted">'.calcularTiempoTranscurrido($resultado["fecha_creacion"]).'</small></a>';
                        echo       '<a href="#" class="btn btn-tool btn-link">#'.$resultado["codbacklog"].'</a>';
                        echo       '<a id="modal-51969" href="#modal-container-51969" role="button" data-toggle="modal" class="btn btn-tool" onClick="cargar_modal('.$resultado["codbacklog"].')">';
                        echo         '<i class="fas fa-eye"></i>';
                        echo       '</a>';
                        echo     '</div>';
            
                        echo   '</div>';
                        echo   '<div class="card-body">';
                        echo     '<p class="small"><b> Descripción:</b>'.$resultado["hdescripcion"].'</p>';
                        echo     '<p class="small"><b> Creado:</b>'.$resultado["nombre_asignado_por"].'</p>';
                        echo     '<p class="small"><b> Asignado a:</b>'.$resultado["nombre_asignado_a"].'</p>';
                        echo     '<p class="small"><b> Prioridad:</b>'.$resultado["valorprioridad"].'</p>';
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
        asignar_historia(evt.item.id);
      }
       //mostrar un mensaje en la consola con el ID de la tarjeta y las columnas de origen y destino
      //  console.log("Card " + evt.item.id + " moved from column " + evt.from.id + " to column " + evt.to.id);
      //  console.log("Old index: " + evt.oldIndex + ", New index: " + evt.newIndex);
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
      else{
        mover_todo_inprogress(evt.item.id);
      }
      // console.log("Card " + evt.item.id + " moved from column " + evt.from.id + " to column " + evt.to.id);
      // console.log("Old index: " + evt.oldIndex + ", New index: " + evt.newIndex);
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
        mover_inprogress_done(evt.item.id);
      }
      // console.log("Card " + evt.item.id + " moved from column " + evt.from.id + " to column " + evt.to.id);
      // console.log("Old index: " + evt.oldIndex + ", New index: " + evt.newIndex);
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
      else{
        mover_done_backlog(evt.item.id);
      }
      //
      // console.log("Card " + evt.item.id + " moved from column " + evt.from.id + " to column " + evt.to.id);
      // console.log("Old index: " + evt.oldIndex + ", New index: " + evt.newIndex);
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

  function cargar_nueva_historia() {
    const url = '<?= base_url() ?>index.php/backlog/c_tablero/lista_proyectos'; // URL a la que hacer la petición
    $('#id_proyecto').empty();
    $('#id_sprint').empty();
    fetch(url, {
        method: 'POST',
    })
    .then(response => response.json())
    .then(data => {
            $('#id_proyecto').append($('<option>', { 
                value: "",
                text : "" 
            }));
            
        data.forEach(item => {
            const resultado = JSON.parse(item.resultado);
            $('#id_proyecto').append($('<option>', { 
                value: resultado.codproyecto,
                text : resultado.descripcion 
            }));
        });
    })
    .catch(error => {
        console.error('Error:', error);
        toastr.error('Ha ocurrido un error al obtener los datos.'); // Muestra un mensaje de error con toast
    });

    // cargar sprint relacionados al proyecto
    $(document).ready(function() {
      toastr.options.timeOut = 10000;
        $('#id_proyecto').change(function() {
            //console.log($(this).val());
            const url = '<?= base_url() ?>index.php/backlog/c_tablero/lista_sprints'; // URL a la que hacer la petición
            let cod_proyecto = $(this).val();
            fetch(url, {
                method: 'POST',
            })
            .then(response => response.json())
            .then(data => {
                $('#id_sprint').empty();
                data.forEach(item => {
                    const resultado = JSON.parse(item.resultado);
                    if(resultado.codproyecto == cod_proyecto){
                        $('#id_sprint').append($('<option>', { 
                            value: resultado.codsprint,
                            text : resultado.descripcion 
                        }));
                    }
                    else{

                    }
                });
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.error('Ha ocurrido un error al obtener los datos.'); // Muestra un mensaje de error con toast
            });            
            //
        });
    });
  }
  // cargar prioridades
  const url = '<?= base_url() ?>index.php/backlog/c_tablero/lista_prioridades'; // URL a la que hacer la petición
  $('#id_prioridad').empty();
  fetch(url, {
      method: 'POST',
  })
  .then(response => response.json())
  .then(data => {
      data.forEach(item => {
          const resultado = JSON.parse(item.resultado);
          $('#id_prioridad').append($('<option>', { 
              value: resultado.codprioridad,
              text : resultado.valorprioridad 
          }));
      });
  })
  .catch(error => {
      console.error('Error:', error);
      toastr.error('Ha ocurrido un error al obtener los datos.'); // Muestra un mensaje de error con toast
  });
  // Funcion guardar nueva historia
  function guardar_historia() {
      let f_id_sprint   = $('#id_sprint').val();
      let f_fecha       = $('#fecha').val();
      let f_hora        = $('#hora').val();
      let f_id_prioridad= $('#id_prioridad').val();
      let f_tiempo_estimado= $('#tiempo_estimado').val();
      let f_descripcion = $('#descripcion').val();
      // console.log(":"+f_id_sprint+":"+f_fecha+":"+f_hora+":"+f_id_prioridad+":"+f_tiempo_estimado+":"+f_descripcion);

      // Hacer la petición POST con jQuery AJAX
      $.ajax({
          url: "<?= base_url() ?>index.php/backlog/c_tablero/nueva_historia",
          type: "POST",
          datatype: "json",
          data: {
            e_id_sprint: f_id_sprint,
            e_fecha: f_fecha,
            e_hora: f_hora,
            e_id_prioridad: f_id_prioridad,
            e_tiempo_estimado: f_tiempo_estimado,
            e_descripcion: f_descripcion
          },
          success: function(response) {
            //console.log(response);
            // parseando response
            var json = JSON.parse(response);
            let innerData = JSON.parse(json[0].fn_nueva_historia);
            // console.log(innerData.estado)
             if (innerData.estado === "exitoso") {
                $('#modal-container-5300').modal('hide');
                 toastr.success('Se insertó correctamente.');
                 location.href ="<?= base_url() ?>index.php/tablero";

             } else if (innerData.estado === "error") {
                 toastr.error('Ha ocurrido un error al insertar los datos.'+innerData.mensaje);
             }
          },
          error: function(error) {
            console.log("error");
              console.error('Error:', error);
              toastr.error('Ha ocurrido un error al hacer la petición.');
          }
      });
  }
  function cancelar_historia(){
    $(this).find('#modal-container-5300').trigger('reset');
  }

  function asignar_historia(idbacklog){
    $('#id_backlog').text(idbacklog);
    var modal = document.getElementById('modal-container-5200');
    // Utiliza la funcionalidad de Bootstrap para abrir el modal
    $(modal).modal('show');
    // Cargar los usuarios
    const url = '<?= base_url() ?>index.php/backlog/c_tablero/lista_usuarios'; // URL a la que hacer la petición
    $('#id_usuario').empty();
    fetch(url, {
        method: 'POST',
    })
    .then(response => response.json())
    .then(data => {
            $('#id_usuario').append($('<option>', { 
                value: "",
                text : "" 
            }));
            
        data.forEach(item => {
            const resultado = JSON.parse(item.resultado);
            $('#id_usuario').append($('<option>', { 
                value: resultado.codusu,
                text : resultado.nombre + " " +resultado.apellido 
            }));
        });
    })
    .catch(error => {
        console.error('Error:', error);
        toastr.error('Ha ocurrido un error al obtener los datos.'); // Muestra un mensaje de error con toast
    });
      // fin cargar
      return idbacklog;
  }
  function asignar_guardar(){
      let f_id_backlog   = $('#id_backlog').text();;
      let f_id_usuario   = $('#id_usuario').val();
      console.log("."+f_id_backlog+"  :"+f_id_usuario);
      // Hacer la petición POST con jQuery AJAX
      $.ajax({
          url: "<?= base_url() ?>index.php/backlog/c_tablero/asignar_historia",
          type: "POST",
          datatype: "json",
          data: {
            e_id_backlog: f_id_backlog,
            e_id_usuario: f_id_usuario
          },
          success: function(response) {
            console.log(response);
            // parseando response
            var json = JSON.parse(response);
            let innerData = JSON.parse(json[0].fn_asignar_historia);
            // console.log(innerData.estado)
             if (innerData.estado === "exitoso") {
                $('#modal-container-5200').modal('hide');
                 toastr.success('Se insertó correctamente.');
                 location.href ="<?= base_url() ?>index.php/tablero";

             } else if (innerData.estado === "error") {
                 toastr.error('Ha ocurrido un error al insertar los datos.'+innerData.mensaje);
             }
          },
          error: function(error) {
            console.log("error");
              console.error('Error:', error);
              toastr.error('Ha ocurrido un error al hacer la petición.');
          }
      });
  }
  function asignar_cancelar(){
        //obtener el id del card que se movio
        var card1 = document.getElementById($('#id_backlog').text());

        //cuando se mueve el card, regresar a la columna todoQ
        var todo1 = document.getElementById('body_backlog');
        todo1.appendChild(card1);  // mover la tarjeta a la columna todo
  }
  function mover_todo_inprogress(idbacklog){
      let f_id_backlog   = idbacklog
      console.log("."+f_id_backlog);
      // Hacer la petición POST con jQuery AJAX
      $.ajax({
          url: "<?= base_url() ?>index.php/backlog/c_tablero/mover_todo_a_inprogress",
          type: "POST",
          datatype: "json",
          data: {
            e_id_backlog: f_id_backlog
          },
          success: function(response) {
            console.log(response);
            // parseando response
            var json = JSON.parse(response);
            let innerData = JSON.parse(json[0].fn_mover_todo_a_inprogress);
            // console.log(innerData.estado)
             if (innerData.estado === "exitoso") {
                 toastr.success('Se insertó correctamente.');
                 location.href ="<?= base_url() ?>index.php/tablero";

             } else if (innerData.estado === "error") {
                 toastr.error('Ha ocurrido un error al insertar los datos.'+innerData.mensaje);
             }
          },
          error: function(error) {
            console.log("error");
              console.error('Error:', error);
              toastr.error('Ha ocurrido un error al hacer la petición.');
          }
      });
  }

  function mover_inprogress_done(idbacklog){
      var modal = document.getElementById('modal-container-51900');
      $(modal).modal('show');
      //
      $('#id_backlog1').text(idbacklog);
  }
  function done_guardar(){
      let f_id_backlog   = $('#id_backlog1').text();;
      let f_solucion   = $('#solucion').val();
      let f_incidencia   = $('#incidencia').val();
      console.log("."+f_id_backlog+"  :"+f_solucion+":"+f_incidencia);
      // Hacer la petición POST con jQuery AJAX
      $.ajax({
          url: "<?= base_url() ?>index.php/backlog/c_tablero/mover_inprogress_done",
          type: "POST",
          datatype: "json",
          data: {
            e_id_backlog: f_id_backlog,
            e_solucion:   f_solucion,
            e_incidencia: f_incidencia
          },
          success: function(response) {
            console.log(response);
            // parseando response
            var json = JSON.parse(response);
            let innerData = JSON.parse(json[0].fn_mover_inprogress_done);
            // console.log(innerData.estado)
             if (innerData.estado === "exitoso") {
                $('#modal-container-51900').modal('hide');
                 toastr.success('Se insertó correctamente.');
                 location.href ="<?= base_url() ?>index.php/tablero";

             } else if (innerData.estado === "error") {
                 toastr.error('Ha ocurrido un error al insertar los datos.'+innerData.mensaje);
             }
          },
          error: function(error) {
            console.log("error");
              console.error('Error:', error);
              toastr.error('Ha ocurrido un error al hacer la petición.');
          }
      });
  }
  function done_cancelar(){
      //obtener el id del card que se movio
      var card1 = document.getElementById($('#id_backlog1').text());

      //cuando se mueve el card, regresar a la columna todoQ
      var todo1 = document.getElementById('body_in_progress');
      todo1.appendChild(card1);  // mover la tarjeta a la columna todo
  }
  function mover_done_backlog(idbacklog){
    let f_id_backlog   = idbacklog
      console.log("."+f_id_backlog);
      // Hacer la petición POST con jQuery AJAX
      $.ajax({
          url: "<?= base_url() ?>index.php/backlog/c_tablero/mover_done_backlog",
          type: "POST",
          datatype: "json",
          data: {
            e_id_backlog: f_id_backlog
          },
          success: function(response) {
            console.log(response);
            // parseando response
            var json = JSON.parse(response);
            let innerData = JSON.parse(json[0].fn_mover_done_backlog);
            // console.log(innerData.estado)
             if (innerData.estado === "exitoso") {
                 toastr.success('Se insertó correctamente.');
                 location.href ="<?= base_url() ?>index.php/tablero";

             } else if (innerData.estado === "error") {
                 toastr.error('Ha ocurrido un error al insertar los datos.'+innerData.mensaje);
             }
          },
          error: function(error) {
            console.log("error");
              console.error('Error:', error);
              toastr.error('Ha ocurrido un error al hacer la petición.');
          }
      });
  }
</script>
<!-- modal maostrar card -->
<div class="col-md-12">
			<div class="modal fade" id="modal-container-51900" role="dialog" aria-labelledby="done_modal" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="titulo_modal">
                Finalizar
							</h5> 
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
              <div class="row">
                  <div class="col-md-12">
                    <label for="solucion">
                    Solución
                    </label>
                    <textarea rows= "5" class="form-control" id="solucion"></textarea>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                    <label for="incidencia">
                    Incidencia
                    </label>
                    <textarea rows= "5" class="form-control" id="incidencia"></textarea>
                  </div>
              </div>
						</div>
						<div class="modal-footer">
							 <h1 id="id_backlog1"></h1>
							<button type="button" onClick="done_guardar()" class="btn btn-primary">
								Guardar
							</button> 
							<button type="button" onClick="done_cancelar()" class="btn btn-secondary" data-dismiss="modal">
								cancelar
							</button>
						</div>
					</div>
					
				</div>
				
			</div>
</div>
<!-- modal asignar card -->
<div class="col-md-12">
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
              <!--  -->
              <div class="row">
                  <div class="form-group floating-label col-xs-12">
                    <label for="Usuario"></label>
                    <select class="form-control select-list" id="id_usuario" name="id_usuario" required>
                    </select>
                  </div>
                  <h2 id="id_backlog" name="id_backlog"></h2>
              </div>
						</div>
						<div class="modal-footer">
							 
							<button type="button" onClick="asignar_guardar()" class="btn btn-primary">
								Asignar
							</button> 
							<button type="button" onClick="asignar_cancelar()" class="btn btn-secondary" data-dismiss="modal">
								Cancelar
							</button>
						</div>
					</div>
					
				</div>
				
			</div>
</div>

<!-- modal nueva historia -->
<div class="col-md-12">		
			<div class="modal fade" id="modal-container-5300" role="dialog" aria-labelledby="nuevahistoria_modal" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="titulo_modal">Nueva Historia
							</h5> 
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
              <!--  -->
              <div class="row">
              <div class="col-md-6">
                  <div class="form-group floating-label col-xs-12">
                    <label for="Proyecto">Proyecto</label>
                    <select class="form-control select-list" id="id_proyecto" name="id_proyecto" required>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group floating-label col-xs-12">
                    <label for="Sprint">Sprint</label>
                    <select class="form-control select-list" id="id_sprint" name="id_sprint" required>
                    </select>
                  </div>
                </div>
              </div>
              <!--  -->
              <div class="row">
                <div class="col-md-6">
                  <!-- Fecha -->
                  <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="text" class="form-control" id="fecha">
                  </div>
                </div>
                <div class="col-md-6">
                  <!-- Hora -->
                  <div class="form-group">
                    <label for="hora">Hora</label>
                    <input type="text" class="form-control" id="hora" value="23:59">
                  </div>
                </div>
              </div>
              <!--  -->
              <!--  -->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group floating-label col-xs-12">
                    <label for="Proyecto">Prioridad</label>
                    <select class="form-control select-list" id="id_prioridad" name="id_prioridad" required>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="tiempo_estimado">Tiempo Estimado Hrs.</label>
                    <input type="text" class="form-control" id="tiempo_estimado" value="00:00">
                  </div>
                </div>
              </div>
              <!--  -->
              <div class="row">
                <div class="col-md-12">
                  <label for="descripcion">
                  Descripción
                  </label>
                  <textarea rows= "2" class="form-control" id="descripcion"></textarea>
                </div>
              </div>
              <!--  -->
						</div>
						<div class="modal-footer">
							 
							<button type="button" onClick="guardar_historia()" class="btn btn-primary">
								Guardar
							</button> 
							<button type="button" onClick="cancelar_historia()" class="btn btn-secondary" data-dismiss="modal">
								Cancelar
							</button>
						</div>
					</div>
					
				</div>
				
			</div>
</div>
<script type="text/javascript">
  flatpickr("#fecha", {
    enableTime: false,
    dateFormat: "d-m-Y",
  });

  flatpickr("#hora", {
    enableTime: true,
    noCalendar: true,
    time_24hr: true,
    dateFormat: "H:i",
  });

  flatpickr("#tiempo_estimado", {
    enableTime: true,
    noCalendar: true,
    time_24hr: true,
    defaultDate: "00:00",
    dateFormat: "H:i",
  });
</script>