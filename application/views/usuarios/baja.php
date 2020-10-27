<!--<h1>TEST DASHBOARD ROLES RRRRRRRR</h1>
<form id="altarolbd" method ="post" action="altarolbd"> 
	<label>Nombre: </label> <input type="text" name="nombre_rol" value="">
	<button class="btn btn-default" type="submit">Alta Rol</button>
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
						  <h5 class="txt-dark">Usuarios</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><?php
									echo anchor(
										'usuarios/panel',	//'controller/function/uri', 
										"<span>Usuarios</span>",		//'Link', 
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
												echo form_open('usuarios/bajabd', $attributes);
											?>
											<!--<form>-->
												<input 
														type="hidden" 
														class="form-control" 
														placeholder="id"
														id="id" 
														name="id"	
														value="<?php echo $usuario->id; ?>" 
														required
														>
												<input 
														type="hidden" 
														class="form-control" 
														placeholder="id_rol"
														id="id_rol" 
														name="id_rol"	
														value="<?php echo $usuario->id_rol; ?>" 
														required
														>														
												<div class="form-group">
													<label class="control-label mb-10" for="nombre">nombre:</label>
													<h5><?php echo $usuario->nombre_usuario;?> </h5>
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="apellido">apellido:</label>
													<h5><?php echo $usuario->apellido_usuario;?> </h5>
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="id_rol">rol:</label>
<?php
	echo "<h5>".$usuario->nombre_rol."</h5>";
?>
													</select>
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="email">
														Correo Electrónico:
													</label>
													<h5><?php echo $usuario->email; ?> </h5>
												</div>
												<div class="form-group" id = "div_especialidades_empleado">
													<label class="control-label mb-10" for="email">
														Especialidades:
													</label>
<?php 
	foreach ($especialidades as $e) {
?>
<?php
	foreach ($especialidadesEmpleado as $ee) {
		if($e->id == $ee->id_especialidad){ 
?>
	<h5><?php echo $e->nombre;?></h5>		
<?php
		}
	}
?>

<?php
	}
 ?>


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
	<script type="text/javascript">
		$(function() {
		    $().ready(function(){
		    	if($('#id_rol').val() == "2") {
		            $('#div_especialidades_empleado').show(); 
		        } else {
		            $('#div_especialidades_empleado').hide(); 
		        } 
		    });
		});
	</script>