<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	function __construct()
	{
		parent::__construct(); 
		$this->load->model('Model_login');
	}
	  
	public function index()
	{
	
		$this->load->view('login');
	}

	function masuk()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek = $this->Model_login->cek($username, $password);
		// print_r($cek);exit();
		if($cek->num_rows()==1)
		{
			$session_id = session_id(); 
            $dataa       = array('session' => $session_id);
            $this->Model_login->update_user($username, $dataa);

			foreach($cek->result() as $data){
				$sess_data['id'] = $data->uid;
				$sess_data['username'] = $data->username;
				$sess_data['nama'] = $data->nama_admin;
				$sess_data['level'] = $data->level;
				$this->session->set_userdata($sess_data);
			}
			redirect('Dashboard');
		}
		else
		{
			$this->session->set_flashdata('pesan', 'Maaf username & password mu salah!!');
			redirect('');
		}

	}

	function keluar()
	{
		$this->session->unset_userdata('username');
		redirect('');
	}
		
}
