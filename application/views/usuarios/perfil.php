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
						  <h5 class="txt-dark">Perfil</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><?php
									echo anchor(
										'usuarios/perfil',	//'controller/function/uri', 
										"<span>Perfil</span>",		//'Link', 
										'class=""'); 
								?>
							</li>
							<li class="active"><span>Editar</span></li>
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
									<h6 class="panel-title txt-dark">Editar</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="panel-body">
										<div class="form-wrap">
											<div class="panel-body"><?php
															echo anchor(
																'usuarios/cambiar_pass',	//'controller/function/uri', 
																"<button class='btn btn-success'>Cambiar contaseña</button>",		//'Link', 
																'class=""');
														?>
											</div>
											<?php
											 	echo validation_errors();
												$attributes = array('class' => 'miFormulario', 'id' => 'idMiFormulario','data-toggle' => 'validator');
												echo form_open('usuarios/perfilbd', $attributes);
											?>
											<!--<form>-->
												<input 
														type="hidden" 
														class="form-control" 
														placeholder="id"
														id="id" 
														name="id"	
														value="<?php echo $this->session->userdata('id'); ?>" 
														required
														>
												<div class="form-group">
													<label class="control-label mb-10" for="nombre">nombre:</label>
													<input 
														type="text" 
														class="form-control" 
														placeholder="Ingrese nombre"
														id="nombre" 
														name="nombre"	
														minlength="4" 
														maxlength="50"
														value="<?php echo $this->session->userdata('nombre_usuario'); ?>" 
														required
														>
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="apellido">apellido:</label>
													<input 
														type="text" 
														class="form-control" 
														placeholder="Ingrese apellido"
														id="apellido" 
														name="apellido"	
														minlength="4" 
														maxlength="50"
														value="<?php echo $this->session->userdata('apellido_usuario'); ?>" 
														>
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="email">
														Correo Electrónico:
													</label>
													<input 
														type="email" 
														class="form-control" 
														placeholder=""
														id="email" 
														name="email"	
														data-error="No posee formato valido." 
														value="<?php echo $this->session->userdata('email_usuario'); ?>" 
														required
														>
												</div>
												<div class="panel-body">					
												<div class="form-group mb-0">
													<button type="submit" class="btn btn-success">
														Confirmar
													</button>	
													
											</div>
												</div>	
											<?php
												$string = '';//$string = '</div></div>';
												echo form_close($string); //prints </form>
											?>
												
												
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
	