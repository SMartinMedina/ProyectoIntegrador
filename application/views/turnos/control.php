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
						  <h5 class="txt-dark">Bienvenido <?php echo $this->session->userdata('nombre_usuario'); ?></h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="#"><span>Turnos</span></a></li>
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
									<h6 class="panel-title txt-dark">Listado de Turnos</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">	
									<!--<p class="text-muted">Add class <code>table</code> in table tag.</p>-->
									<div class="table-wrap mt-40">
										<div class="table-responsive">
										<?php
                                                            $this->load->view("empleados/botones_disponibilidad.php", 
                                                                array(
                                                                    "seccion" => "Usuarios",
                                                                    "horario_entrada" =>$horario_entrada,
                                                                    "horario_salida"=>$horario_salida,
                                                                    "id_empleado"=>$id
                                                                )
                                                            );
                                                        ?>

											<table class="table mb-0">
												<thead>
												  <tr>
													<th>#</th>
													<th>Cliente</th>
													<th>Servicio</th>
													<th>Estado</th>
													<th>Fecha alta</th>
													<th></th>
												  </tr>
												</thead>
												<tbody>
												
											<?php

												$primero_de_la_fila = 0;
												foreach($turnos as $t){
													$estado_ocupado=0;
											?>
											  	<tr>
													<td>
														<?php
															echo $t->id_turno;
														?>
													</td>
													<td>
														<?php
															echo $t->nombre_cliente;
														?>
													</td>
													<td>
														<?php
															echo $t->nombre_especialidades_usuarios;
														?>
													</td>
													<td>
														<?php
															foreach($todos_turnos as $tt){
																if(($t->id_cliente==$tt->id_cliente)&&($tt->id_estado_turno==2)&&($t->id_empleado!=$tt->id_empleado)){
																	$estado_ocupado=1;
																}
															}
														if($estado_ocupado ==0){
															if( $t->id_estado_turno == 1){
														?>
															<span class="label label-warning">
														<?php
																echo $t->nombre_estado_turno;
														?>															
															</span> 
														<?php
															}else if( $t->id_estado_turno == 2){
														?>
															<span class="label label-success">
														<?php
																echo $t->nombre_estado_turno;
														?>
															</span>
														<?php
															}
														}else{
															?><span class="label label-danger">Ocupado</span><?php
														}
														?>
													</td>
													<td>
														<?php
															echo $t->fecha_alta;
														?>
													</td>
													<td id="boton".<?php
															echo $t->id_turno;
														?>>
													<?php
													if($estado_ocupado ==0){
														if($primero_de_la_fila == 0){
															if($t->id_estado_turno == 2){//SIENDO ATENDIDO
																echo anchor(
														                'turnos/finalizar/'.$t->id_turno,
														                '<i class="fa fa-edit" aria-hidden="true"></i> Finalizar ',     //'Link', 
														                '')." | ";
																$primero_de_la_fila = $t->id_cliente;
															}else{
																echo anchor(
													                'turnos/inicializar/'.$t->id_turno,
													                '<i class="fa fa-edit" aria-hidden="true"></i> Atender ',       //'Link', 
													                '')." | ";
																
															}
														}
													}
											                echo anchor(
											                    'turnos/cancelar/'.$t->id_turno,
											                    '<i class="fa fa-edit" aria-hidden="true"></i> Cancelar ',      //'Link', 
											                    '');

													
														//BOTONES DE EDICION
														/*$urlParts = explode("/", $main);
														$seccionUrl = $urlParts[0]; 
														$this->load->view("turnos/opciones_edicion_abm.php", 
																		array(
																			"seccion" => $seccionUrl,
																			"id" => $t->id_turno,
																			"id_estado"=>$t->id_estado_turno
																		)
																	);*/

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