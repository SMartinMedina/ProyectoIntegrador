<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('usuariosCRUD');
        $this->load->model('turnosCRUD');
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
		$turnos = $this->turnosCRUD->getTurnos();
		/*$data
		$this->load->view(array('login/login.php');*/
		$this->load->view("index.php", 
								array(
									"header" => 'header_unlogged.php',
									"main" => 'turnos/panel.php',
									"footer" => 'footer_unlogged.php',
									"turnos" => $turnos ));
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
		
		$this->form_validation->set_rules('nombre', 'Nombre', 'required',
											array('required' => 'Debe ingresar su %s.'));
//		matches

		$this->form_validation->set_rules('email', 'Correo Electrónico', 'required|valid_email',
											array('required' => 'Debe ingresar su %s.',
												'valid_email' => 'Debe ser un %s válido'));
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
			}else{
				$this->index();
			}
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
}
