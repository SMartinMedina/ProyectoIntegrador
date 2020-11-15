<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turnos extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('turnosCRUD');
        $this->load->model('usuariosCRUD');
        $this->load->model('especialidadesEmpleadosCRUD');
        $this->load->model('usuariosEspecialidadesCRUD');
        
	}
	public function panel(){
        if($this->session->userdata('id_rol_usuario') == 1){
            $turnos = $this->turnosCRUD->getTurnos();
            $this->load->view("index.php", 
                                    array(
                                        "header" => 'header_unlogged.php',
                                        "main" => 'turnos/panel.php',
                                        "footer" => 'footer_unlogged.php',
                                        "turnos" => $turnos ));
        }elseif($this->session->userdata('id_rol_usuario') == 2){
            //$empleados = $this->usuariosCRUD->getEmpleadoshabiles();
            //$turnos = $this->turnosCRUD->getTurnos();
            $id_empleado=$this->session->userdata('id_usuario');
            $turnos = $this->turnosCRUD->getTurnosEmp($id_empleado);
            $empleado = $this->usuariosCRUD->getEmpleadodiponibilidad($this->session->userdata('id_usuario'));
                foreach($empleado as $e){
                                        $horario_entrada=$e->horario_entrada;
                                        $horario_salida=$e->horario_salida;
                                        $id=$e->id;
                                    }       
                $this->load->view("index.php", 
                                    array(
                                        "header" => 'header_unlogged.php',
                                        "main" => 'turnos/control.php',
                                        "footer" => 'footer_unlogged.php',
                                        "turnos" => $turnos,
                                        "horario_entrada" =>$horario_entrada,
                                        "horario_salida"=>$horario_salida,
                                        "id"=>$id));    
        }elseif($this->session->userdata('id_rol_usuario') == 4){
            $empleados = $this->usuariosCRUD->getEmpleados();
            $id_empleado=0;
            if((isset($_POST['empleado']))&&($_POST['empleado']!=0)){
                $id_empleado=$_POST['empleado'];
                $turnos = $this->turnosCRUD->getTurnosEmp($id_empleado);
            }else{
                $turnos = $this->turnosCRUD->getTurnosEmpleados();
            }
            $this->load->view("index.php", 
                array(
                "header" => 'header_unlogged.php',
                "main" => 'turnos/controla.php',
                "footer" => 'footer_unlogged.php',
                "turnos" => $turnos, 
                "empleados" => $empleados,
                "id_empleado"=> $id_empleado));                         
        }else{
            redirect('login');
        }   
    }
	public function panelTurnosPorCliente(){
		if($this->session->userdata('id_rol_usuario') == 3){	
			$turnos = $this->turnosCRUD->getTurnosClienteById($this->session->userdata('id_usuario'));
			$this->load->view("index.php", 
								array(
									"header" => 'header_unlogged.php',
									"main" => 'cliente/turnos.php',
									"footer" => 'footer_unlogged.php',
									"turnos" => $turnos ));
		}else{
			redirect('login');
		}	
	}
	public function alta(){
		if($this->session->userdata('id_rol_usuario') == 1){
			//$roles = "";
			$clientes = $this->usuariosCRUD->getClientes();
			$empleados = $this->usuariosCRUD->getEmpleadosHabiles();
			$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidadesDisponibles();
			$empleados_especialidades_bd = $this->usuariosEspecialidadesCRUD->getUsuariosEspecialidadesHabiles();
			$empleados_especialidades = array();

			foreach ($empleados as $e) {
				$cant_minutos_demora = 0;
				foreach ($empleados_especialidades_bd as $ee) {
					if($e->id == $ee->id_usuario){
						$cantTurnosEnEsperaPorEmpPorEsp = $this->turnosCRUD->getCantTurnosEnEsperaPorEmpPorEsp(
																					$ee->id_usuario,
																					$ee->id_especialidad);
					
						$cant_minutos_demora = intval($cant_minutos_demora) + (intval($cantTurnosEnEsperaPorEmpPorEsp[0]->cant) * intval($ee->demora_min));
					}
				}
				$emp_esp = array(
								'id' => $ee->id, 
								'id_usuario' => $e->id, 
								'nombre_empleado' => $ee->nombre_empleado, 
								'id_especialidad' => $ee->id_especialidad, 
								'nombre_especialidad_empleado' => $ee->nombre_especialidad_empleado, 
								'demora_empleado' => $cant_minutos_demora 
							);
				array_push($empleados_especialidades, $emp_esp);

			}

			

			$this->load->view("index.php", 
								array(
								"header" => 'header_unlogged.php',
								"main" => 'turnos/alta.php',
								"footer" => 'footer_unlogged.php',
								"clientes" => $clientes,
								"especialidades" => $especialidades,
								"empleados" => $empleados,
								"empleados_especialidades" => $empleados_especialidades_bd,
								"demora_empleado" => $empleados_especialidades
								));
		}else if($this->session->userdata('id_rol_usuario') == 3){
			$clientes = $this->usuariosCRUD->getClientes();
			$empleados = $this->usuariosCRUD->getEmpleadosHabiles();
			$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidadesDisponibles();
			$empleados_especialidades_bd = $this->usuariosEspecialidadesCRUD->getUsuariosEspecialidadesHabiles();

			$length=sizeof($empleados);
			$empleados_especialidades = array();
			if($length>0){
			foreach ($empleados as $e) {
				$cant_minutos_demora = 0;
				foreach ($empleados_especialidades_bd as $ee) {
					if($e->id == $ee->id_usuario){
						$cantTurnosEnEsperaPorEmpPorEsp = $this->turnosCRUD->getCantTurnosEnEsperaPorEmpPorEsp(
																					$ee->id_usuario,
																					$ee->id_especialidad);
					
						$cant_minutos_demora = intval($cant_minutos_demora) + (intval($cantTurnosEnEsperaPorEmpPorEsp[0]->cant) * intval($ee->demora_min));
						}
					}
					$emp_esp = array(
									'id' => $ee->id, 
									'id_usuario' => $e->id, 
									'nombre_empleado' => $ee->nombre_empleado, 
									'id_especialidad' => $ee->id_especialidad, 
									'nombre_especialidad_empleado' => $ee->nombre_especialidad_empleado, 
									'demora_empleado' => $cant_minutos_demora 
								);
					array_push($empleados_especialidades, $emp_esp);

				}


				$this->load->view("index.php", 
							array(
								"header" => 'header_unlogged.php',
								"main" => 'cliente/alta.php',
								"footer" => 'footer_unlogged.php',
								"clientes" => $clientes,
								"empleados" => $empleados,
								"especialidades" => $especialidades,
								"empleados_especialidades" => $empleados_especialidades_bd,
								"demora_empleado" => $empleados_especialidades));
				
			}else{
				$this->load->view("index.php", 
							array(
								"header" => 'header_unlogged.php',
								"main" => 'cliente/no_Disponible.php',
								"footer" => 'footer_unlogged.php'));
			}

		}else{
				redirect('login');
		}							
	}
	function getDemoraEmpleado($emp_serv_demora, $id_usuario){
		$cant_minutos_demora = 0;
		foreach ($emp_serv_demora as $esd) {
			//var_dump($esd);
			if($esd['id_empleado'] == $id_usuario){
				$cant_minutos_demora = $esd['demora_min'];
			}
		}
		return $cant_minutos_demora;
	}
	function menuCliente(){
		$this->load->view("index.php", 
			array(
				"header" => 'header_unlogged.php',
				"main" => 'cliente/menu.php',
				"footer" => 'footer_unlogged.php'));
	}
	public function altabd(){
		if($this->session->userdata('id_rol_usuario') == 1){
			foreach ($_POST['especialidades'] as $id_especialidad) {

				$POSTEmpServicio = "sel_servicio_".$id_especialidad;
				if($_POST[$POSTEmpServicio] != 0){
					$id_cliente = $_POST["id_cliente"];
					$id_empleado = $_POST[$POSTEmpServicio];
					$id_servicio = $id_especialidad;
					$id_estado_turno = 1; //Se setea por default estado "EN ESPERA"
							
					$id_turno = $this->turnosCRUD->altaTurno($id_cliente, $id_empleado,$id_servicio, $id_estado_turno);
					$this->turnosCRUD->registrarCambioEstadoTurno($id_turno,1); // 1: En Espera
				}
			}
			
			$this->panel();
		}else if($this->session->userdata('id_rol_usuario') == 3){
			$id_cliente = $this->session->userdata('id_usuario');
			$cliente = $this->usuariosCRUD->getUsuario($id_cliente);
			$servicios_especialistas_msj = "";
			foreach ($_POST['especialidades'] as $id_especialidad) {

				$POSTEmpServicio = "sel_servicio_".$id_especialidad;
				if($_POST[$POSTEmpServicio] != 0){
					
					$idservicio_idempleado = $_POST[$POSTEmpServicio];
					$idservicio_idempleado_arr = explode("-", $idservicio_idempleado);
					$id_empleado = $idservicio_idempleado_arr[1]; // 
					$empleado = $this->usuariosCRUD->getUsuario($id_empleado);
					$id_servicio = $id_especialidad;
					$servicio = $this->especialidadesEmpleadosCRUD->getEspecialidad($id_especialidad);
					$id_estado_turno = 1; //Se setea por default estado "EN ESPERA"
					$email=$this->session->userdata('email_usuario');
					$this->turnosCRUD->altaTurno($id_cliente, $id_empleado,$id_servicio, $id_estado_turno);
					$servicios_especialistas_msj .= "<h3>".$servicio->nombre."</h3>";
					$servicios_especialistas_msj .= "<h4>".$empleado->nombre_usuario."</h4>";
					$servicios_especialistas_msj .= "<hr />";
				}else{

					// A DEFINIR
				}
			}
			$mensaje = $this->buildMensajeAltaTurno($cliente->nombre_usuario, $servicios_especialistas_msj);
    		$config = array (
				                  'mailtype' => 'html',
				                  'charset'  => 'utf-8',
				                  'priority' => '1'
				                   );
            $this->email->initialize($config);
            $this->email->from('no-reply@lastit.com', 'LastIt.com');
            $this->email->to($email);
            $this->email->subject('Alta de Turno');
            $this->email->message($mensaje);
            $this->email->send();

			$this->menuCliente($servicios_especialistas_msj);
		}else{
			redirect('login');
		}	
	}
	public function baja($id_turno){
		if($this->session->userdata('id_rol_usuario') == 1){
			$turno = $this->turnosCRUD->getTurno($id_turno);
			$clientes = $this->usuariosCRUD->getClientes();
			$empleados = $this->usuariosCRUD->getEmpleados();
			$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidadesDisponibles();
			$empleados_especialidades_bd = $this->usuariosEspecialidadesCRUD->getUsuariosEspecialidades();
			$empleados_especialidades = array();

			foreach ($empleados as $e) {
				$cant_minutos_demora = 0;
				foreach ($empleados_especialidades_bd as $ee) {
					if($e->id == $ee->id_usuario){
						$cantTurnosEnEsperaPorEmpPorEsp = $this->turnosCRUD->getCantTurnosEnEsperaPorEmpPorEsp(
																					$ee->id_usuario,
																					$ee->id_especialidad);
					
						$cant_minutos_demora = intval($cant_minutos_demora) + (intval($cantTurnosEnEsperaPorEmpPorEsp[0]->cant) * intval($ee->demora_min));
					}
				}
				$emp_esp = array(
								'id' => $ee->id, 
								'id_usuario' => $e->id, 
								'nombre_empleado' => $ee->nombre_empleado, 
								'id_especialidad' => $ee->id_especialidad, 
								'nombre_especialidad_empleado' => $ee->nombre_especialidad_empleado, 
								'demora_empleado' => $cant_minutos_demora 
							);
				array_push($empleados_especialidades, $emp_esp);

			}
			//$this->load->view("turnos/edita", array("turno"=> $turno));
			$this->load->view("index.php", 
					array(
					"header" => 'header_unlogged.php',
					"main" => 'turnos/baja.php',
					"footer" => 'footer_unlogged.php',
					"clientes" => $clientes,
					"especialidades" => $especialidades,
					"empleados" => $empleados,
					"empleados_especialidades" => $empleados_especialidades_bd,
					"demora_empleado" => $empleados_especialidades,
					"turno" => $turno
					));
		}else{
			redirect('login');
		}		
	}
	public function bajabd(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$id_turno = $_POST['id_turno'];
			$this->turnosCRUD->bajaTurno($id_turno);
			$this->panel();
		}else{
			redirect('login');
		}		
	}	
	public function edita($id_turno){
		if($this->session->userdata('id_rol_usuario') == 1){
			$turno = $this->turnosCRUD->getTurno($id_turno);
			$clientes = $this->usuariosCRUD->getClientes();
			$empleados = $this->usuariosCRUD->getEmpleados();
			$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidadesDisponibles();
			$empleados_especialidades_bd = $this->usuariosEspecialidadesCRUD->getUsuariosEspecialidades();
			$empleados_especialidades = array();

			foreach ($empleados as $e) {
				$cant_minutos_demora = 0;
				foreach ($empleados_especialidades_bd as $ee) {
					if($e->id == $ee->id_usuario){
						$cantTurnosEnEsperaPorEmpPorEsp = $this->turnosCRUD->getCantTurnosEnEsperaPorEmpPorEsp(
																					$ee->id_usuario,
																					$ee->id_especialidad);
					
						$cant_minutos_demora = intval($cant_minutos_demora) + (intval($cantTurnosEnEsperaPorEmpPorEsp[0]->cant) * intval($ee->demora_min));
					}
				}
				$emp_esp = array(
								'id' => $ee->id, 
								'id_usuario' => $e->id, 
								'nombre_empleado' => $ee->nombre_empleado, 
								'id_especialidad' => $ee->id_especialidad, 
								'nombre_especialidad_empleado' => $ee->nombre_especialidad_empleado, 
								'demora_empleado' => $cant_minutos_demora 
							);
				array_push($empleados_especialidades, $emp_esp);

			}
			//$this->load->view("turnos/edita", array("turno"=> $turno));
			$this->load->view("index.php", 
					array(
					"header" => 'header_unlogged.php',
					"main" => 'turnos/edita.php',
					"footer" => 'footer_unlogged.php',
					"clientes" => $clientes,
					"especialidades" => $especialidades,
					"empleados" => $empleados,
					"empleados_especialidades" => $empleados_especialidades_bd,
					"demora_empleado" => $empleados_especialidades,
					"turno" => $turno
					));
		}else{
			redirect('login');
		}	
	}
	public function editabd(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$id_turno = $_POST['id_turno'];
			$id_cliente = $_POST['id_cliente'];
			$id_especialidad = $_POST['id_especialidad'];
			$nombreCampoEmpleado = "sel_servicio_".$id_especialidad;
			$id_empleado = $_POST[$nombreCampoEmpleado];
			//$id_estado_turno = $_POST['id_estado_turno'];
			$this->turnosCRUD->editaTurno($id_turno,$id_cliente, $id_especialidad, $id_empleado);
			$this->panel();
		}else{
			redirect('login');
		}
	}
	public function inicializar($id_turno){
        if(($this->session->userdata('id_rol_usuario') == 2)||($this->session->userdata('id_rol_usuario') == 4)){
            $turno = $this->turnosCRUD->avanzaTurno($id_turno,2); // 2: Siendo Atendido
            $this->turnosCRUD->registrarCambioEstadoTurno($id_turno,2);
			$turno=$this->turnosCRUD->getTurno($id_turno);
			$turnos=$this->turnosCRUD->getTurnosEmp($turno->id_empleado);
			$x=0;
			foreach($turnos as $t){
				if($t->id_turno>$id_turno){
					if($x<5){
						$x=$x+1;
						$usuario=$this->usuariosCRUD->getUsuario($t->id_cliente);
						$email=$usuario->email;
						$mensaje=$this->buildMensajeInicilizar($x,$t->nombre_cliente);
						$config = array (
							'mailtype' => 'html',
							'charset'  => 'utf-8',
							'priority' => '1'
							 );
							$this->email->initialize($config);
							$this->email->from('no-reply@lastit.com', 'LastIt.com');
							$this->email->to($email);
							$this->email->subject('Avance de turnos');
							$this->email->message($mensaje);
							$this->email->send();
						
					
					}
				}  	
			}
			
            $this->panel();
        }else{
            redirect('login');
        }   
    }
    public function finalizar($id_turno){
        if(($this->session->userdata('id_rol_usuario') == 2)||($this->session->userdata('id_rol_usuario') == 4)){
            $turno = $this->turnosCRUD->avanzaTurno($id_turno,3); // 3: Finalizado
            $this->turnosCRUD->registrarCambioEstadoTurno($id_turno,3);
            $this->panel();
        }else{
            redirect('login');
        }       
    }

    public function cancelar($id_turno){
        if(($this->session->userdata('id_rol_usuario') == 2)||($this->session->userdata('id_rol_usuario') == 4)){
            $turno = $this->turnosCRUD->avanzaTurno($id_turno,4); // 4: Cancelado
			$this->turnosCRUD->registrarCambioEstadoTurno($id_turno,4);
			$turn=$this->turnosCRUD->getTurno($id_turno);
			$turnos=$this->turnosCRUD->getTurnosEmpEnEspera($turn->id_empleado);
			foreach($turnos as $t){
				
				
					if($t->id_turno>$id_turno){
						
							$usuario=$this->usuariosCRUD->getUsuario($t->id_cliente);
							$email=$usuario->email;
							$mensaje=$this->buildMensajeCancelar($c,$t->nombre_cliente);
							$config = array (
								'mailtype' => 'html',
								'charset'  => 'utf-8',
								'priority' => '1'
								);
								$this->email->initialize($config);
								$this->email->from('no-reply@lastit.com', 'LastIt.com');
								$this->email->to($email);
								$this->email->subject('Avance de turnos');
								$this->email->message($mensaje);
								$this->email->send();
					
					}	
			}
            $this->panel();
		}else if($this->session->userdata('id_rol_usuario') == 3){
			$turno = $this->turnosCRUD->avanzaTurno($id_turno,4); // 4: Cancelado
			$this->turnosCRUD->registrarCambioEstadoTurno($id_turno,4);
			$turn=$this->turnosCRUD->getTurno($id_turno);
			$turnos=$this->turnosCRUD->getTurnosEmpEnEspera($turn->id_empleado);
			foreach($turnos as $t){
					if($t->id_turno>$id_turno){
						
							$usuario=$this->usuariosCRUD->getUsuario($t->id_cliente);
							$email=$usuario->email;
							$mensaje=$this->buildMensajeCancelar($c,$t->nombre_cliente);
							$config = array (
								'mailtype' => 'html',
								'charset'  => 'utf-8',
								'priority' => '1'
								);
								$this->email->initialize($config);
								$this->email->from('no-reply@lastit.com', 'LastIt.com');
								$this->email->to($email);
								$this->email->subject('Avance de turnos');
								$this->email->message($mensaje);
								$this->email->send();
						
						}
							
			}
            $this->menuCliente();
		}else{
            redirect('login');
        }   
	}
	public function buildMensajeCancelar($c,$nombre_cliente){

										$mensaje = "";
										$mensaje .= "";
										$mensaje .= "<html><body><table style='width: 100%;'>";
										$mensaje .= "<tr style='background-color: black; height: 50px;color:white;'>";
										$mensaje .= "<td style='padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
										$mensaje .= "<h1><img src='http://www.smartinweb.com/proyectointegrador/img/logo.png'>IL FIGARO</h1></td></tr>";
										$mensaje .= "<tr style='background-color: white;'>";
										$mensaje .= "<td style='padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
										$mensaje .= "<h2>Sistema de Turnos</h2>";
										$mensaje .= "<h2>Hola ".$nombre_cliente."</h2>";
										$mensaje .= "<p>Tinie menos tiempo que espera par ser atendido</p></td></tr>";
										$mensaje .= "<tr style='background-color: white;'>";
										$mensaje .= "</td></tr><tr style='background-color: black; height: 50px;color:white;'>"; 
										$mensaje .= "<td style=' padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
										$mensaje .= "<h2>Gracias por confiar en nuestro sistema.</h2><p>";
										$mensaje .= "Te recomendamos que estés pendiente a las alertas que te estaremos enviando para el seguimiento";
										$mensaje .= "del estado de tu turno.<br /><br /> Podes consultarlo en el siguiente";
										$mensaje .= "<a href='http://www.smartinweb.com/proyectointegrador'>";
										$mensaje .= "link </a></p></td></tr></table></body></html>";
		}
		return $mensaje ;
	}
	public function buildMensajeInicilizar($x,$nombre_cliente){
		if($x==1){
					
			$mensaje = "";
			$mensaje .= "";
			$mensaje .= "<html><body><table style='width: 100%;'>";
			$mensaje .= "<tr style='background-color: black; height: 50px;color:white;'>";
			$mensaje .= "<td style='padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
			$mensaje .= "<h1><img src='http://www.smartinweb.com/proyectointegrador/img/logo.png'>IL FIGARO</h1></td></tr>";
			$mensaje .= "<tr style='background-color: white;'>";
			$mensaje .= "<td style='padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
			$mensaje .= "<h2>Sistema de Turnos</h2>";
			$mensaje .= "<h2>Hola ".$nombre_cliente."</h2>";
			$mensaje .= "<p>Pronto, lo atenderemos a usted. Por favor, acerquese a la peluqueria</p></td></tr>";
			$mensaje .= "<tr style='background-color: white;'>";
			$mensaje .= "</td></tr><tr style='background-color: black; height: 50px;color:white;'>"; 
			$mensaje .= "<td style=' padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
			$mensaje .= "<h2>Gracias por confiar en nuestro sistema.</h2><p>";
			$mensaje .= "Si desea sacar mas turnos o cancela este turno,";
			$mensaje .= " podes consultarlo en el siguiente";
			$mensaje .= "<a href='http://www.smartinweb.com/proyectointegrador'>";
			$mensaje .= "link </a></p></td></tr></table></body></html>";
			
			
		}else{
			$mensaje = "";
			$mensaje .= "";
			$mensaje .= "<html><body><table style='width: 100%;'>";
			$mensaje .= "<tr style='background-color: black; height: 50px;color:white;'>";
			$mensaje .= "<td style='padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
			$mensaje .= "<h1><img src='http://www.smartinweb.com/proyectointegrador/img/logo.png'>IL FIGARO</h1></td></tr>";
			$mensaje .= "<tr style='background-color: white;'>";
			$mensaje .= "<td style='padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
			$mensaje .= "<h2>Sistema de Turnos</h2>";
			$mensaje .= "<h2>Hola ".$nombre_cliente."</h2>";
			$mensaje .= "<p>Faltan ".$x." persona por ser atendida antes de que le podamos prestar nuestros servicios. Por favor, sea paciente y este atento a nuestas aletas.</p></td></tr>";
			$mensaje .= "<tr style='background-color: white;'>";
			$mensaje .= "</td></tr><tr style='background-color: black; height: 50px;color:white;'>"; 
			$mensaje .= "<td style=' padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
			$mensaje .= "<h2>Gracias por confiar en nuestro sistema.</h2><p>";
			$mensaje .= "Te recomendamos que estés pendiente a las alertas que te estaremos enviando para el seguimiento";
			$mensaje .= "del estado de tu turno.<br /><br /> Podes consultarlo en el siguiente";
			$mensaje .= "<a href='http://www.smartinweb.com/proyectointegrador'>";
			$mensaje .= "link </a></p></td></tr></table></body></html>";
			
		
		}
		return $mensaje;
	}
    public function buildMensajeAltaTurno($nombre_cliente,$especialidades_empleados){
    	$mensaje = "";
    	$mensaje .= "";
    	$mensaje .= "<html><body><table style='width: 100%;'>";
    	$mensaje .= "<tr style='background-color: black; height: 50px;color:white;'>";
    	$mensaje .= "<td style='padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
    	$mensaje .= "<h1><img src='http://www.smartinweb.com/proyectointegrador/img/logo.png'>IL FIGARO</h1></td></tr>";
		$mensaje .= "<tr style='background-color: white;'>";
		$mensaje .= "<td style='padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
		$mensaje .= "<h2>Sistema de Turnos</h2>";
		$mensaje .= "<h2>Hola ".$nombre_cliente."</h2>";
		$mensaje .= "<p>Tu/s turno/s ha sido registrado con éxito.</p><hr /></td></tr>";
		$mensaje .= "<tr style='background-color: white;'>";
		$mensaje .= "<td style='padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
		$mensaje .= $especialidades_empleados;
		$mensaje .= "</td></tr><tr style='background-color: black; height: 50px;color:white;'>";
		$mensaje .= "<td style=' padding-top: 10px; padding-bottom: 10px;padding-left: 20px; padding-right: 20px;'>";
		$mensaje .= "<h2>Gracias por confiar en nuestro sistema.</h2><p>";
		$mensaje .= "Te recomendamos que estés pendiente a las alertas que te estaremos enviando para el seguimiento";
		$mensaje .= "del estado de tu turno.<br /><br /> Podes consultarlo en el siguiente";
		$mensaje .= "<a href='http://www.smartinweb.com/proyectointegrador'>";
		$mensaje .= "link </a></p></td></tr></table></body></html>";
		return $mensaje;
	}
	
}
