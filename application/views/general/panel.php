	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		<div class="wrapper box-layout theme-1-active pimary-color-green">
			
			<!-- Top Menu Items -->
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="mobile-only-brand pull-left">
					<div class="nav-header pull-left">
						<div class="logo-wrap">
							<a href="index.html">
								<img class="brand-img" src="<?php echo base_url();?>img/logo.png" alt="brand"/>
								<span class="brand-text">LASTIT</span>
							</a>
						</div>
					</div>	
					<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
					<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
					<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
				</div>
				<div id="mobile_only_nav" class="mobile-only-nav pull-right">
					<ul class="nav navbar-right top-nav pull-right">
						<li class="dropdown auth-drp">
							<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?php echo base_url();?>img/user1.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
							<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
								<li>
									<a href="profile.html"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="#"><i class="zmdi zmdi-power"></i><span>Salir</span></a>
								</li>
							</ul>
						</li>
					</ul>
				</div>	
			</nav>
			<!-- /Top Menu Items -->
			
			<!-- Left Sidebar Menu -->
			<div class="fixed-sidebar-left">
				<ul class="nav navbar-nav side-nav nicescroll-bar">
					<li class="navigation-header">
						<span>Main</span> 
						<i class="zmdi zmdi-more"></i>
					</li>
<?php
		if($this->session->userdata('id_rol_usuario') == 1){
?>

					<li>
<?php
						$linkTurnos = "<div class=\"pull-left\">";
						$linkTurnos .= "<i class=\"zmdi zmdi-book mr-20\"></i>";
						$linkTurnos .= "<span class=\"right-nav-text\">Turnos</span>";
						$linkTurnos .= "</div>";
						$linkTurnos .= "<div class=\"clearfix\"></div>";							
						echo anchor(
							'turnos/panel',	//'controller/function/uri', 
							$linkTurnos,		//'Link', 
							'class=""
							'); 
?>						
					</li>
					<li>
<?php
						$linkServicios = "<div class=\"pull-left\">";
						$linkServicios .= "<i class=\"zmdi zmdi-book mr-20\"></i>";
						$linkServicios .= "<span class=\"right-nav-text\">Servicios</span>";
						$linkServicios .= "</div>";
						$linkServicios .= "<div class=\"clearfix\"></div>";							
						echo anchor(
							'especialidadesEmpleados/panel',	//'controller/function/uri', 
							$linkServicios,		//'Link', 
							'class=""
							'); 
?>
					</li>
					<li>
<?php
						$linkRoles = "<div class=\"pull-left\">";
						$linkRoles .= "<i class=\"zmdi zmdi-book mr-20\"></i>";
						$linkRoles .= "<span class=\"right-nav-text\">Roles de Sistema</span>";
						$linkRoles .= "</div>";
						$linkRoles .= "<div class=\"clearfix\"></div>";							
						echo anchor(
							'roles/panel',	//'controller/function/uri', 
							$linkRoles,		//'Link', 
							'class=""
							'); 
?>						
					</li>
					<li>
<?php
						$linkUsuarios = "<div class=\"pull-left\">";
						$linkUsuarios .= "<i class=\"zmdi zmdi-book mr-20\"></i>";
						$linkUsuarios .= "<span class=\"right-nav-text\">Usuarios</span>";
						$linkUsuarios .= "</div>";
						$linkUsuarios .= "<div class=\"clearfix\"></div>";							
						echo anchor(
							'usuarios/panel',	//'controller/function/uri', 
							$linkUsuarios,		//'Link', 
							'class=""
							'); 
?>
					</li>
					<li><hr class="light-grey-hr mb-10"></li><!-- LINEA DIVISORIA -->

<?php			
		}
?>
					<li>
					<?php 
						$linkLogout = "<div class=\"pull-left\">";
						$linkLogout .= "<i class=\"zmdi zmdi-book mr-20\"></i>";
						$linkLogout .= "<span class=\"right-nav-text\">Salir</span>";
						$linkLogout .= "</div>";
						$linkLogout .= "<div class=\"clearfix\"></div>";							
						echo anchor(
							'login/logout',	//'controller/function/uri', 
							$linkLogout,		//'Link', 
							'class=""
							'); 
					//<a href="http://domain.com/index.php/controller/function/uri" class="link-class">Link</a>
					?>
					</li>


<?php
?>					
					
				</ul>
			</div>
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
									<h6 class="panel-title txt-dark">Listado</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<button class="btn btn-success">Alta de Turno</button>
									<!--<p class="text-muted">Add class <code>table</code> in table tag.</p>-->
									<div class="table-wrap mt-40">
										<div class="table-responsive">
											<table class="table mb-0">
												<thead>
												  <tr>
													<th>#</th>
													<th>Cliente</th>
													<th>Empleado</th>
													<th>Servicio</th>
													<th>Estado</th>
													<th></th>
												  </tr>
												</thead>
												<tbody>
											<?php
												foreach($turnos as $t){
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
															echo $t->nombre_empleado;
														?>
													</td>
													<td>
														<?php
															echo $t->nombre_especialidades_usuarios;
														?>
													</td>
													<td>
														<?php
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
															}else if( $t->id_estado_turno == 3){
														?>
															<span class="label label-danger">
															
														<?php
																echo $t->nombre_estado_turno;
														?>																
															</span>
														<?php
															}
														?>
													</td>
													<td>
<?php
	echo anchor(
		'turnos/baja/'.$t->id_turno,											//'controller/function/uri', 
		'<i class="fa fa-eye" aria-hidden="true"></i> Ver',		//'Link', 
		'class=""
		'); 
?>
 | 
<?php
	echo anchor(
		'turnos/baja/'.$t->id_turno,											//'controller/function/uri', 
		'<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar ',		//'Link', 
		'class=""
		'); 
?>
 | 
<?php
	echo anchor(
		'turnos/edita/'.$t->id_turno,											//'controller/function/uri', 
		'<i class="fa fa-edit" aria-hidden="true"></i> Editar ',		//'Link', 
		'class=""
		'); 
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