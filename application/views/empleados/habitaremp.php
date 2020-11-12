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
						  <h5 class="txt-dark">Especialistas</h5>
						</div>
						<!-- Breadcrumb -->
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
                                            $this->load->view("empleados/botones_disponibilidades.php", 
                                                            array(
                                                                "seccion" => "Usuarios",
                                                                "empleados" =>$empleados
                                                            )
                                                        );
                                         ?>
									<div class="table-wrap mt-40">
										<div class="table-responsive">
											<table class="table mb-0">
												<thead>
												  <tr>
													<th>#</th>
													<th>Nombre</th>
													<th>Apellido</th>
													<th>Estado</th>
													<th></th>
												  </tr>
											    </thead>
										    	<tbody>
                                                    <?php
                                                        foreach($empleados as $e){
                                                    ?>
											  	<tr>
													<td>
														<?php
															echo $e->id;
														?>
													</td>
													<td>
														<?php
															echo $e->nombre_usuario;
														?>
													</td>
													<td>
														<?php
															echo $e->apellido_usuario;
														?>
													</td>
													<td>
														<?php
															if(isset($e->horario_salida)){
														?>
															<span class="label label-warning">
                                                                libre														
															</span> 
														<?php
															}else{
                                                        ?>
                                                            <span class="label label-success">
                                                                trabajando
                                                            </span>
															
                                                        <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td id="boton".<?php
															echo $e->id;
														?>>
                                                        <?php
                                                            $this->load->view("empleados/botones_disponibilidad.php", 
                                                                array(
                                                                    "seccion" => "Usuarios",
                                                                    "horario_entrada" =>$e->horario_entrada,
                                                                    "horario_salida"=>$e->horario_salida,
                                                                    "id_empleado"=>$e->id
                                                                )
                                                            );
                                                        ?></td> </tr>
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