
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
						  <h5 class="txt-dark">Menu Cliente</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><?php
									echo anchor(
										'usuarios/panel',	//'controller/function/uri', 
										"<span>Menu</span>",		//'Link', 
										'class=""'); 
								?>
							</li>
							<li class="active"><span>Menu Cliente</span></li>
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
									<h6 class="panel-title txt-dark">Opciones</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="panel-body">
									<?php
										echo anchor(
											'turnos/alta',	//'controller/function/uri', 
											'<button class="btn btn-default btn-block">Nuevo Turno</button>',		//'Link', 
											'class=""'); 
?>
										<br />
<?php										
										echo anchor(
											'turnos/panelTurnosPorCliente',	//'controller/function/uri', 
											'<button class="btn btn-default btn-block">Mis Turnos</button>',		//'Link', 
											'class=""'); 
									?>

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