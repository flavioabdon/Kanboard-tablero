<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="#">Inicio</a>
					</li>
					<li class="breadcrumb-item active">
						Tareas
					</li>
				</ol>
			</nav>
        </div>
    </div>

    <div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
			<a id="modal-44838" href="#modal-container-44838" role="button" class="btn" data-toggle="modal" style = "display: flex; justify-content: flex-end">
                <button type="button" class="btn btn-success">
                    Nueva Tarea
                </button>
            </a>
			<!-- modal		 -->
			<div class="modal fade" id="modal-container-44838" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel">
										Formulario Nueva Tarea
									</h5> 
									<button type="button" class="close" data-dismiss="modal">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
                                    <!-- body -->
                                    <input class="form-control" type="text" placeholder="Default input">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Nombre del proyecto</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <!-- fin body -->
								</div>
								<div class="modal-footer">
									 
									<button type="button" class="btn btn-primary">
										Guardar
									</button> 
									<button type="button" class="btn btn-secondary" data-dismiss="modal">
										Cerrar
									</button>
								</div>
							</div>	
				</div>	
			</div>
			<!-- fin modal	 -->
		</div>
	</div>

    <div class="row">
		<div class="col-md-12">
			<div class="list-group">
				 <a href="#" class="list-group-item list-group-item-action active">Proyectos</a>
				<div class="list-group-item">
					<h4 class="list-group-item-heading">
						2 tareas
					</h4>
					<p class="list-group-item-text">
						<!-- card -->
                        <div class="card">
                            <div class = "row card-header">
                                <div class = "col-md-8">
                                    <a class="card-link" id="collapse-165175" data-toggle="collapse" data-parent="#card-412130" href="#card-element-165175" >Collapsible Group Item #1</a>
                                </div>
                                <div class = "col-md-4" style = "display: flex; justify-content: flex-end">
                                    <button type="button" class="btn btn-floating-action" id="modal-44839" href="#modal-container-44839" role="button" class="btn" data-toggle="modal">
                                    <i class="fa fa-pen" style="color: #00A4EF;"></i>
                                    </button>

                                    <button type="button" class="btn btn-floating-action" id="">
                                    <i class="fa fa-trash" style="color: #DB4437;"></i>
                                    </button>

                                    

                                </div>
                            </div>
                            <div id="card-element-165175" class="collapse show">
                                <div class="card-body">
                                    <p>Estado</p>
                                    <div class="progress disabled">
                                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" data-parent="#card-412130" href="#card-element-388773">Collapsible Group Item #2</a>
                            </div>
                            <div id="card-element-388773" class="collapse show">
                                <div class="card-body">
                                    Anim pariatur cliche...
                                </div>
                            </div>
                        </div>
                        <div id="card-412130"></div> <!--Mantener para que funcione el colapse-->
                        <!-- fin card -->
					</p>
				</div>
				<div class="list-group-item justify-content-between">
					<!-- Help <span class="badge badge-secondary badge-pill">14</span> -->
				</div> 
                <!-- <a href="#" class="list-group-item list-group-item-action active justify-content-between">Home <span class="badge badge-light badge-pill">14</span></a> -->
			</div>
        </div>
        	<!-- modal	editar	 -->
		<div class="modal fade" id="modal-container-44839" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
				<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel">
										Formulario editar Proyecto
									</h5> 
									<button type="button" class="close" data-dismiss="modal">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								<div class="modal-body">
                                    <!-- body -->
                                    <input class="form-control" type="text" placeholder="Default input">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Nombre del proyecto</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <!-- fin body -->
								</div>
								<div class="modal-footer">
									 
									<button type="button" class="btn btn-primary">
										Guardar
									</button> 
									<button type="button" class="btn btn-secondary" data-dismiss="modal">
										Cerrar
									</button>
								</div>
							</div>	
				 </div>	
		 </div>
		<!-- fin modal	editar -->
	</div>
</div>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">

		</div>
	</div>
</div>
<script>
    window.onload = function () {
        document.getElementById("collapse-165175").click();
    }
</script>