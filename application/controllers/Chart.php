<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Chart extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('Excel_import_model');
		$this->load->library('Excel');
		if($this->session->userdata('status') != "login"){
			redirect(base_url('Login'));
		}
		//Load Dependencies

	}

	public function index()
	{
		$this->load->view('chart');
	}
}