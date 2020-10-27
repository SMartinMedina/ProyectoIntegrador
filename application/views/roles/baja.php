<!--<h1>Edita</h1>
<form id="editaespecialidadbd" method ="post" action="<?php //echo site_url('editaespecialidadbd');?>"> 
	<input type="text" name="nombre" id="nombre" value="<?php //echo $especialidad->nombre; ?>">
	<input type="hidden" name="id_especialidad" id="id_especialidad" value="<?php //echo $especialidad->id; ?>">
	<button class="btn btn-default" type="submit">Confirmar Cambio</button>
</form>-->

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
						  <h5 class="txt-dark">Roles</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><?php
									echo anchor(
										'roles/panel',	//'controller/function/uri', 
										"<span>Roles</span>",		//'Link', 
										'class=""'); 
								?>
							</li>
							<li class="active"><span>Baja</span></li>
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
									<h6 class="panel-title txt-dark">Baja</h6>
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
												echo form_open('roles/bajabd', $attributes);
											?>
											<!--<form>-->
												<div class="form-group">
													<!-- Id del item a modificar, en un campo oculto -->
													<input 
														type="hidden" 
														id="id" 
														name="id"	
														value = "<?php echo $rol->id; ?>"
														required
														>
													<label class="control-label mb-10" for="nombre">nombre:</label>
													<p>
														<?php echo $rol->nombre; ?>
													</p>
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