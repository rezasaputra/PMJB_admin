<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('Model_user');
		if(!$this->session->userdata('username'))
		{
			redirect('');
		}
	}
	  
	public function index()
	{
		
	}

	// ===== ADMIN ===== //
	function admin($msg='')
	{
		$data['nav']=1;
		
		$data['msg']=$msg;
		$data['js']=$this->get_js_admin();
		$data['admin']=$this->Model_user->tampil_admin();

		$this->load->view('head', $data);
		$this->load->view('user/admin', $data);
		$this->load->view('foot', $data);
	}

	function save_admin()
	{
		$id= $this->input->post('id');
		$password = $this->input->post('password');
		$retypepassword = $this->input->post('retypepassword');
		if($password == $retypepassword)
		{
			$data = array(
				'nama_admin'=> $this->input->post('nama'), 
				'username' 	=> $this->input->post('username'), 
				'email' 	=> $this->input->post('email'), 
				'password' 	=> md5($password),
				'level'		=> 2
					);
			if($id)
			{
				$this->Model_user->insert_admin($data, $id);
				$msg='<div class="alert alert-success">
				<button class="close" data-close="alert"></button> <b>Update</b> Data Sukses! </div>';
			} else {
				$this->Model_user->insert_admin($data);
				$msg='<div class="alert alert-success">
				<button class="close" data-close="alert"></button> <b>Simpan</b> Data Sukses! </div>';
			}
		} else {
			$msg='<div class="alert alert-danger">
				<button class="close" data-close="alert"></button> <b>Retype Password</b> Belum Benar! </div>';
		}


		$this->admin($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('User/admin');
	}

	function setting($msg="")
	{
		$id = $this->session->userdata('id');
		$data['msg']=$msg;
		$data['edit']=$this->Model_user->get_admin_id($id);
		// print_r($edit);exit();
		$this->load->view('head', $data);
		$this->load->view('user/setting', $data);
		$this->load->view('foot', $data);
	}

	function update_profil()
	{
		$id 	  =$this->input->post('id');
		$nama 	  =$this->input->post('nama');
		$email 	  =$this->input->post('email');
		$username =$this->input->post('username');
		$data = array(
				'nama_admin' => $nama, 
				'email' => $email, 
				'username' => $username 
				);
		$this->Model_user->insert_admin($data, $id);
		$msg='<div class="alert alert-success">
		<button class="close" data-close="alert"></button> <b>Update</b> Profil Sukses! </div>';

		$this->setting($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('User/setting');
	}

	function update_password()
	{
		$id 	  = $this->input->post('id');
		$password = $this->input->post('password');
		$retypepassword = $this->input->post('retypepassword');
		if($password == $retypepassword)
		{
			$data = array( 'password' 	=> md5($password));
			$this->Model_user->insert_admin($data, $id);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Update</b> Password Sukses! </div>';
		} else {
			$msg='<div class="alert alert-danger">
				<button class="close" data-close="alert"></button> <b>Retype Password</b> Belum Benar! </div>';
		}	
		$this->setting($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('User/setting');		
	}

	function hapus_admin($id="")
	{
		$data = array('status' => 0, );
		$this->Model_user->insert_admin($data, $id);
		$msg='<div class="alert alert-danger">
			<button class="close" data-close="alert"></button> <b>Hapus</b> Data Sukses! </div>';
		$this->admin($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('User/admin');
	}

	function get_js_admin()
	{
		$fungsi_js = '
					function confirm_del(id)
		            {
		                bootbox.confirm({ 
		                    size: "small",
		                    message: "Anda akan menghapus barang ini?", 
		                    callback: function(result){ 
		                       if (result) 
		                       {
		                           document.location.href = "'.base_url().'User/hapus_admin/"+id;        
		                       }  
		                    }
		                })    
		            }
		            ';
	    return $fungsi_js;
	}

	// === END ADMIN === //

	function client($msg='')
	{
		$data['nav']=1;
		
		$data['msg']=$msg;
		$data['user']=$this->Model_user->view_client();
		$this->load->view('head', $data);
		$this->load->view('user/client', $data);
		$this->load->view('foot', $data);
	}
		
}
