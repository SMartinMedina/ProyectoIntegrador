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
					  <h5 class="txt-dark">Alta de Turno</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><span>Turnos</span></li>
						<li class="active"><span>Alta</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Alta</h6>
								</div>
								<div class="clearfix"></div>
							</div>

							<?php
							 	echo validation_errors();
								$attributes = array('class' => 'miFormulario', 'id' => 'idMiFormulario','data-toggle' => 'validator');
								echo form_open('turnos/altabd', $attributes);
							?>							
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div id="example-basic">
										<h3><span class="head-font capitalize-font">Seleccione Servicio</span></h3>
										<section>
																							<div class="form-group" id = "div_servicios">
													<label class="control-label mb-10" for="div_servicios">
														Servicios:
													</label>
<?php 
	foreach ($especialidades as $e) {
		$ya_tiene_turno=0;
		foreach($turnos_cliente as $tc){
			if($e->id==$tc->id_especialidad){
				$ya_tiene_turno=1;
			}
		}
		if($ya_tiene_turno==0){
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
	}
 ?>


												</div>
										</section>
										<h3><span class="head-font capitalize-font">Seleccione Especialista</span></h3>
										<section>
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
															onchange = "confirmaEmp(this)">
													
<?php
		$cantEspecialistas = 0;
		foreach ($empleados_especialidades as $ee) {
			if($ee->id_especialidad == $e->id){
						$cantEspecialistas++;
						$chkId = "servicioEmp-".$e->id."-".$ee->id_usuario;
						$chkName = $chkId;
						/**/
						foreach ($demora_empleado as $de) {
							if($de['id_usuario'] == $ee->id_usuario){
								$demoraEmpleadoEnMin =  "(".$de['demora_empleado']."min de Espera)";
								if($flag == 0){
									$min_demora = intVal($de['demora_empleado']);
									$flag = 1;
								}
								if($min_demora > intVal($de['demora_empleado'])){
									$selected = "selected = 'selected'";
									$min_demora = intVal($de['demora_empleado']);
								}else{
									$selected = "";
								}
							}
						}
?>
														<option value="<?php echo $e->id.'-'.$ee->id_usuario; ?>"
															<?php echo $selected;?>>
														<?php echo $ee->nombre_empleado." ".$demoraEmpleadoEnMin; ?>
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
										</section>
										<h3>
											<span class="head-font capitalize-font">
												Confirme Turno
											</span>
										</h3>
										<section>
<?php
											foreach($especialidades as $e){
?>
											<div id="esp-<?php echo $e->id; ?>" style = "display:none;">
<?php
												echo "<h4>".$e->nombre."</h4>";
												foreach ($empleados_especialidades as $ee) {
?>
														<div class = "esp-emp-<?php echo $e->id; ?>" 
															id="esp-emp-<?php echo $e->id.'-0';?>" 
															style ="display: none;">
<?php														
															echo "<p>Cualquiera</p>";
?>
														</div>
<?php														
													if($ee->id_especialidad == $e->id){
?>
														<div class = "esp-emp-<?php echo $e->id; ?>" 
															id="esp-emp-<?php echo $e->id.'-'.$ee->id_usuario; ?>" 
															style ="display: none;">
<?php														
															echo "<p>".$ee->nombre_empleado."</p>";
?>
														</div>
<?php
													}
												}
?>
											</div>
<?php												
											}
?>
											<button class = "btn btn-primary  text-aling-right" id = "finishButtonForm">
												Confirmar turno
											</button>

<br /><br /><br /><br />

									<?php
										echo anchor(
											'turnos/menuCliente',	//'controller/function/uri', 
											'Volver al inicio',		//'Link', 
											'class=""'); 
?>
											
											

										</section>

									</div>
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
</body>
<script type="text/javascript">
		function listaServicios(check){
			//alert(check.value);
			var id_servicio = check.value;
			var idConfirmEsp    = "esp-"+id_servicio;
			var idConfirmEspEmp = "esp-emp-"+id_servicio+"-0";//Cualquiera
			if(check.checked){
				//alert("Quedó checkeado");
				//TAB SELECCION ESPECIALISTA
				$("#div_servicio_"+id_servicio).show(); 
				
				//TAB CONFIRMACION TURNO
				$("#"+idConfirmEsp).show();//<- Titulo con el nombre de la especialidad
				$("#"+idConfirmEspEmp).show();//<- Titulo con el nombre del especialista de la especialidad

				if( $("#cant-esp-"+id_servicio).val() > 0){
					$("#sel_servicio_"+id_servicio).show(); //MUESTRO EL DESPLEGABLE DE ESPECIALISTAS SI EXISTEN


					if($("#sel_servicio_"+id_servicio).val()){
						var servEmp = $("#sel_servicio_"+id_servicio).val();

						var res = servEmp.split("-");

						var id_servicio = res[0];
						var id_empleado = res[1];

						var idConfirmEsp    = "esp-"+id_servicio;
						var idConfirmEspEmp = "esp-emp-"+id_servicio+"-"+id_empleado;



						var todosLosEspecialistasXespecialidad = "esp-emp-"+id_servicio;

						$("."+todosLosEspecialistasXespecialidad).hide(); 

						$("#"+idConfirmEsp).show(); 
						$("#"+idConfirmEspEmp).show(); 
					}
				}
			}else{

				//alert("Quedó checkeado");
				//TAB SELECCION ESPECIALISTA
				$("#sel_servicio_"+id_servicio).val(id_servicio+"-0"); //selecciono CUALQUIERA
				$("#div_servicio_"+id_servicio).hide(); //OCULTO EL DESPLEGABLE DE ESPECIALISTAS SI EXISTEN
				
				//TAB CONFIRMACION TURNO
				$("#"+idConfirmEsp).hide();//<- Titulo con el nombre de la especialidad
				$("#"+idConfirmEspEmp).hide();//<- Titulo con el nombre del especialista de la especialidad

				var todosLosEspecialistasXespecialidad = "esp-emp-"+id_servicio;

				$("."+todosLosEspecialistasXespecialidad).hide(); 
			}
			//Si esta al menos un servicio seleccionado
			if($('div.checkbox-group.required :checkbox:checked').length > 0){
				if ($("#nextButton").attr("disabled")) {
//					alert('The disabled attribute exists');
//					$("#submitButton").attr("disabled", false);
					$("#nextButton").attr("disabled", false);
		    		$("#previousButton").attr("disabled", false);
		    		$("#finishButtonForm").attr("disabled", false);
			    	$("#nextButton" ).show(); 
			    	//$("#previousButton").show(); 
			    	$("#finishButtonForm").show(); 
				} else {

				}
			}else{
		    	$("#nextButton" ).hide(); 
		    	$("#previousButton").hide(); 
		    	$("#finishButtonForm").hide(); 
		    	$("#nextButton").attr("disabled", true);
		    	$("#previousButton").attr("disabled", true);
		    	$("#finishButtonForm").attr("disabled", true);
//					alert('The disabled attribute does not exist');				

			}
		}

		function confirmaEmp(select){

			if(select.value){
				var servEmp = select.value;

				var res = servEmp.split("-");

				var id_servicio = res[0];
				var id_empleado = res[1];

				var idConfirmEsp    = "esp-"+id_servicio;
				var idConfirmEspEmp = "esp-emp-"+id_servicio+"-"+id_empleado;



				var todosLosEspecialistasXespecialidad = "esp-emp-"+id_servicio;

				$("."+todosLosEspecialistasXespecialidad).hide(); 

				$("#"+idConfirmEsp).show(); 
				$("#"+idConfirmEspEmp).show(); 
			}else {

				$("#div_servicio_"+check.value).hide(); 
			}
		}

		$(function() {
		    //$('#div_especialidades_empleado').hide(); 
		    $().ready(function(){

		    	$("#nextButton" ).hide(); 
		    	$("#previousButton").hide(); 
		    	$("#finishButtonForm").hide(); 
		    	$("#nextButton").attr("disabled", true);
		    	$("#previousButton").attr("disabled", true);
		    	$("#finishButtonForm").attr("disabled", true);

		    	$("#finishButton").attr("disabled", true);
		    	$("#finishButton").hide(); 


		    	/*$("#nextButton" ).addClass('disabled');
		    	$("#finishButton" ).addClass('disabled');
				
				$("#nextButton").attr("disabled", true);
				$("#finishButton").attr("disabled", true);*/
		    	//$("#finishButton").attr("disabled", true);


				
		    	if($('#id_rol').val() == '2') {
		            $('#div_especialidades_empleado').show(); 
		        } else {
		            $('#div_especialidades_empleado').hide(); 
		        } 
		    });

		    $('#finishButtonForm').click(function(){
		    	//alert("CLICKEADO!");
		    	$( "#idMiFormulario" ).submit();
		    	//var val = $("input[type=submit][clicked=true]").val();
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