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
										"<span>Usuarios</span>",		//'Link', 
										'class=""'); 
								?>
							</li>
							<li class="active"><span>Contraseña</span></li>
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
									<h6 class="panel-title txt-dark">Contraseña</h6>
                                    <h6 class="text-center nonecase-font txt-grey">Llene las casillas para cambiar su Contraseña</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="panel-body">
										<div class="form-wrap">
											<?php
											 	echo validation_errors();
												$attributes = array('class' => 'miFormulario', 'id' => 'idMiFormulario','data-toggle' => 'validator');
												echo form_open('usuarios/cambiar_passbd', $attributes);
											?>
											<!--<form>-->
                                                <div class="form-group">
													<label class="control-label mb-10" for="pass">
                                                        Contraseña
													</label>
													<input 
														type="password" 
														class="form-control" 
														placeholder="Ingrese su password"
														id="pass" 
														name="pass"	
														value="<?php echo set_value('pass'); ?>" 
														required>
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputpwd_3">Confirme Contraseña</label>
													<input 
														type="password" 
														class="form-control" 
														placeholder="Reingrese su password"
														id="pass_confirm" 
														name="pass_confirm"	
														value="<?php echo set_value('pass_confirm'); ?>" 
														required>
												</div>						
												<div class="form-group mb-0">
													<button type="submit" class="btn btn-success">
														Confirmar
													</button>
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
	