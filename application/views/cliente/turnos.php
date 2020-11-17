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
						  <h5 class="txt-dark">Mis turnos</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="#"><span>Mis turnos</span></a></li>
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
											'turnos/alta',	//'controller/function/uri', 
											"<button class='btn btn-success'>Nuevo Turno</button>",		//'Link', 
											'class=""'); 
									?>	
									
										
									
									<!--<p class="text-muted">Add class <code>table</code> in table tag.</p>-->
									<div class="table-wrap mt-40">
										<div class="table-responsive">
											<table class="table mb-0">
												<thead>
												  <tr>
													<th>#</th>
													<th>Servicio</th>
													<th>Atiende</th>
													<th>Fecha alta</th>
													<th>Tiempo de espera</th>
												  </tr>
												</thead>
												<tbody>
											<?php
												foreach($turnos as $t){
											?>
											  	<tr>
													<td>
														<?php
															echo $t->id_turno;
														?>
													</td>											  		
													<td>
														<?php
															echo $t->nombre_especialidades_usuarios;
														?>
													</td>
													<td>
														<?php
															echo $t->nombre_empleado;
														?>
													</td>
													<td>
														<?php
															echo $t->fecha_alta;
														?>
													</td>
													<td>
														<?php
															foreach($turnos_cliente as $tc){
																if($t->id_turno==$tc['id_turno']){
																	echo $tc['tiempo'];
																}
															}
														?>
													</td>
													<td id="boton".<?php
															echo $t->id_turno;
														?>>
														<?php
															//BOTONES DE EDICION
															$seccionUrl = "Turnos"; 
															$this->load->view("turnos/opciones_edicion_abm.php", 
																			array(
																				"seccion" => $seccionUrl,
																				"id" => $t->id_turno,
																			)
																		);
														?>
													</td>
												  </tr>
										  <?php
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