<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('usuariosCRUD');
        $this->load->model('rolesCRUD');
        $this->load->model('especialidadesEmpleadosCRUD');
        $this->load->model('usuariosEspecialidadesCRUD');
	}
	public function panel(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$usuarios = $this->usuariosCRUD->getUsuarios();
				//$this->load->view("usuarios/dashboard", array("usuarios" =>$usuarios ));
				$this->load->view("index.php", 
								array(
									"header" => 'header_unlogged.php',
									"main" => 'usuarios/panel.php',
									"footer" => 'footer_unlogged.php',
									"usuarios" => $usuarios ));
		}else{
			redirect('login');
		}	
	}
	public function alta(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$roles = $this->rolesCRUD->getRoles();
			$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidades();
			$this->load->view("index.php", 
								array(
								"header" => 'header_unlogged.php',
								"main" => 'usuarios/alta.php',
								"footer" => 'footer_unlogged.php',
								"roles" => $roles,
								"especialidades" => $especialidades
								));
		}else{
				redirect('login');
		}	
	}
	public function altaEmpleado(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$roles = $this->rolesCRUD->getRoles();
			$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidades();
			$this->load->view("index.php", 
								array(
								"header" => 'header_unlogged.php',
								"main" => 'usuarios/alta_empleado.php',
								"footer" => 'footer_unlogged.php',
								//"roles" => $roles,
								"especialidades" => $especialidades
								));
		}else{
			redirect('login');
		}	
	}	
	public function altaCliente(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$this->load->view("usuarios/alta_cliente");
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
			$this->form_validation->set_rules('apellido', 'Apellido', 'max_length[50]',
												array(
													'max_length' => 'El %s debe contar con 50 caracteres como máximo.'
												));
			$this->form_validation->set_rules('id_rol', 'Rol', 'numeric',
												array(
													'numeric' => 'Debe seleccionar un %s.'
												));
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email',
												array(
													'required' => 'Debe seleccionar un %s.',
													'valid_email' => 'Debe ingresar un %s válido.'
												));		

			if ($this->form_validation->run() == FALSE)
			{
				$this->alta();
			}
			else
			{
				$id_rol = $_POST['id_rol'];
				$nombre = $_POST['nombre'];
				$apellido = $_POST['apellido'];
				$usuario = $_POST['email'];
				$password = "123456";
				$email = $_POST['email'];

				$id_nuevo_usuario = $this->usuariosCRUD->altaUsuario($id_rol,$nombre,$apellido, $usuario, $password, $email);

				//LIMPIO LAS ESPECIALIDADES DEL USUARIO
				//$this->usuariosEspecialidadesCRUD->cleanEspecialidadesEmpleado($id_nuevo_usuario);
				if($id_rol == "2"){ //SI ES EMPLEADO DOY DE ALTA LAS ESPECIALIDADES SELECCIONADAS
					$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidades();
					//$this->usuariosEspecialidadesCRUD->altaUsuarioEspecialidad($id_nuevo_empleado, $id_especialidad);
					foreach ($_POST['especialidades'] as $id_especialidad) {
						$this->usuariosEspecialidadesCRUD->altaUsuarioEspecialidad($id_nuevo_usuario, $id_especialidad);
					}
				}


				$this->panel();
			}
		}else{
			redirect('login');
		}	
	}
	public function altaEmpleadobd(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[4]|max_length[50]',
										array(
											'required' => 'Debe ingresar un %s.',
											'min_length' => 'El %s debe contar con 4 caracteres como mínimo.',
											'max_length' => 'El %s debe contar con 50 caracteres como máximo.'
										));
			$this->form_validation->set_rules('apellido', 'Apellido', 'max_length[50]',
												array(
													'max_length' => 'El %s debe contar con 50 caracteres como máximo.'
												));
			$this->form_validation->set_rules('id_rol', 'Rol', 'numeric',
												array(
													'numeric' => 'Debe seleccionar un %s.'
												));
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email',
												array(
													'required' => 'Debe seleccionar un %s.',
													'valid_email' => 'Debe ingresar un %s válido.'
												));

			if ($this->form_validation->run() == FALSE)
			{
				$this->alta();
			}
			else
			{

				$id_rol = 2;
				$nombre = $_POST['nombre'];
				$apellido = $_POST['apellido'];
				$usuario = $_POST['email'];
				$password = "123456";
				$email = $_POST['email'];

				$id_nuevo_empleado = $this->usuariosCRUD->altaUsuario($id_rol,$nombre,$apellido, $usuario, $password, $email);
				$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidades();
				//$this->usuariosEspecialidadesCRUD->altaUsuarioEspecialidad($id_nuevo_empleado, $id_especialidad);
				foreach ($_POST['especialidades'] as $id_especialidad) {
					$this->usuariosEspecialidadesCRUD->altaUsuarioEspecialidad($id_nuevo_empleado, $id_especialidad);
				}
				$this->panel();
			}
		}else{
			redirect('login');
		}	
		
	}	
	public function baja($id_usuario){
		if($this->session->userdata('id_rol_usuario') == 1){	
			$usuario = $this->usuariosCRUD->getUsuario($id_usuario);
			$roles = $this->rolesCRUD->getRoles();
			$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidades();
			$especialidades_empleado = array();//$this->usuariosEspecialidadesCRUD->getEspecialidadesEmpleado($usuario->id);
			if($usuario->id_rol == 2){ //si es empleado busco las especialidades del mismo
				$especialidades_empleado = $this->usuariosEspecialidadesCRUD->getEspecialidadesEmpleado($usuario->id);
			} 
			$this->load->view("index.php", 
									array(
									"header" => 'header_unlogged.php',
									"main" => 'usuarios/baja.php',
									"footer" => 'footer_unlogged.php',
									"roles" => $roles,
									"especialidades" => $especialidades,
									"especialidadesEmpleado" => $especialidades_empleado,
									"usuario"=> $usuario
									));
		}else{
				redirect('login');
		}	

	}
	public function bajabd(){
		if($this->session->userdata('id_rol_usuario') == 1){
			$id_usuario = $_POST['id'];
			$this->usuariosCRUD->bajaUsuario($id_usuario);
			$this->usuariosEspecialidadesCRUD->cleanEspecialidadesEmpleado($id_usuario);
			$this->panel();
		}else{
			redirect('login');
		}	
	}	
	public function edita($id_usuario){
		if($this->session->userdata('id_rol_usuario') == 1){
			$usuario = $this->usuariosCRUD->getUsuario($id_usuario);
			$roles = $this->rolesCRUD->getRoles();
			$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidades();
			$especialidades_empleado = array();//$this->usuariosEspecialidadesCRUD->getEspecialidadesEmpleado($usuario->id);
			if($usuario->id_rol == 2){ //si es empleado busco las especialidades del mismo
				$especialidades_empleado = $this->usuariosEspecialidadesCRUD->getEspecialidadesEmpleado($usuario->id);
			} 
			$this->load->view("index.php", 
									array(
									"header" => 'header_unlogged.php',
									"main" => 'usuarios/edita.php',
									"footer" => 'footer_unlogged.php',
									"roles" => $roles,
									"especialidades" => $especialidades,
									"especialidadesEmpleado" => $especialidades_empleado,
									"usuario"=> $usuario
									));
		}else{
			redirect('login');
		}	
	}
	public function editabd(){
		if($this->session->userdata('id_rol_usuario') == 1){
				$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[4]|max_length[50]',
											array(
												'required' => 'Debe ingresar un %s.',
												'min_length' => 'El %s debe contar con 4 caracteres como mínimo.',
												'max_length' => 'El %s debe contar con 50 caracteres como máximo.'
											));
				$this->form_validation->set_rules('apellido', 'Apellido', 'max_length[50]',
													array(
														'max_length' => 'El %s debe contar con 50 caracteres como máximo.'
													));
				$this->form_validation->set_rules('id_rol', 'Rol', 'numeric',
													array(
														'numeric' => 'Debe seleccionar un %s.'
													));
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email',
													array(
														'required' => 'Debe seleccionar un %s.',
														'valid_email' => 'Debe ingresar un %s válido.'
													));		

				if ($this->form_validation->run() == FALSE)
				{
					$this->alta();
				}
				else
				{
					$id_usuario = $_POST['id'];
					$id_rol = $_POST['id_rol'];
					$nombre = $_POST['nombre'];
					$apellido = $_POST['apellido'];
					$usuario = $_POST['email'];
					$email = $_POST['email'];

					$this->usuariosCRUD->editaUsuario($id_usuario,$id_rol,$nombre,$apellido, $usuario, $email);


					//LIMPIO LAS ESPECIALIDADES DEL USUARIO
					$this->usuariosEspecialidadesCRUD->cleanEspecialidadesEmpleado($id_usuario);
					if($id_rol == "2"){ //SI ES EMPLEADO DOY DE ALTA LAS ESPECIALIDADES SELECCIONADAS
						$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidades();
						//$this->usuariosEspecialidadesCRUD->altaUsuarioEspecialidad($id_nuevo_empleado, $id_especialidad);
						foreach ($_POST['especialidades'] as $id_especialidad) {
							$this->usuariosEspecialidadesCRUD->altaUsuarioEspecialidad($id_usuario, $id_especialidad);
						}
					}

					$this->panel();
				}
		}else{
				redirect('login');
		}	
	}		
}
