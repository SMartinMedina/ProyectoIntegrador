<div class="fixed-sidebar-left">
				<ul class="nav navbar-nav side-nav nicescroll-bar">
					<li class="navigation-header">
						<span>Main</span> 
						<i class="zmdi zmdi-more"></i>
					</li>
					<!--<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#submenu_usuarios">
						<div class="pull-left">
							<i class="zmdi zmdi-landscape mr-20"></i>
							<span class="right-nav-text">
								Usuarios
							</span>
						</div>
						<div class="pull-right">
							<i class="zmdi zmdi-caret-down"></i>
						</div>
						<div class="clearfix"></div>
					</a>
					</li>-->
<?php
		if($this->session->userdata('id_rol_usuario') == 1){
			$urlParts = explode("/", $main);
			$seccionUrl = $urlParts[0]; 
			$turnosActive = ""; $estadosTurnosActive = ""; 
			$serviciosActive = ""; $rolesActive = ""; $usuariosActive = "";
			switch ($seccionUrl) {
				case 'especialidadesEmp':
					$serviciosActive = "'active'";
					break;				
				case 'estadosTurno':
					$estadosTurnosActive = "'active'";
					break;				
				case 'roles':
					$rolesActive = "'active'";
					break;				
				case 'turnos':
					$turnosActive = "'active'";
					break;				
				case 'usuarios':
					$usuariosActive = "'active'";
					break;				
				default:
					
					break;
			}
			$this->load->view('general/boton_menu_lateral.php', array(
																"seccionUrl" => "turnos",
																"seccion" => "Turnos",
																"icon" => " zmdi-book ",
																"active" => $turnosActive ));
			$this->load->view('general/boton_menu_lateral.php', array(
																"seccionUrl" => "EspecialidadesEmpleados",
																"seccion" => "Servicios",
																"icon" => " zmdi-book ",
																"active" => $serviciosActive ));
			$this->load->view('general/boton_menu_lateral.php', array(
																"seccionUrl" => "Roles",
																"seccion" => "Roles de Sistema",
																"icon" => " zmdi-book ",
																"active" => $rolesActive ));
			$this->load->view('general/boton_menu_lateral.php', array(
																"seccionUrl" => "Usuarios",
																"seccion" => "Usuarios",
																"icon" => " zmdi-book ",
																"active" => $usuariosActive ));
			$this->load->view('general/boton_menu_lateral.php', array(
																"seccionUrl" => "EstadosTurnos",
																"seccion" => "Estados Turnos",
																"icon" => " zmdi-book ",
																"active" => $estadosTurnosActive ));

		}else if($this->session->userdata('id_rol_usuario') == 2){
			$urlParts = explode("/", $main);
			$seccionUrl = $urlParts[0]; 
			$lista = "";
			switch ($seccionUrl) {
				case 'turnos':
					$lista = "'active'";
					break;							
				default:
					
					break;
			}
			$this->load->view('general/boton_menu_lateral.php', array(
																"seccionUrl" => "turnos",
																"seccion" => "Lista de turnos",
																"icon" => " zmdi-book ",
																"active" => $lista ));

		}else if($this->session->userdata('id_rol_usuario') == 4){
			$urlParts = explode("/", $main);
			$seccionUrl = $urlParts[0]; 
			$lista = "";
			$especialistas="";
			switch ($seccionUrl) {
				case 'turnos':
					$lista = "'active'";
					break;
				/*case 'usuarios'
					$especialistas="'active'";
					break;*/
				default:
					
					break;
			}
			$this->load->view('general/boton_menu_lateral.php', array(
																"seccionUrl" => "turnos",
																"seccion" => "Lista de turnos de especialistas",
																"icon" => " zmdi-book ",
																"active" => $lista ));
			$this->load->view('general/boton_menu_lateral.php', array(
																	"seccionUrl" => "usuarios",
																	"seccion" => "Lista de especialistas",
																	"icon" => " zmdi-book ",
																	"active" => $especialistas ));													

		}
?>					
	<li><hr class="light-grey-hr mb-10"></li><!-- LINEA DIVISORIA -->
					<li>
					<?php 
						$linkLogout = "<div class=\"pull-left\">";
						$linkLogout .= "<i class=\"zmdi zmdi-book mr-20\"></i>";
						$linkLogout .= "<span class=\"right-nav-text\">Perfil</span>";
						$linkLogout .= "</div>";
						$linkLogout .= "<div class=\"clearfix\"></div>";							
						echo anchor(
							'usuarios/perfil',	//'controller/function/uri', 
							$linkLogout,		//'Link', 
							'class=""
							'); 
					//<a href="http://domain.com/index.php/controller/function/uri" class="link-class">Link</a>
					?>
					</li>
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