<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('usuariosCRUD');
        $this->load->model('turnosCRUD');
        $this->load->model('especialidadesEmpleadosCRUD');
        $this->load->model('usuariosEspecialidadesCRUD');
	}
	public function index()
	{
		/*$data
		$this->load->view(array('login/login.php');*/
		$this->load->view("index.php", 
								array(
									"header" => 'header_unlogged.php',
									"main" => 'login/login.php',
									"footer" => 'footer_unlogged.php' ));
	}
	public function panel()
	{
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
		}else if($this->session->userdata('id_rol_usuario') == 3){ // CLIENTE
			$clientes = $this->usuariosCRUD->getClientes();
			$empleados = $this->usuariosCRUD->getEmpleados();
			$especialidades = $this->especialidadesEmpleadosCRUD->getEspecialidades();
			$empleados_especialidades = $this->usuariosEspecialidadesCRUD->getUsuariosEspecialidades();
			$this->load->view("index.php", 
						array(
							"header" => 'header_unlogged.php',
							"main" => 'cliente/menu.php',
							"footer" => 'footer_unlogged.php',
							"clientes" => $clientes,
							"empleados" => $empleados,
							"especialidades" => $especialidades,
							"empleados_especialidades" => $empleados_especialidades));

		}else{
			redirect('login');
		}	
	}
	public function signupForm()
	{
		/*$data
		$this->load->view(array('login/login.php');*/
		$this->load->view("index.php", 
								array(
									"header" => 'header_unlogged.php',
									"main" => 'login/signup.php',
									"footer" => 'footer_unlogged.php' ));
	}

	public function tryLogin()
	{
		
		$this->form_validation->set_rules('email', 'Correo Electrónico', 'required|valid_email',
											array(
												'required' => 'Debe ingresar su %s.',
												'valid_email' => 'Debe ingresar un %s. con formato válido.'));
		$this->form_validation->set_rules('pass', 'Password', 'required',
											array('required' => 'Debe ingresar su %s.'));

		if ($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			//Logueo exitoso.
			//$this->load->view('formsuccess');
			$email = $this->input->post('email');//$email = $_POST['email'];
			$pass = $this->input->post('pass');//$pass = $_POST['pass'];

			$usuario = $this->usuariosCRUD->getUsuariosLogin($email, $pass);
			if(sizeof($usuario) == 1){
				$usuarioLogged = $usuario[0];
				$this->setSessionUsuario($usuarioLogged->id, 
										$usuarioLogged->id_rol, 
										$usuarioLogged->nombre_usuario, 
										$usuarioLogged->apellido_usuario, 
										$usuarioLogged->usuario, 
										$usuarioLogged->email);
				$this->panel();

			}else{
				$this->index();
			}
		}
	}	

	public function trySignup()
	{
	
		$this->form_validation->set_rules('nombre', 'Nombre', 'required',
											array('required' => 'Debe ingresar su %s.'));
		
		$this->form_validation->set_rules('apellido', 'Apellido', 'required',
											array('required' => 'Debe ingresar su %s.'));
//		matches

		$this->form_validation->set_rules('email', 'Correo Electrónico', 'required|valid_email|callback_verificar_Mail[email]',
											array('required' => 'Debe ingresar su %s.',
												'valid_email' => 'Debe ser un %s válido',
												'verificar_Mail'=>'Este %s ya esta siendo usado por otro usuario'));
		$this->form_validation->set_rules('pass', 'Password', 'required',
											array('required' => 'Debe ingresar su %s.'));
		$this->form_validation->set_rules('pass_confirm', 'Contraseñas', 'required|matches[pass]',
											array('required' => 'Debe ingresar su %s.',
													'matches'=>'Las dos %s que ingreso son diferentes'));

		if ($this->form_validation->run() == FALSE)
		{
			$this->signupForm();
		}else{
			$nombre = $this->input->post('nombre');
			$apellido = $this->input->post('apellido');
			$email = $this->input->post('email');//$email = $_POST['email'];
			$pass = $this->input->post('pass');//$pass = $_POST['pass'];
			$usuario = $this->usuariosCRUD->altaUsuario(3,$nombre,$apellido,$email,$pass,$email);//id=3 es de cliente
			 $this->index();
		}
	}	

	public function setSessionUsuario($id, $id_rol, $nombre, $apellido, $usuario, $email)
	{
		$nueva_session = array(
		        'id_usuario'  => $id,
		        'id_rol_usuario' => $id_rol,
		        'nombre_usuario' => $nombre,
		        'apellido_usuario' => $apellido,
		        'usuario_usuario' => $usuario,
		        'email_usuario' => $email
		);

		$this->session->set_userdata($nueva_session);

	}
	public function logout()
	{
		$session = array('id_usuario', 'id_rol_usuario', 'nombre_usuario','apellido_usuario','usuario_usuario','email_usuario');

		$this->session->unset_userdata($session);
		$this->index();

	}
	public function verificar_Mail($email){
		$usuario = $this->usuariosCRUD->getEmail($email);
		if(sizeof($usuario)  > 0){
			return FALSE;
		}else{
			 
			return TRUE;
		}
	}
}
