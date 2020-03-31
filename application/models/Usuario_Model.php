<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_Model extends CI_Model {

	private $correo;
	private $contra;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @return mixed
	 */
	public function getCorreo()
	{
		return $this->correo;
	}

	/**
	 * @param mixed $correo
	 */
	public function setCorreo($correo): void
	{
		$this->correo = $correo;
	}

	/**
	 * @return mixed
	 */
	public function getContra()
	{
		return $this->contra;
	}

	/**
	 * @param mixed $contra
	 */
	public function setContra($contra): void
	{
		$this->contra = $contra;
	}

	public function exists_correo() {
		return $this->db->select("count(*) c")->from("usuario")->where("usua_email", $this->correo)->get()->result_array()[0]['c'] > 0;
	}

	public function get_contra() {
		return $this->db->select("usua_password")->from("usuario")->where("usua_email", $this->correo)->get()->result_array()[0]['usua_password'];
	}


}
