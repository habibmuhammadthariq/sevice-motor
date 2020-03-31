<?php 
class Rekap extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		// $this->load->model('RekapModel','model');
	}

	public function index()
	{
		$this->load->view('rekap');
	}
}