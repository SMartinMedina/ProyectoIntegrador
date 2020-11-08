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
		}elseif($this->session->userdata('id_rol_usuario') == 2){
				$id_empleado=$this->session->userdata('id_usuario');
				$turnos = $this->turnosCRUD->getTurnosEmp($id_empleado);
				$this->load->view("index.php", 
										array(
												"header" => 'header_unlogged.php',
												"main" => 'turnos/control.php',
												"footer" => 'footer_unlogged.php',
												"turnos" => $turnos));													
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

		}elseif($this->session->userdata('id_rol_usuario') == 4){
							$empleados = $this->usuariosCRUD->getEmpleados();
							$id_empleado=0;
							if((isset($_POST['empleado']))&&($_POST['empleado']!=0)){
								$id_empleado=$_POST['empleado'];
								$turnos = $this->turnosCRUD->getTurnosEmp($id_empleado);
							}else{
								$turnos = $this->turnosCRUD->getTurnos();
							}
							$this->load->view("index.php", 
								array(
								"header" => 'header_unlogged.php',
								"main" => 'turnos/controla.php',
								"footer" => 'footer_unlogged.php',
								"turnos" => $turnos, 
								"empleados" => $empleados,
								"id_empleado"=> $id_empleado));							
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
	
		$this->form_validation->set_rules('nombre', 'Nombre', 'min_length[8]|max_length[50]',array('min_length'=>'El %s debe tener un minimo de 8 caracteres',
											'max_length' => 'El %s puede contar con 50 caracteres como máximo.'));
		$this->form_validation->set_rules('apellido', 'Apellido', 'max_length[50]',
												array(
													'max_length' => 'El %s puede contar con 50 caracteres como máximo.'
												));
		$this->form_validation->set_rules('email', 'Correo Electrónico', 'required|valid_email|callback_verificar_Mail[email]',
											array('required' => 'Debe ingresar su %s.',
												'valid_email' => 'Debe ser un %s válido',
												'verificar_Mail'=>'Este %s ya esta siendo usado por otro usuario'));
		$this->form_validation->set_rules('pass', 'Pass', 'required|min_length[8]',
												array('required' => 'Debe ingresar su %s.',
												'min_length'=>'Su %s debe tener 8 caracteres por lo minimo.'));	
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
			//$this->mandar_Mail();
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
	public function verific_Mail($email){
		$usuario = $this->usuariosCRUD->getEmail($email);
		if(sizeof($usuario)==0){
			return FALSE;
		}else{
			return TRUE;

		}
	}
	public function forgot(){
		$this->load->view("index.php", 
								array(
									"header" => 'header_unlogged.php',
									"main" => 'login/forgot.php',
									"footer" => 'footer_unlogged.php' ));
	}
	
	public function tryforgot(){
		$this->form_validation->set_rules('email', 'Correo Electrónico', 'required|valid_email|callback_verific_Mail[email]',
											array('required' => 'Debe ingresar su %s.',
												'valid_email' => 'Debe ser un %s válido',
												'verific_Mail'=>'Este %s no existe en el sistema'));
		if($this->form_validation->run() == FALSE)
		{
			$this->forgot();
		}else{
			$email=$_POST['email'];
			$usuario = $this->usuariosCRUD->getEmail($email);
			$pass=$this->getPassTemp();
			foreach($usuario as $u){
				$this->usuariosCRUD->updateUsuario($u->id,$u->nombre_usuario,$u->apellido_usuario,$pass,$email);
			}
			$this->recover($email,$pass);
		}
	}
	public function recover($email,$pass){

		if(isset($email)){
			$this->load->view("index.php", 
								array(
									"header" => 'header_unlogged.php',
									"main" => 'login/recover.php',
									"footer" => 'footer_unlogged.php',
									"pass"=>$pass,
									"email"=>$email));
		}else{
			$this->index();
		}
	}
	public function tryrecover(){
		$email=$_POST['email'];
		$pass=$_POST['passv'];
		if(isset($email)){
			$this->form_validation->set_rules('pass', 'Pass', 'required|min_length[8]',
				array('required' => 'Debe ingresar su %s.',
						'min_length'=>'Su %s debe tener 8 caracteres por lo minimo.'));	
			$this->form_validation->set_rules('pass', 'Contraseñas', 'required',
													array('required' => 'Debe ingresar su %s.'));	
			$this->form_validation->set_rules('pass_confirm', 'Contraseñas de confirmacion', 'required|matches[pass]',
												array('required' => 'Debe ingresar su %s.',
														'matches'=>'Las dos %s que ingreso son diferentes'));
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->recover($email,$pass);
			}else{
				$password=$_POST['pass'];
				$this->usuariosCRUD->recoverUsuario($password,$pass,$email);
				$this->index();
			}
		}else{
			$this->index();
		}
	}
	function getPassTemp(){
		$pass_temp="";
		$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$pass_temp = substr(str_shuffle($permitted_chars), 0, 30);
		return $pass_temp;
	}
}