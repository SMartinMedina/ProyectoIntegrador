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
												echo form_open('turnos/editabd', $attributes);
											?>
											<!--<form>-->
												<div class="form-group">
													<input type="hidden" name="id_turno" id="id_turno" 
														value = "<?php echo $turno->id_turno; ?>"
													>
													<label class="control-label mb-10" for="id_cliente">cliente:</label>
													<select class="form-control" id = "id_cliente" name = "id_cliente">
<?php
	foreach ($clientes as $c) {
		if($c->id != 1){
?>
														<option value = "<?php echo $c->id; ?>"
<?php
														if($c->id == $turno->id_cliente){
															echo "selected = 'selected'";
														}
?>
															>
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
													<select class="form-control" 
															id = "sel_especialidades_empleado" 
															name = "id_especialidad"
															onchange="listaServicios(this)">
<?php
	foreach ($especialidades as $e) {
?>
														<option value = "<?php echo $e->id; ?>"
<?php
														if($e->id == $turno->id_especialidad){
															echo "selected = 'selected'";
														}
?>
															>
															<?php echo $e->nombre; ?>
														</option>

<?php
	}
?>
													</select>


												</div>
<?php 
	foreach ($especialidades as $e) {
		$tagDivId = "div_servicio_".$e->id;
		$tagId = "servicio_".$e->id;
		$tagName = $tagId;
?>
												<div class="form-group sel_empleados" id = "<?php echo $tagDivId; ?>" 
													style="display: none;">
													<label class="control-label mb-10" for="email">
														<?php echo $e->nombre." - Seleccione Empleado: "; ?>
													</label>

													<select class="form-control " id="sel_<?php echo $tagId; ?>" 
															name ="sel_<?php echo $tagName; ?>" 
															>
<?php
		$cantEspecialistas = 0;
		$min_demora = 0;
		$flag = 0;
		
		foreach ($empleados_especialidades as $ee) {
			if($ee->id_especialidad == $e->id){
				$cantEspecialistas++;
				$chkId = "servicioEmp-".$e->id."-".$ee->id_usuario;
				$chkName = $chkId;
				$selected = "";

				/**/
				foreach ($demora_empleado as $de) {
					if($de['id_usuario'] == $ee->id_usuario){
						$demoraEmpleadoEnMin =  "(".$de['demora_empleado']."min de Espera)";
						if($flag == 0){
							$min_demora = intVal($de['demora_empleado']);
							$flag = 1;
						}
						/*if($min_demora > intVal($de['demora_empleado'])){
							$selected = "selected = 'selected'";
							$min_demora = intVal($de['demora_empleado']);
						}else{
							$selected = "";
						}*/

					}
				}
				if($ee->id_usuario == $turno->id_empleado){
					$selected = "selected = 'selected'";
				}else{
					$selected = "";
				}

?>
													<option value="<?php echo $ee->id_usuario; ?>" 
														<?php echo $selected;?>>
														<?php echo $ee->nombre_empleado." ".$demoraEmpleadoEnMin; ?>
																											
													</option>
?>


<?php
				
			}
		}

		/*if($cantEspecialistas == 0){
			echo "<p>No tenemos especialistas para este servicio en este momento.</p>";
		}*/
?>
														</select>
		<input type="hidden" name = "cant-esp-<?php echo $e->id; ?>" id = "cant-esp-<?php echo $e->id; ?>" 
			value = "<?php echo $cantEspecialistas; ?>">														
														</div>
<?php														
	} 
?>
												<div class="form-group mb-0">
													<button type="submit" class="btn btn-success" id="submitButton">
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
		function listaServicios(select){
			//alert(check.value);
			$(".sel_empleados").hide();
			if(select.value){
				//$("#div_servicio_"+select.value).show(); 
				//CANTIDAD: alert($("#cant-esp-"+check.value).val());
				if( $("#cant-esp-"+select.value).val() > 0){
					$("#div_servicio_"+select.value).show(); //MUESTRO EL DESPLEGABLE DE ESPECIALISTAS SI EXISTEN
				}
			}else{
				$("#div_servicio_"+select.value).hide(); 
				//alert("No quedó checkeado");
			}
		}
		$(function() {
		    //$('#div_especialidades_empleado').hide(); 
		    $().ready(function(){
		    	var especialidad = $('#sel_especialidades_empleado').val(); 

		    	if( $("#cant-esp-"+especialidad).val() > 0){
					$("#div_servicio_"+especialidad).show(); //MUESTRO EL DESPLEGABLE DE ESPECIALISTAS SI EXISTEN
				}
				
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