<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		<div class="wrapper box-layout theme-1-active pimary-color-green">
			
<?php
	$this->load->view("general/nav_logged.php"); 
?>
			
			<!-- Left Sidebar Menu -->
<?php
	// MENU 
	$this->load->view("general/menu_lateral.php"); 
?>
			<!-- /Left Sidebar Menu -->

			<!-- Right Sidebar Backdrop -->
			<div class="right-sidebar-backdrop"></div>
			<!-- /Right Sidebar Backdrop -->
			
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						  <h5 class="txt-dark">Usuarios</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="#"><span>Usuarios</span></a></li>
							<li class="active"><span>Listado</span></li>
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
					<div class="row">
					<!-- Basic Table -->
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Listado</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<?php
										echo anchor(
											'usuarios/alta',	//'controller/function/uri', 
											"<button class='btn btn-success'>Alta de Usuario</button>",		//'Link', 
											'class=""'); 

/*
										echo anchor(
											'usuarios/altaCliente',	//'controller/function/uri', 
											"<button class='btn btn-success'>Alta de Cliente</button>",		//'Link', 
											'class=""'); */
									?>																		
									<!--<p class="text-muted">Add class <code>table</code> in table tag.</p>-->
									<div class="table-wrap mt-40">
										<div class="table-responsive">
											<table class="table mb-0">
												<thead>
												  <tr>
													<th>#</th>
													<th>Nombre</th>
													<th>Apellido</th>
													<th>Rol</th>
													<th>Usuario/Email</th>
													<th></th>
												  </tr>
												</thead>
												<tbody>
											<?php
												foreach($usuarios as $u){
													if($u->id_rol != 1){
											?>
											  	<tr>
													<td>
														<?php
															echo $u->id;
														?>
													</td>
													<td>
														<?php
															echo $u->nombre_usuario;
														?>
													</td>
													<td>
														<?php
															echo $u->apellido_usuario;
														?>
													</td>
													<td>
														<?php
															echo $u->nombre_rol;
														?>
													</td>
													<td>
														<?php
															echo $u->usuario;
														?>
													</td>
													<td>
													<?php
														//BOTONES DE EDICION
														$urlParts = explode("/", $main);
														$seccionUrl = $urlParts[0]; 
														$this->load->view("general/opciones_edicion_abm.php", 
																		array(
																			"seccion" => $seccionUrl,
																			"id" => $u->id
																		)
																	);
													?>
													</td>
												  </tr>
										  <?php
										  		}
											  }
										  ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Basic Table -->
				</div>	
					
				</div>
			</div>
			<!-- /Main Content -->
		
		</div>
	</body>