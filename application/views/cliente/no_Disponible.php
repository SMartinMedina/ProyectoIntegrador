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
					  <h5 class="txt-dark">form wizard</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="#"><span>forms</span></a></li>
						<li class="active"><span>form-wizard</span></li>
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
									<h6 class="panel-title txt-dark">Perdon, pero la pantalla no esta disponible ahora</h6>
								</div>
								<div class="clearfix"></div>
							</div>

									<?php
										echo anchor(
											'turnos/menuCliente',	//'controller/function/uri', 
											'Volver al inicio',		//'Link', 
											'class=""'); 
?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>