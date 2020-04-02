<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{
		if(isset($_SESSION['logged']) && $_SESSION['logged'])
			redirect(base_url() . 'Main/home');
		$this->load->view('component/skeleton/head');
		$this->load->view('main/main');
		$this->load->view('component/skeleton/footer');
	}
	public function validar_login(){
		$email = $_POST['email'] ?? '';
		$passw = $_POST['password'] ?? '';
		$response = [];
		$valid = true;
		if(empty($email)) {
			$response+=  ["email" => "Ingrese su dirección de correo electrónico"];
			$valid = false;
		}
		if(empty($passw)) {
			$response+=  ["password" => "Ingrese su contraseña"];
			$valid = false;
		}
		if($valid){
			$this->load->model('Usuario_Model');
			$this->Usuario_Model->setCorreo($email);
			$this->Usuario_Model->setContra($passw);
			if($this->Usuario_Model->exists_correo()){
				$contra = $this->Usuario_Model->get_contra();
				if($contra == $passw){
					$_SESSION['logged'] = true;
					$response+= ["password" => "Iniciando sesión...", "redirect" => base_url() . 'Main/home'];
				}else{
					$response+= ["password" => "La contraseña es incorrecta"];
				}
			}else {
				$response+= ["email" => "Este correo no se encuentra registrado en nuestras bases de datos."];
			}
		}
		echo json_encode($response);
	}

	public function home(){
		if(!isset($_SESSION['logged']) && !$_SESSION['logged']){
			redirect(base_url());
		}
		$this->load->view('component/skeleton/head');
		$this->load->view('main/home');
		$this->load->view('component/skeleton/footer');
	}
	public function cerrar_sesion() {
		session_destroy();
		redirect(base_url());
	}
}
