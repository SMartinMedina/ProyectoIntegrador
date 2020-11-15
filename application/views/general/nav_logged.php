			<!-- Top Menu Items -->
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="mobile-only-brand pull-left">
					<div class="nav-header pull-left">
						<div class="logo-wrap">
						<?php 	
							if($this->session->userdata('id_rol_usuario')==3){
								$url='Turnos/menuCliente';
							}else{
								$url='panelturno';
							}
							?>
							<a href="<?php echo site_url($url);?> ">
								<img class="brand-img" src="<?php echo base_url();?>img/logo.png" alt="brand"/>
								<span class="brand-text">IL FIGARO</span>
							</a>
						</div>
					</div>	
					<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
					<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
				</div>
				<div id="mobile_only_nav" class="mobile-only-nav pull-right">
					<ul class="nav navbar-right top-nav pull-right">
						<li class="dropdown auth-drp">
							<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?php echo base_url();?>img/user1.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
							<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
<?php
								$link = "<li><a href='".site_url()."/usuarios/perfil'>";
								$link .= "<i class='zmdi zmdi-account'></i><span>Perfil</span></a></li>";
								echo anchor(
											'usuarios/perfil',	//'controller/function/uri', 
											$link,		//'Link', 
											'class=""'); 
?>
								<li class="divider"></li>
<?php
								$link = "<li><a href='".site_url()."/login/logout'>";
								$link .= "<i class='zmdi zmdi-power'></i><span>Salir</span></a></li>";
								echo anchor(
											'login/logout',	//'controller/function/uri', 
											$link,		//'Link', 
											'class=""'); 
?>

							</ul>
						</li>
					</ul>
				</div>	
			</nav>
			<!-- /Top Menu Items -->