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
						  <h5 class="txt-dark">Turnos</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><?php
									echo anchor(
										'usuarios/panel',	//'controller/function/uri', 
										"<span>Turnos</span>",		//'Link', 
										'class=""'); 
								?>
							</li>
							<li class="active"><span>Alta</span></li>
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
									<h6 class="panel-title txt-dark">Alta</h6>
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
												echo form_open('turnos/altabd', $attributes);
											?>
											<!--<form>-->
												<div class="form-group">
													<label class="control-label mb-10" for="id_cliente">cliente:</label>
													<select class="form-control" id = "id_cliente" name = "id_cliente">
<?php
	foreach ($clientes as $c) {
		if($c->id != 1){
?>
														<option value = "<?php echo $c->id; ?>">
															<?php echo $c->nombre_usuario	; ?>
														</option>

<?php
		}
	}
?>
													</select>
												</div>
												<div class="form-group" id = "div_servicios">
													<label class="control-label mb-10" for="div_servicios">
														Servicios:
													</label>
<?php 
	foreach ($especialidades as $e) {
?>
	<div class="checkbox checkbox-success checkbox-group required">
		<input id="checkboxServicio<?php echo $e->id; ?>" type="checkbox" 
			name ="especialidades[]" 
			value="<?php echo $e->id; ?>" onclick="listaServicios(this)">
		<label for="checkboxServicio<?php echo $e->id; ?>">
			<?php echo $e->nombre;?>
		</label>
	</div>
<?php
	}
 ?>


												</div>
<?php 
	foreach ($especialidades as $e) {
		$tagDivId = "div_servicio_".$e->id;
		$tagId = "servicio_".$e->id;
		$tagName = $tagId;
?>
												<div class="form-group" id = "<?php echo $tagDivId; ?>" 
													style="display: none;">
													<label class="control-label mb-10" for="email">
														<?php echo $e->nombre." - Seleccione Empleado: "; ?>
													</label>

													<select class="form-control" id="sel_<?php echo $tagId; ?>" 
															name ="sel_<?php echo $tagName; ?>" 
															>
														<option value = "0">Cualquiera</option>
													
<?php
		$cantEspecialistas = 0;
		foreach ($empleados_especialidades as $ee) {
			if($ee->id_especialidad == $e->id){
				$cantEspecialistas++;
				$chkId = "servicioEmp-".$e->id."-".$ee->id_usuario;
				$chkName = $chkId;
?>
													<option value="<?php echo $ee->id_usuario; ?>">
														<?php echo $ee->nombre_empleado; ?>
													</option>
<?php
				
			}
		}
?>
													</select>
		<input type="hidden" name = "cant-esp-<?php echo $e->id; ?>" id = "cant-esp-<?php echo $e->id; ?>" 
			value = "<?php echo $cantEspecialistas; ?>">
<?php
		/*if($cantEspecialistas == 0){
			echo "<p>No tenemos especialistas para este servicio en este momento.</p>";
		}*/
?>
														</div>
<?php														
	} 
?>
												<div class="form-group mb-0">
													<button type="submit" class="btn btn-success" id="submitButton" disabled>
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
		function listaServicios(check){
			//alert(check.value);
			if(check.checked){
				//alert("Quedó checkeado");
				$("#div_servicio_"+check.value).show(); 
				//CANTIDAD: alert($("#cant-esp-"+check.value).val());
				if( $("#cant-esp-"+check.value).val() > 0){
					$("#sel_servicio_"+check.value).show(); //MUESTRO EL DESPLEGABLE DE ESPECIALISTAS SI EXISTEN
				}
			}else{
				$("#div_servicio_"+check.value).hide(); 
				//alert("No quedó checkeado");
			}
			//Si esta al menos un servicio seleccionado
			if($('div.checkbox-group.required :checkbox:checked').length > 0){
				if ($("#submitButton").attr("disabled")) {
//					alert('The disabled attribute exists');
					$("#submitButton").attr("disabled", false);
				} else {

				}
			}else{
					$("#submitButton").attr("disabled", true);
//					alert('The disabled attribute does not exist');				

			}
		}
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