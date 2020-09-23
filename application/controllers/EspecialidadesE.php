<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EspecialidadesE extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('EspecialidadesEmpleados');
	}
	public function panel(){
		$especialidades = $this->EspecialidadesEmpleados->getEspecialidades();
		$this->load->view('EspecialidadesEmp/dashboard', array("especialidades" =>$especialidades ));
	}
   public function alta(){
		$this->load->view("EspecialidadesEmp/alta");
	}
	public function altabd(){
		$nombre = $_POST['nombre_especialidad'];
		$this->EspecialidadesEmpleados->altaEspecialidad($nombre);
		$this->panel();
	}
    public function baja($id_especialidad){
        $especialidad=$this->EspecialidadesEmpleados->getEspecialidad($id_especialidad);
        $this->load->view('EspecialidadesEmp/baja',array("especialidad"=>$especialidad));
    }
    public function bajabd(){
		$id_especialidad = $_POST['id_especialidad'];
		$this->EspecialidadesEmpleados->bajaEspecialidad($id_especialidad);
		$this->panel();
	}
    public function modificarespecialidad($id_especialidad){
        $especialidad=$this->EspecialidadesEmpleados->getEspecialidad($id_especialidad);
        $this->load->view('EspecialidadesEmp/edita',array("especialidad"=>$especialidad));
    }
    public function modificarespecialidadbd(){
        $id_especialidad=$_POST['id_especialidad'];
        $nombre_especialidad=$_POST['nombre'];
        $this->EspecialidadesEmpleados->editaEspecialidad($id_especialidad,$nombre_especialidad);
		$this->panel();
    }
    
}
?>