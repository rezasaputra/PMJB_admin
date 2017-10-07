<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_data extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('Model_master');
		if(!$this->session->userdata('username'))
		{
			redirect('');
		}
	}
	  
	public function index($msg='')
	{
		
	}

	// ===== Kategori ===== //
	function kategori($msg='')
	{
		$data['nav']=1;
		
		$data['msg'] = $msg;

		$data['js']  = $this->get_js_kat();

		$data['kategori']=$this->Model_master->tampil_kategori();

		$this->load->view('head', $data);
		$this->load->view('master/kategori', $data);
		$this->load->view('foot', $data);
	}

	function save_kategori()
	{
		$id= $this->input->post('id');

		$data = array(
			'nama_kategori' => $this->input->post('nama')
			// 'jumlah' 		=> $this->input->post('jumlah'), 
			// 'tgl_kuliner' 	=> $this->input->post('tgl_kuliner')
				);
		if($id)
		{
			$this->Model_master->insert_kategori($data, $id);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Update</b> Data Sukses! </div>';
		} else {
			$this->Model_master->insert_kategori($data);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Simpan</b> Data Sukses! </div>';
		}

		$this->kategori($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('Master_data/kategori');
	}

	function hapus_kategori($id="")
	{
		$data = array('status' => 0, );
		$this->Model_master->insert_kategori($data, $id);
		$msg='<div class="alert alert-danger">
			<button class="close" data-close="alert"></button> <b>Hapus</b> Data Sukses! </div>';
		$this->kategori($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('Master_data/kategori');
	}

	function get_js_kat()
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
		                           document.location.href = "'.base_url().'Master_data/hapus_kategori/"+id;        
		                       }  
		                    }
		                })    
		            }

		            function get_edit(id)
		            {
		            	$.ajax({
                            url : "'.base_url().'Master_data/get_kategori_id/"+id,
                            type : "POST",
                            success: function(data){
	                            	$(window).scrollTop(0);
                                    var result=JSON.parse(data);
                                    $("#id").val(result.id_kategori);
                                    $("#nama").val(result.nama_kategori);
                                    $("#jumlah").val(result.jumlah);
                                    $("#tgl_kuliner").val(result.tgl_kuliner);
                                },
                                error: function()
                                {
                                    bootbox.alert({
                                        message: "Terjadi Kesalahan Sistem !",
                                        callback: function () {
                                            window.location.reload(true);
                                        }
                                    })  
                                }
                        });
		            }
		            ';
	    return $fungsi_js;
	}

	function get_kategori_id($id="")
	{
		$query = $this->Model_master->get_kategori_id($id);
		echo json_encode($query);
	}

	// === End Kategori === //

	// ===== Transportasi ===== //	
	function transportasi($msg='')
	{
		$data['nav']=1;
		
		$data['msg']=$msg;

		$data['js']=$this->get_js_trans();

		$data['transport']=$this->Model_master->tampil_transportasi();
		
		$this->load->view('head', $data);
		$this->load->view('master/transportasi', $data);
		$this->load->view('foot', $data);
	}

	function save_transportasi()
	{
		$id= $this->input->post('id');

		$data = array(
			'nama_t' => $this->input->post('nama')
				);
		if($id)
		{
			$this->Model_master->insert_transportasi($data, $id);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Update</b> Data Sukses! </div>';
		} else {
			$this->Model_master->insert_transportasi($data);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Simpan</b> Data Sukses! </div>';
		}

		$this->transportasi($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('Master_data/transportasi');
	}

	function hapus_transportasi($id="")
	{
		$data = array('status' => 0, );
		$this->Model_master->insert_transportasi($data, $id);
		$msg='<div class="alert alert-danger">
			<button class="close" data-close="alert"></button> <b>Hapus</b> Data Sukses! </div>';
		$this->transportasi($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('Master_data/transportasi');
	}

	function get_js_trans()
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
		                           document.location.href = "'.base_url().'Master_data/hapus_transportasi/"+id;        
		                       }  
		                    }
		                })    
		            }

		            function get_edit(id)
		            {
		            	$.ajax({
                            url : "'.base_url().'Master_data/get_trans_id/"+id,
                            type : "POST",
                            success: function(data){
	                            	$(window).scrollTop(0);
                                    var result=JSON.parse(data);
                                    $("#id").val(result.id_t);
                                    $("#nama").val(result.nama_t);
                                },
                                error: function()
                                {
                                    bootbox.alert({
                                        message: "Terjadi Kesalahan Sistem !",
                                        callback: function () {
                                            window.location.reload(true);
                                        }
                                    })  
                                }
                        });
		            }
		            ';
	    return $fungsi_js;
	}

	function get_trans_id($id="")
	{
		$query = $this->Model_master->get_transportasi_id($id);
		echo json_encode($query);
	}
	// === End Transportasi === //
}
