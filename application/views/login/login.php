	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper  pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="<?php echo site_url('Login/index');?>">
						<img class="brand-img mr-10" src="<?php echo base_url();?>img/logo.png" alt="brand"/>
						<span class="brand-text">IL FIGARO</span>
					</a>
				</div>
				<div class="form-group mb-0 pull-right">
					<span class="inline-block pr-10">No estás registrado?</span>
					<?php 
						echo anchor(
							'login/signupForm',	//'controller/function/uri', 
							'Registrese',				//'Link', 
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
											<h3 class="text-center txt-dark mb-10">Conectarse a IL FIGARO</h3>
											<h6 class="text-center nonecase-font txt-grey">Ingrese sus datos</h6>
										</div>	
										<div class="form-wrap">
											<!--<form action="#">-->
											<?php
											 	echo validation_errors();
												$attributes = array('class' => 'miFormulario', 'id' => 'idMiFormulario','data-toggle' => 'validator');
												echo form_open('login/tryLogin', $attributes);
											?>
												<div class="form-group">
													<label class="control-label mb-10" for="email">
														Correo Electrónico
													</label>
													<input 
														type="email" 
														class="form-control" 
														placeholder="Ingrese su email"
														id="email" 
														name="email"	
														value="<?php echo set_value('email'); ?>" 
														data-error="No posee formato valido." 
														required
														>
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="pass">
														Password
													</label>
													<a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="<?php echo site_url('Login/forgot');?>">Olvidó su password ?</a>
													<div class="clearfix"></div>
													<input 
														type="password" 
														class="form-control" 
														placeholder="Ingrese su password"
														id="pass" 
														name="pass"	
														value="<?php echo set_value('pass'); ?>" 
														required>
												</div>
												<!--
												<div class="form-group">
													<div class="checkbox checkbox-primary pr-10 pull-left">
														<input id="checkbox_2" required="" type="checkbox">
														<label for="checkbox_2"> Keep me logged in</label>
													</div>
													<div class="clearfix"></div>
												</div>-->
												<div class="form-group text-center">
													<button type="submit" class="btn btn-success btn-rounded">Conectar</button>
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
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
	</body>