
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
          <div class="card-body" id="body_backlog">
            <div class="card card-info card-outline" id="card_3">
              <div class="card-header">
                <h5 class="card-title">Create Labels</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#3</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox1" disabled>
                  <label for="customCheckbox1" class="custom-control-label">Bug</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox2" disabled>
                  <label for="customCheckbox2" class="custom-control-label">Feature</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox3" disabled>
                  <label for="customCheckbox3" class="custom-control-label">Enhancement</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox4" disabled>
                  <label for="customCheckbox4" class="custom-control-label">Documentation</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox5" disabled>
                  <label for="customCheckbox5" class="custom-control-label">Examples</label>
                </div>
              </div>
            </div>
            <div class="card card-primary card-outline" id="card_4">
              <div class="card-header">
                <h5 class="card-title">Create Issue template</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#4</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox1_1" disabled>
                  <label for="customCheckbox1_1" class="custom-control-label">Bug Report</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox1_2" disabled>
                  <label for="customCheckbox1_2" class="custom-control-label">Feature Request</label>
                </div>
              </div>
            </div>
            <div class="card card-primary card-outline" id="card_6">
              <div class="card-header">
                <h5 class="card-title">Create PR template</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#6</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card card-light card-outline" id="card_7">
              <div class="card-header" >
                <h5 class="card-title">Create Actions</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#7</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>

              </div>
              <div class="card-body">
                <p>
                  Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                  Aenean commodo ligula eget dolor. Aenean massa.
                  Cum sociis natoque penatibus et magnis dis parturient montes,
                  nascetur ridiculus mus.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="card card-row card-primary" id="columna_to_do">
          <div class="card-header" id="header_to_do">
            <h3 class="card-title">
              To Do
            </h3>
          </div>
          <div class="card-body" id="body_to_do">
            <div class="card card-primary card-outline" id="card_5">
              <div class="card-header">
                <h5 class="card-title">Create first milestone</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#5</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card card-row card-default" id="columna_in_progress">
          <div class="card-header bg-info" id="header_in_progress">
            <h3 class="card-title">
              In Progress
            </h3>
          </div>
          <div class="card-body" id="body_in_progress">
            <div class="card card-light card-outline" id="card_2">
              <div class="card-header">
                <h5 class="card-title">Update Readme</h5>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-link">#2</a>
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <p>
                  Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                  Aenean commodo ligula eget dolor. Aenean massa.
                  Cum sociis natoque penatibus et magnis dis parturient montes,
                  nascetur ridiculus mus.
                </p>
              </div>
            </div>
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
                  <a href="#" class="btn btn-tool">
                    <i class="fas fa-pen"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

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
      console.log("Card " + evt.item.id + " moved from column " + evt.from.id + " to column " + evt.to.id);
      console.log("Old index: " + evt.oldIndex + ", New index: " + evt.newIndex);
    },
  });

  // Crear una nueva instancia de Sortable para la columna 'done'
  new Sortable(done, {
    group: 'shared',
    animation: 1000,
    onEnd: function (evt){
      //obtener el id del card que se movio
      var card1 = document.getElementById(evt.item.id);

      //cuando se mueve el card, regresar a la columna done
      var done1 = document.getElementById('body_done');
      done1.appendChild(card1);  // mover la tarjeta a la columna destino
      //
      console.log("Card " + evt.item.id + " moved from column " + evt.from.id + " to column " + evt.to.id);
      console.log("Old index: " + evt.oldIndex + ", New index: " + evt.newIndex);
    },
  });
</script>