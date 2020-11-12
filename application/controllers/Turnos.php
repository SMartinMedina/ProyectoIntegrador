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
			/*$data
			$this->load->view(array('login/login.php');*/
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
			$this->load->view("index.php", 
									array(
										"header" => 'header_unlogged.php',
										"main" => 'turnos/control.php',
										"footer" => 'footer_unlogged.php',
										"turnos" => $turnos));
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
			$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidades();
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
			$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidades();
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
					/*var_dump(" POSTEmpServicio: ".$POSTEmpServicio. 
							" id_cliente: ".$id_cliente. 
							" id_empleado: ".$id_empleado.
							" id_servicio: ".$id_servicio.
							" id_estado_turno: ".$id_estado_turno);*/
							
					$this->turnosCRUD->altaTurno($id_cliente, $id_empleado,$id_servicio, $id_estado_turno);
				}
			}
			
			$this->panel();
		}if($this->session->userdata('id_rol_usuario') == 3){

			foreach ($_POST['especialidades'] as $id_especialidad) {

				$POSTEmpServicio = "sel_servicio_".$id_especialidad;
				if($_POST[$POSTEmpServicio] != 0){
					$id_cliente = $this->session->userdata('id_usuario');
					$idservicio_idempleado = $_POST[$POSTEmpServicio];
					$idservicio_idempleado_arr = explode("-", $idservicio_idempleado);
					$id_empleado = $idservicio_idempleado_arr[1]; // 
					$id_servicio = $id_especialidad;
					$id_estado_turno = 1; //Se setea por default estado "EN ESPERA"
					$this->turnosCRUD->altaTurno($id_cliente, $id_empleado,$id_servicio, $id_estado_turno);
					$this->menuCliente();
				}else{

					// A DEFINIR
				}
			}
		}else{
			redirect('login');
		}	
	}
	public function baja($id_turno){
		if($this->session->userdata('id_rol_usuario') == 1){
			$turno = $this->turnosCRUD->getTurno($id_turno);
			$this->load->view("turnos/baja", array("turno"=> $turno));
		}else{
			redirect('login');
		}		
	}
	public function bajabd(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$id_turno = $_POST['id'];
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
			$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidades();
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
			//$id_cliente = $_POST['id_cliente'];
			//$id_empleado = $_POST['id_empleado'];
			$id_estado_turno = $_POST['id_estado_turno'];
			$this->turnosCRUD->editaTurno($id_turno,$id_estado_turno);
			$this->panel();
		}else{
			redirect('login');
		}
	}
	public function inicializar($id_turno){
		if($this->session->userdata('id_rol_usuario') == 2){
			$turno = $this->turnosCRUD->editaTurno($id_turno,2);
			$this->panel();
		}else{
			redirect('login');
		}	
	}
	public function finalizar($id_turno){
		if($this->session->userdata('id_rol_usuario') == 2){
			$this->turnosCRUD->bajaTurno($id_turno);
			$this->panel();
		}else{
			redirect('login');
		}		
	}	
	public function cancelar($id_turno){
		if($this->session->userdata('id_rol_usuario') == 3){
			$this->turnosCRUD->cancelarTurno($id_turno);
			$this->panelTurnosPorCliente();
		}else{
			redirect('login');
		}		
	}						
}
