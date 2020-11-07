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
			//$this->load->view("turnos/dashboard", array("turnos" =>$turnos ));
			$this->load->view("index.php", 
					array(
						"header" => 'header_unlogged.php',
						"main" => 'turnos/panel.php',
						"footer" => 'footer_unlogged.php',
						"turnos" => $turnos ));
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
			$empleados = $this->usuariosCRUD->getEmpleados();
			$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidades();
			$empleados_especialidades = $this->usuariosEspecialidadesCRUD->getUsuariosEspecialidades();
			//$especialidades = "";

			$this->load->view("index.php", 
								array(
								"header" => 'header_unlogged.php',
								"main" => 'turnos/alta.php',
								"footer" => 'footer_unlogged.php',
								"clientes" => $clientes,
								"especialidades" => $especialidades,
								"empleados" => $empleados,
								"empleados_especialidades" => $empleados_especialidades
								));
		}else if($this->session->userdata('id_rol_usuario') == 3){
			$clientes = $this->usuariosCRUD->getClientes();
			$empleados = $this->usuariosCRUD->getEmpleados();
			$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidades();
			$empleados_especialidades = $this->usuariosEspecialidadesCRUD->getUsuariosEspecialidades();
			$this->load->view("index.php", 
						array(
							"header" => 'header_unlogged.php',
							"main" => 'cliente/alta.php',
							"footer" => 'footer_unlogged.php',
							"clientes" => $clientes,
							"empleados" => $empleados,
							"especialidades" => $especialidades,
							"empleados_especialidades" => $empleados_especialidades));

		}else{
				redirect('login');
		}							
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
			/*
					if ($this->form_validation->run() == FALSE)
					{
						$this->alta();
					}
					else
					{

					}















					$id_cliente = $_POST['id_cliente'];
					$id_empleado = $_POST['id_empleado'];
					$id_servicio = $_POST['id_servicio'];
					$id_estado_turno = $_POST['id_estado_turno'];
					$this->turnosCRUD->altaTurno($id_cliente, $id_empleado,$id_servicio, $id_estado_turno);*/
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
			$this->load->view("turnos/edita", array("turno"=> $turno));
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
}
