<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turnos extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('turnosCRUD');
	}
	public function panel(){
		$turnos = $this->turnosCRUD->getTurnos();
		$this->load->view("turnos/dashboard", array("turnos" =>$turnos ));
	}
	public function alta(){
		$this->load->view("turnos/alta");
	}
	public function altabd(){
		$id_cliente = $_POST['id_cliente'];
		$id_empleado = $_POST['id_empleado'];
		$id_servicio = $_POST['id_servicio'];
		$id_estado_turno = $_POST['id_estado_turno'];
		$this->turnosCRUD->altaTurno($id_cliente, $id_empleado,$id_servicio, $id_estado_turno);
		$this->panel();
	}
	public function baja($id_turno){
		$turno = $this->turnosCRUD->getTurno($id_turno);
		$this->load->view("turnos/baja", array("turno"=> $turno));
	}
	public function bajabd(){
		$id_turno = $_POST['id'];
		$this->turnosCRUD->bajaTurno($id_turno);
		$this->panel();
	}	
	public function edita($id_turno){
		$turno = $this->turnosCRUD->getTurno($id_turno);
		$this->load->view("turnos/edita", array("turno"=> $turno));
	}
	public function editabd(){
		$id_turno = $_POST['id_turno'];
		//$id_cliente = $_POST['id_cliente'];
		//$id_empleado = $_POST['id_empleado'];
		$id_estado_turno = $_POST['id_estado_turno'];
		$this->turnosCRUD->editaTurno($id_turno,$id_estado_turno);
		$this->panel();
	}		
}
