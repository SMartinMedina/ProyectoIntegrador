<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper box-layout pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="index.html">
						<img class="brand-img mr-10" src="<?php echo base_url();?>img/logo.png" alt="brand"/>
						<span class="brand-text">LASTIT</span>
					</a>
				</div>
				<div class="form-group mb-0 pull-right">
					<span class="inline-block pr-10">Ya recordo su contraseña?</span>
					<?php 
						echo anchor(
							'login/index',	//'controller/function/uri', 
							'Conectese',		//'Link', 
							'class="inline-block btn btn-success btn-rounded btn-outline"
					'); 
					//<a href="http://domain.com/index.php/controller/function/uri" class="link-class">Link</a>
					?>
				</div>
				<div class="clearfix"></div>
			</header>
			
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Exito</h3>
                                            <h6 class="text-center nonecase-font txt-grey">Su mail a sido encontrado. El email de recupercion debenra llegarle en cualquier momento</h6>
										</div>	
										
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
	</body>