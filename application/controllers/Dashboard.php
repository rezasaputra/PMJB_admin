<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('Model_user');
		if(!$this->session->userdata('username'))
		{
			redirect('');
		}
	}
	  
	public function index($msg='')
	{
		$data['nav']=1;
		
		$data['msg']=$msg;
		$data['tanggal']=$this->Model_user->tanggal_indo(date('Y-m-d'));;
		$this->load->view('head', $data);
		$this->load->view('body', $data);
		$this->load->view('foot', $data);
		
	}

	
		
}
