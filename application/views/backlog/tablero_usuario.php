<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Board</h1>
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
      <div class="container-fluid h-50">
        <div class="card card-row card-primary" id="columna_to_do">
          <div class="card-header" id="header_to_do">
            <h3 class="card-title">
              To Do
            </h3>
          </div>
          <div class="card-body" id="body_to_do">
              <!-- Codigo apppend aqui -->
          </div>
        </div>
        <div class="card card-row card-default" id="columna_in_progress">
          <div class="card-header bg-info" id="header_in_progress">
            <h3 class="card-title">
              In Progress
            </h3>
          </div>
          <div class="card-body" id="body_in_progress">
            <!-- codigo generado aqui -->
          </div>
        </div>
        <div class="card card-row card-success" id="card_done">
          <div class="card-header" id="header_done">
            <h3 class="card-title">
              Done
            </h3>
          </div>
          <div class="card-body" id="body_done">
                <!-- Codigo js append aqui  -->
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
  var toDo = document.getElementById('body_to_do');
  var inProgress = document.getElementById('body_in_progress');
  var done = document.getElementById('body_done');



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

  function cancelar_historia(){
    $(this).find('#modal-container-5300').trigger('reset');
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
<!-- modal finalizar card -->
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
							 <h1 id="id_backlog1" class="d-none"></h1>
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
    defaultDate: "01:00",
    dateFormat: "H:i",
  });
  flatpickr("#tiempo_estimado1", {
    enableTime: true,
    noCalendar: true,
    time_24hr: true,
    defaultDate: "01:00",
    dateFormat: "H:i",
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
    function cargarContenido() {
        // Realizar la petición AJAX para obtener los datos
        $.ajax({
          url: "<?= base_url() ?>index.php/backlog/c_tablero/lista_tablero_usuario",
          type: "POST",
          datatype:"json",// Puedes cambiar GET por POST si lo necesitas
            success: function (data) {
              var json = JSON.parse(data);
                $('#body_to_do').html('');
                $('#body_in_progress').html('');
                $('#body_done').html('');
                json.forEach(function (item) {
                    innerData = JSON.parse(item.resultado);
                    $('#body_to_do').append(construirHTMLtodo(innerData));
                    $('#body_in_progress').append(construirHTMLinprogress(innerData));
                    $('#body_done').append(construirHTMLdone(innerData));
                });
            
                function calcularDiferencia(fechaActual, fechaCreacion) {
                    var fechaActualMoment = moment.utc(fechaActual);
                    var fechaCreacionMoment = moment.utc(fechaCreacion);

                    var diferencia = fechaActualMoment.diff(fechaCreacionMoment, 'milliseconds');
                    
                    var segundos = Math.abs(Math.round(moment.duration(diferencia).asSeconds()));
                    var minutos = Math.abs(Math.round(moment.duration(diferencia).asMinutes()));
                    var horas = Math.abs(Math.round(moment.duration(diferencia).asHours()));
                    var dias = Math.abs(Math.round(moment.duration(diferencia).asDays()));
                    var semanas = Math.abs(Math.round(moment.duration(diferencia).asWeeks()));
                    var meses = Math.abs(Math.round(moment.duration(diferencia).asMonths()));
                    var anos = Math.abs(Math.round(moment.duration(diferencia).asYears()));

                    // Devolver el mensaje correspondiente
                    if (segundos < 60) {
                        return `Hace ${segundos} seg.`;
                    } else if (minutos < 60) {
                        return `Hace ${minutos} min.`;
                    } else if (horas < 24) {
                        return `Hace ${horas} hrs.`;
                    } else if (dias < 30) {
                        return `Hace ${semanas} sem.`;
                    } else if (meses < 12) {
                        return `Hace ${meses} mes.`;
                    } else {
                        return `Hace ${anos} años.`;
                    }
                }

                function construirHTMLtodo(item) {
                  if(item.estadohistoria=='todo'){
                      var html = '';
                      var color = '';
                      if (item.valorprioridad == "Alta") {
                          color = "card-danger ";
                      } else if (item.valorprioridad == "Media") {
                          color = "card-warning";
                      } else {
                          color = "card-success";
                      }
                      html += '<div class="card ' + color + '  card-outline" id="' + item.codbacklog + '">';
                      html += '<div class="card-header">';
                      html += '<p class="card-title"><small class="font-weight-bold">' + item.identificador + '</small></p>';
                      html += '<div class="card-tools">';
                      html += '<a><small class="text-muted" data-placement="top" title="'+item.fecha_creacion+'">'+calcularDiferencia(item.fecha_servidor, item.fecha_creacion)+'</small></a>';
                      html += '<a href="#" class="btn btn-tool btn-link">#' + item.codbacklog + '</a>'
                      html += '</div>';
                      html += '</div>';
                      html += '<div class="card-body">';
                      html += '<p class="small"><b> Creado:</b>'+item.nombre_asignado_por+' <b>&nbsp&nbsp&nbsp&nbspAsignado a </b>'+item.nombre_asignado_a+'</p>';
                      html += '<p class="small"><b> Prioridad:</b>'+item.valorprioridad+" ("+item.bonificacion+' Pts.) <b>Duración:</b>'+item.tiempoestimado+'Hrs.</p>';
                      html += '<p class="small"><b> Descripción:</b>' + item.hdescripcion + '</p>';
                      html += '</div>';
                      html += '</div>';
                  }
                    return html;
                }
                function construirHTMLinprogress(item) {
                  if(item.estadohistoria=='inprogress'){
                      var html = '';
                      var color = '';
                      if (item.valorprioridad == "Alta") {
                          color = "card-danger ";
                      } else if (item.valorprioridad == "Media") {
                          color = "card-warning";
                      } else {
                          color = "card-success";
                      }
                      html += '<div class="card ' + color + '  card-outline" id="' + item.codbacklog + '">';
                      html += '<div class="card-header">';
                      html += '<p class="card-title"><small class="font-weight-bold">' + item.identificador + '</small></p>';
                      html += '<div class="card-tools">';
                      html += '<a><small class="text-muted" data-placement="top" title="'+item.fecha_creacion+'">'+calcularDiferencia(item.fecha_servidor, item.fecha_creacion)+'</small></a>';
                      html += '<a href="#" class="btn btn-tool btn-link">#' + item.codbacklog + '</a>';
                      html += '</div>';
                      html += '</div>';
                      html += '<div class="card-body">';
                      html += '<p class="small"><b> Creado:</b>'+item.nombre_asignado_por+' <b>&nbsp&nbsp&nbsp&nbspAsignado a </b>'+item.nombre_asignado_a+'</p>';
                      html += '<p class="small"><b> Prioridad:</b>'+item.valorprioridad+" ("+item.bonificacion+' Pts.) <b>Duración:</b>'+item.tiempoestimado+'Hrs.</p>';
                      html += '<p class="small"><b> Tiempo Restante:</b>'+item.tiempo_restante+'</p>';
                      html += '<p class="small"><b> Descripción:</b>' + item.hdescripcion + '</p>';
                      html += '</div>';
                      html += '</div>';
                  }
                    return html;
                }
                function construirHTMLdone(item) {
                  if(item.estadohistoria=='done'){
                      var html = '';
                      var color = '';
                      if (item.valorprioridad == "Alta") {
                          color = "card-danger ";
                      } else if (item.valorprioridad == "Media") {
                          color = "card-warning";
                      } else {
                          color = "card-success";
                      }
                      html += '<div class="card ' + color + '  card-outline" id="' + item.codbacklog + '">';
                      html += '<div class="card-header">';
                      html += '<p class="card-title"><small class="font-weight-bold">' + item.identificador + '</small></p>';
                      html += '<div class="card-tools">';
                      html += '<a><small class="text-muted" data-placement="top" title="'+item.fecha_creacion+'">'+calcularDiferencia(item.fecha_servidor, item.fecha_creacion)+'</small></a>';
                      html += '<a href="#" class="btn btn-tool btn-link">#' + item.codbacklog + '</a>';
                      // html += '<a id="modal-51969" href="#modal-container-51969" role="button" data-toggle="modal" class="btn btn-tool" onClick="cargar_modal(' + item.codbacklog + ')">';
                      // html += '<i class="fas fa-eye"></i>';
                      html += '</div>';
                      html += '</div>';
                      html += '<div class="card-body">';
                      html += '<p class="small"><b> Creado:</b>'+item.nombre_asignado_por+' <b>&nbsp&nbsp&nbsp&nbspAsignado a </b>'+item.nombre_asignado_a+'</p>';
                      html += '<p class="small"><b> Prioridad:</b>'+item.valorprioridad+" ("+item.bonificacion+' Pts.) <b>Duración:</b>'+item.tiempoestimado+'Hrs.</p>';
                      html += '<p class="small"><b> Bonificación:</b>'+item.bonificacion_final+' Pts.</p>';
                      html += '<p class="small"><b> Descripción:</b>' + item.hdescripcion + '</p>';
                      html += '<p class="small"><b> Solución:</b>'+item.descripcionsolucion+'</p>';
                      html += '<p class="small"><b> Incidencia:</b>'+item.descripcionincidencia+'</p>';
                      html += '</div>';
                      html += '</div>';
                  }
                    return html;
                }                                
            
            }
        });
    }

    // Llamar a cargarContenido inicialmente
    cargarContenido();

    // Actualizar el contenido cada 12
    setInterval(cargarContenido, 12000);
</script>