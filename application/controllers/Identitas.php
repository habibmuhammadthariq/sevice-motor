<?php 
class Identitas extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('IdentitasModel','model');
	}

	public function index()
	{
		$this->load->view('rekap');
	}
}