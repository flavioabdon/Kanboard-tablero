<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="#">Inicio</a>
					</li>
					<li class="breadcrumb-item active">
						Proyectos
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
                    Nuevo Proyecto
                </button>
            </a>
			<!-- modal		 -->
			<div class="modal fade" id="modal-container-44838" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel">
										Formulario Nuevo Proyecto
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
						2 proyectos
					</h4>
					<p class="list-group-item-text">
						<!-- card -->
                        <div class="card card-630620">
                            <h5 class="card-header">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a class="card-link" data-toggle="collapse" data-parent="#card-630620" href="#card-element-895541">
                                        #1 Desarrollo de software
                                        </a>
                                    </div>
                                    <div class = "col-md-4">

                                    </div>
                                    <div class = "col-md-4" style = "display: flex; justify-content: flex-end"> <!-- display... para mantener los elementos de abajo alineados a la derecha -->
                                        <button type="button" class="btn btn-floating-action" id="modal-44839" href="#modal-container-44839" role="button" class="btn" data-toggle="modal">
                                        <i class="fa fa-pen" style="color: #00A4EF;"></i>
                                        </button>

                                        <button type="button" class="btn btn-floating-action" id="">
                                        <i class="fa fa-trash" style="color: #DB4437;"></i>
                                        </button>

                                    </div>
                                </div>
                            </h5>
                            <div id="card-element-895541" class="collapse show">
                                <div class="card-body">
                                    <p class="card-text">
                                        Card content
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer">
                                Creado por Admin hace 2 me
                            </div>
                        </div>

                        <div class="card card-630620">
                            <h5 class="card-header">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a class="card-link" data-toggle="collapse" data-parent="#card-630620" href="#card-element-895542">
                                        #2 Control de calidad
                                        </a>
                                    </div>
                                    <div class = "col-md-4">

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
                            </h5>
                            <div id="card-element-895542" class="collapse show">
                                <div class="card-body">
                                    <p class="card-text">
                                        Card content
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer">
                                Creado por Admin hace 1 semana
                            </div>
                        </div>
                        <!-- fin card -->
                        <!-- colapse card -->
                        <div id="card-630620"></div> <!--Mantener para que funcione el colapse-->
                        <!-- fin colapse card -->
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