<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class especialidadesEmpleados extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('especialidadesEmpleadosCRUD');
	}
	public function panel(){
		$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidades();
		$this->load->view('especialidadesEmp/dashboard', array("especialidades" =>$especialidades ));
	}
   public function alta(){
		$this->load->view("especialidadesEmp/alta");
	}
	public function altabd(){
		$nombre = $_POST['nombre_especialidad'];
		$this->especialidadesEmpleadosCRUD->altaEspecialidad($nombre);
		$this->panel();
	}
    public function baja($id_especialidad){
        $especialidad=$this->especialidadesEmpleadosCRUD->getEspecialidad($id_especialidad);
        $this->load->view('especialidadesEmp/baja',array("especialidad"=>$especialidad));
    }
    public function bajabd(){
		$id_especialidad = $_POST['id_especialidad'];
		$this->especialidadesEmpleadosCRUD->bajaEspecialidad($id_especialidad);
		$this->panel();
	}
    public function modificarespecialidad($id_especialidad){
        $especialidad=$this->especialidadesEmpleadosCRUD->getEspecialidad($id_especialidad);
        $this->load->view('especialidadesEmp/edita',array("especialidad"=>$especialidad));
    }
    public function modificarespecialidadbd(){
        $id_especialidad=$_POST['id_especialidad'];
        $nombre_especialidad=$_POST['nombre'];
        $this->especialidadesEmpleadosCRUD->editaEspecialidad($id_especialidad,$nombre_especialidad);
		$this->panel();
    }
    
}
?>