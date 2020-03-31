<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('component/skeleton/head');
		$this->load->view('main/main');
		$this->load->view('component/skeleton/footer');
	}
}
