<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class especialidadesEmpleados extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('especialidadesEmpleadosCRUD');
	}
	public function panel(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidades();
			//$this->load->view('especialidadesEmp/panel', array("especialidades" =>$especialidades ));
			$this->load->view("index.php", 
							array(
								"header" => 'header_unlogged.php',
								"main" => 'especialidadesEmp/panel.php',
								"footer" => 'footer_unlogged.php',
								"servicios" => $especialidades ));
		}else{
			redirect('login');
		}
	}
   public function alta(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$this->load->view("index.php", 
					array(
						"header" => 'header_unlogged.php',
						"main" => 'especialidadesEmp/alta.php',
						"footer" => 'footer_unlogged.php'));
			//$this->load->view("especialidadesEmp/alta");
		}else{
			redirect('login');
		}
	}
	public function altabd(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[4]|max_length[50]',
												array(
													'required' => 'Debe ingresar un %s.',
													'min_length' => 'El %s debe contar con 4 caracteres como mínimo.',
													'max_length' => 'El %s debe contar con 50 caracteres como máximo.'
												));
			if ($this->form_validation->run() == FALSE)
			{
				$this->alta();
			}
			else
			{
				$nombre = $_POST['nombre'];
				$this->especialidadesEmpleadosCRUD->altaEspecialidad($nombre);
				$this->panel();
			}
		}else{
			redirect('login');
		}
	}
    public function baja($id_especialidad){
		if($this->session->userdata('id_rol_usuario') == 1){
			$especialidad=$this->especialidadesEmpleadosCRUD->getEspecialidad($id_especialidad);
			//$this->load->view('especialidadesEmp/baja',array("especialidad"=>$especialidad));
			$this->load->view("index.php", 
			array(
				"header" => 'header_unlogged.php',
				"main" => 'especialidadesEmp/baja.php',
				"footer" => 'footer_unlogged.php',
				"especialidad"=>$especialidad));
		}else{
			redirect('login');
		}		
    }
    public function bajabd(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$this->form_validation->set_rules('id', 'Id', 'required',
												array(
													'required' => 'Debe ingresar un %s.'
												));

			if ($this->form_validation->run() == FALSE)
			{
				$this->baja();
			}
			else
			{
				$id_especialidad = $_POST['id'];
				$this->especialidadesEmpleadosCRUD->bajaEspecialidad($id_especialidad);
				$this->panel();
			}
		}else{
			redirect('login');
		}
	}
    public function edita($id_especialidad){
		if($this->session->userdata('id_rol_usuario') == 1){
			$especialidad=$this->especialidadesEmpleadosCRUD->getEspecialidad($id_especialidad);
			$this->load->view("index.php", 
			array(
				"header" => 'header_unlogged.php',
				"main" => 'especialidadesEmp/edita.php',
				"footer" => 'footer_unlogged.php',
				"especialidad"=>$especialidad));
			//$this->load->view('especialidadesEmp/edita',array("especialidad"=>$especialidad));
		}else{
			redirect('login');
		}
    }
    public function editabd(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$this->form_validation->set_rules('id', 'Id', 'required',
												array(
													'required' => 'Debe ingresar un %s.'
												));
			$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[4]|max_length[50]',
												array(
													'required' => 'Debe ingresar un %s.',
													'min_length' => 'El %s debe contar con 4 caracteres como mínimo.',
													'max_length' => 'El %s debe contar con 50 caracteres como máximo.'
												));
			if ($this->form_validation->run() == FALSE)
			{
				$this->alta();
			}
			else
			{
				$id_especialidad=$_POST['id'];
				$nombre_especialidad=$_POST['nombre'];
				$this->especialidadesEmpleadosCRUD->editaEspecialidad($id_especialidad,$nombre_especialidad);
				$this->panel();
			}
		}else{
			redirect('login');
		}
    }
    
}
?>