<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estadost extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('EstadosTurnos');
	}
	public function panel(){
		$estados = $this->EstadosTurnos->getEstados();
		$this->load->view('estadosTurno/dashboard', array("estados" =>$estados ));
	}
   public function alta(){
		$this->load->view("estadosTurno/alta");
	}
	public function altabd(){
		$nombre = $_POST['nombre_estado'];
		$this->EstadosTurnos->altaEstado($nombre);
		$this->panel();
	}
    public function baja($id_estado){
        $estado=$this->EstadosTurnos->getEstado($id_estado);
        $this->load->view('estadosTurno/baja',array("estado"=>$estado));
    }
    public function bajabd(){
		$id_estado = $_POST['id_estado'];
		$this->EstadosTurnos->bajaEstado($id_estado);
		$this->panel();
	}
    public function modificarEstado($id_estado){
        $estado=$this->EstadosTurnos->getEstado($id_estado);
        $this->load->view('estadosTurno/edita',array("estado"=>$estado));
    }
    public function modificarEstadobd(){
        $id_estado=$_POST['id_estado'];
        $nombre_estado=$_POST['nombre'];
        $this->EstadosTurnos->editaEstados($id_estado,$nombre_estado);
		$this->panel();
    }
    
}
?>