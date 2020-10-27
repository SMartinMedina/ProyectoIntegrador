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
							<li class="active"><span>Edita</span></li>
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
									<h6 class="panel-title txt-dark">Edita</h6>
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
												echo form_open('usuarios/editabd', $attributes);
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
														value="<?php echo $usuario->nombre_usuario; ?>" 
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
														value="<?php echo $usuario->apellido_usuario; ?>" 
														>
												</div>
												<div class="form-group">
													<label class="control-label mb-10" for="id_rol">rol:</label>
													<select class="form-control" id = "id_rol" name = "id_rol">
<?php
	foreach ($roles as $r) {
		if($r->id != 1){
?>
														<option value = "<?php echo $r->id; ?>"
<?php
	if($usuario->id_rol == $r->id) echo "selected = 'selected'";
?>
															>
															<?php echo $r->nombre; ?>
														</option>

<?php
		}
	}
?>
													</select>
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
														value="<?php echo $usuario->email; ?>" 
														required
														>
												</div>
												<div class="form-group" id = "div_especialidades_empleado">
													<label class="control-label mb-10" for="email">
														Especialidades:
													</label>
<?php 
	foreach ($especialidades as $e) {
?>
	<div class="checkbox checkbox-success">
		<input id="checkbox<?php echo $e->id; ?>" type="checkbox" 
			name ="especialidades[]" 
			value="<?php echo $e->id; ?>"
<?php
	foreach ($especialidadesEmpleado as $ee) {
		if($e->id == $ee->id_especialidad) echo "checked";
	}
?>
			>
		<label for="checkbox<?php echo $e->id; ?>">
			<?php echo $e->nombre;?>
		</label>
	</div>


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
		    //$('#div_especialidades_empleado').hide(); 
		    $().ready(function(){
		    	if($('#id_rol').val() == '2') {
		            $('#div_especialidades_empleado').show(); 
		        } else {
		            $('#div_especialidades_empleado').hide(); 
		        } 
		    });
		    $('#id_rol').change(function(){
		        if($('#id_rol').val() == '2') {
		            $('#div_especialidades_empleado').show(); 
		        } else {
		            $('#div_especialidades_empleado').hide(); 
		        } 
		    });
		});
	</script>