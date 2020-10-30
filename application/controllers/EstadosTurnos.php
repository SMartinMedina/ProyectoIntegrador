<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstadosTurnos extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('EstadosTurnosCRUD');
	}
	public function panel(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$estados = $this->EstadosTurnosCRUD->getEstados();
			//$this->load->view('estadosTurno/dashboard', array("estados" =>$estados ));
			$this->load->view("index.php", 
					array(
						"header" => 'header_unlogged.php',
						"main" => 'estadosTurno/panel.php',
						"footer" => 'footer_unlogged.php',
						"estadosTurno" => $estados ));
				}else{
						redirect('login');
					}
	}
   public function alta(){
		if($this->session->userdata('id_rol_usuario') == 1){
		$this->load->view("index.php", 
			array(
				"header" => 'header_unlogged.php',
				"main" => 'estadosTurno/alta.php',
				"footer" => 'footer_unlogged.php'));
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
				$this->EstadosTurnosCRUD->altaEstado($nombre);
				$this->panel();
			}
		}else{
			redirect('login');
		}
	}
    public function baja($id_estado){
		if($this->session->userdata('id_rol_usuario') == 1){
			$estado=$this->EstadosTurnosCRUD->getEstado($id_estado);
			//$this->load->view('estadosTurno/baja',array("estado"=>$estado));
			$this->load->view("index.php", 
				array(
					"header" => 'header_unlogged.php',
					"main" => 'estadosTurno/baja.php',
					"footer" => 'footer_unlogged.php',
					"estado"=>$estado));
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
				$id_estado=$_POST['id'];
				$this->EstadosTurnosCRUD->bajaEstado($id_estado);
				$this->panel();
			}
		}else{
			redirect('login');
		}

	}
    public function edita($id_estado){
		if($this->session->userdata('id_rol_usuario') == 1){
			$estado=$this->EstadosTurnosCRUD->getEstado($id_estado);
			$this->load->view("index.php", 
				array(
					"header" => 'header_unlogged.php',
					"main" => 'estadosTurno/edita.php',
					"footer" => 'footer_unlogged.php',
					"estado" => $estado));
		}else{
			redirect('login');
		}	
        //$this->load->view('estadosTurno/edita',array("estado"=>$estado));
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
				$id_estado=$_POST['id'];
				$nombre_estado=$_POST['nombre'];
				$this->EstadosTurnosCRUD->editaEstados($id_estado,$nombre_estado);
				$this->panel();
			}
		}else{
			redirect('login');
		}		

    }
    
}
?>