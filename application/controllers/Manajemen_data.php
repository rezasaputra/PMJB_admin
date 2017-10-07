<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_data extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('Model_master');
		$this->load->model('Model_manajemen');
		if(!$this->session->userdata('username'))
		{
			redirect('');
		}
	}
	  
	public function index($msg='')
	{
		
		
	}

	//========== Hotel =========//
	function hotel($msg='')
	{
		$data['nav']=1;
		
		$data['msg']=$msg;
		$this->load->view('head', $data);
		$this->load->view('manajemen/hotel', $data);
		$this->load->view('foot', $data);
	}

	function formHotel()
	{
		$this->load->view('head');
		$this->load->view('manajemen/form/formhotel');
		$this->load->view('foot');
	}

	//========== Wisata =========//
	function wisata($msg='')
	{
		$data['nav']=1;
		
		$data['msg']=$msg;
		$data['js']=$this->js_wisata();

		$this->load->view('head', $data);
		$this->load->view('manajemen/wisata', $data);
		$this->load->view('foot', $data);
	}

	function formWisata($id=" ")
	{
		$this->load->library('googlemaps');
		$data['trans']		= $this->Model_master->tampil_transportasi();
		$data['kategori']	= $this->Model_master->tampil_kategori();

		$data['js']	= $this->js_edit_wisata();

		$data['edit'] 		= $this->Model_manajemen->view_wisata($id)->row();
		// print_r($id);exit();

		$this->load->view('head');
		$this->load->view('manajemen/form/formwisata', $data);
		$this->load->view('foot');
	}

	//========= Warung Makan ========//
	function warung_makan($msg='')
	{
		$data['nav']=1;
		
		$data['msg']=$msg;
		$data['js']=$this->js_kuliner();
		$this->load->view('head', $data);
		$this->load->view('manajemen/warung_makan', $data);
		$this->load->view('foot', $data);
	}

	function formWarungMakan($id=" ")
	{
		$data['wisata'] = $this->Model_manajemen->view_by_id('wisata', '', 'result');
		$data['edit'] 	= $this->Model_manajemen->view_kuliner($id)->row();
		$data['js'] 	= $this->js_edit_kuliner();

		$this->load->view('head');
		$this->load->view('manajemen/form/formwarung', $data);
		$this->load->view('foot');
	}


	// ===== CRUD wisata ===== // 
	function save_wisata()
	{
		$id = $this->input->post('id');

		$nama_wisata  = $this->input->post('inama');
		$kategori 	  = $this->input->post('ikategori');
		$transportasi = $this->input->post('itransportasi');
		$alamat 	  = $this->input->post('ialamat');
		$pic 		  = $this->input->post('ipic');
		$latitude 	  = $this->input->post('ilat');
		$longitude 	  = $this->input->post('ilong');
		$deskripsi 	  = $this->input->post('ideskripsi');

		$data = array(
				'nama_wisata' => $nama_wisata, 
				'pic_wisata'  => $pic,
				'transportasi' => $transportasi,
				'alamat' 	  => $alamat,
				'id_kategori' => $kategori,
				'latitude' 	  => $latitude,
				'longtitude'   => $longitude,
				'status'      => 1
				);

	    $this->load->library('upload');
	    $dataInfo = array();
	    $files = $_FILES;
	    $cpt = count($_FILES['file']['name']);
	    $path = './assets/uploads/wisata/real/';
	    $path2 = './assets/uploads/wisata/thumb/';
		for($i=0; $i<$cpt; $i++)
	    {           
	        $_FILES['file']['name']		= $files['file']['name'][$i];
	        $_FILES['file']['type']		= $files['file']['type'][$i];
	        $_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
	        $_FILES['file']['error']	= $files['file']['error'][$i];
	        $_FILES['file']['size']	    = $files['file']['size'][$i];    



	        $this->upload->initialize($this->set_upload_options($path));
	        $this->upload->do_upload('file');
	        $dataInfo[] = $this->upload->data();

	        $this->set_resize($path, $path2, $dataInfo);
	    }
	    // print_r();exit();

		if($id)
		{
			$this->Model_manajemen->process_data('wisata', $data, array('id_wisata'=>$id));
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Update</b> Data Sukses! </div>';
			// $insert_id = $id;
		} else {
			$insert_id = $this->Model_manajemen->process_data('wisata', $data);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Simpan</b> Data Sukses! </div>';
			$this->upload_image($dataInfo, $insert_id);
		}

		$this->wisata($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('Manajemen_data/wisata');
	}

	private function set_upload_options($path='')
	{   
	    //upload an image options
	    $config = array();
	    $nmfile = "img_".time();
	    $config['upload_path']   = $path;
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['encrypt_name']  =   TRUE; 
		$config['file_name']     =   $nmfile;

	    return $config;
	}

	function upload_image($data, $id)
	{
		for ($i=0; $i < count($data) ; $i++) 
		{ 
			$data_img = array(
					'id_wisata' => $id,
					'url' => $data[$i]['file_name']
					);
			$this->Model_manajemen->process_data('gambar', $data_img);
		}
	}

	function set_resize($path="", $path2="", $data="")
	{
	    $this->load->library('image_lib');
	    
	    for ($i=0; $i < count($data); $i++) 
	    { 
	    	$config['image_library']    = 'gd2';
	       	$config['source_image']     = $path.$data[$i]['file_name'];
	       	// $config['create_thumb']     = true;
	       	$config['maintain_ratio']   = true;
	       	$config['width']            = '400';
	       	$config['height']           = '120';   
	       	$config['new_image']        = $path2;

	       	$this->image_lib->clear();
	       	$this->image_lib->initialize($config);
	       	$this->image_lib->resize();
	    }
	}

	function tabel_wisata()
	{
		$data=$this->Model_manajemen->view_wisata()->result();
		$no=1;
		$tabel ='<table id="dataTable" class="table table-striped table-bordered" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Wisata</th>
							<th>Kategori</th>
							<th>Transportasi</th>
							<th>Alamat</th>
							<th>Deskripsi</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>';
			foreach ($data as $row) 
			{
				$status = ($row->status == 1) ? '<label class="label label-md label-success">Actived</label>' :'<label class="label label-md label-danger">Deactived</label>';
				$value = ($row->status == 1) ? '0' :'1';
				$tabel.='<tr>
							<td>'.$no++.'</td>
							<td>'.$row->nama_wisata.'</td>
							<td>'.$row->nama_kategori.'</td>
							<td>'.$row->nama_t.'</td>
							<td>'.$row->alamat.'</td>
							<td>'.$row->deskripsi.'</td>
							<td align="center">'.$status.'</td>
							<td>
								<a type="button" title="Edit" onclick="get_edit('.$row->id_wisata.')" class="btn btn-primary"><i class="fa fa-pencil fa-lg"></i> </a>
								<a type="button" onclick="confirm_del('.$row->id_wisata.')" title="Hapus" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> </a>
								<a type="button" title="Status" onclick="get_status('.$row->id_wisata.','.$value.')" class="btn btn-warning"><i class="fa fa-refresh fa-lg"></i> </a>
								<a type="button" onclick="detail('.$row->id_wisata.')" title="Detail" class="btn btn-info"><i class="fa fa-eye fa-lg"></i> </a>
							</td>
						</tr>';
			}
		$tabel.='</tbody></table>';
		echo $tabel;
	}

	function detail_wisata($id='')
	{
		$data['detail'] = $this->Model_manajemen->view_wisata($id)->row();
		$data['gambar'] = $this->Model_manajemen->view_by_id('gambar', array('id_wisata' => $id), 'result');

		$this->load->view('head', $data);
		$this->load->view('manajemen/detail_wisata', $data);
		$this->load->view('foot', $data);
	}

	function hapus_wisata($id='')
	{
		$delete_wisata = $this->Model_manajemen->delete_data('wisata', array('id_wisata' => $id));
		$delete_gmb_wisata = $this->Model_manajemen->delete_data('gambar', array('id_wisata' => $id));
			if($delete_wisata > 0 && $delete_gmb_wisata > 0)
			{
				$msg='<div class="alert alert-success">
				<button class="close" data-close="alert"></button> <b>Hapus</b> Data Berhasil! </div>';
			} else {
				$msg='<div class="alert alert-danger">
				<button class="close" data-close="alert"></button> <b>Gagal</b> Menghapus Data! </div>';
			}

		$this->wisata($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('Manajemen_data/wisata');
	}

	function update_gambar_wisata($id_wisata='')
	{
		$this->load->library('upload');
	    $dataInfo = array();
	    $files = $_FILES;
	    $cpt = count($_FILES['gambar']['name']);
	    $path = './assets/uploads/wisata/real/';
	    $path2 = './assets/uploads/wisata/thumb/';
		for($i=0; $i<$cpt; $i++)
	    {           
	        $_FILES['gambar']['name']		= $files['gambar']['name'][$i];
	        $_FILES['gambar']['type']		= $files['gambar']['type'][$i];
	        $_FILES['gambar']['tmp_name'] = $files['gambar']['tmp_name'][$i];
	        $_FILES['gambar']['error']	= $files['gambar']['error'][$i];
	        $_FILES['gambar']['size']	    = $files['gambar']['size'][$i];    

	        $this->upload->initialize($this->set_upload_options($path));
	        $this->upload->do_upload('gambar');
	        $dataInfo[] = $this->upload->data();

	        $this->set_resize($path, $path2, $dataInfo);
	    }

	    for ($i=0; $i < count($dataInfo) ; $i++) 
		{ 
			$data_img = array(
					'id_wisata' => $id_wisata,
					'url' => $dataInfo[$i]['file_name']
					);
			$update = $this->Model_manajemen->process_data('gambar', $data_img);
		}
		if($update > 0)
			{
				$status = TRUE;
				$message = 'Simpan gambar sukses !';
			} else {
				$status = FALSE;
				$message = 'Simpan gambar gagal !';
			}
		echo json_encode(array('status' => $status, 'message' => $message));
	}

	function update_status($id='', $val='')
	{
		$data = array('status' => $val);
		$this->Model_manajemen->process_data('wisata', $data, array('id_wisata' => $id));

		echo json_encode(array('status' => TRUE, 'message' => 'Status Berhasil DiUbah'));
	}

	function tabel_gmb_wisata($id=' ')
	{
		$data=$this->Model_manajemen->view_by_id('gambar', array('id_wisata' => $id), 'result');
		$no=1;
		$tabel ='<table id="dataTable" class="table table-striped table-bordered" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Gambar</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>';
			foreach ($data as $row) 
			{
				$tabel.='<tr>
							<td>'.$no++.'</td>
							<td><img width="200px;" src="'.base_url().'assets/uploads/wisata/real/'.$row->url.'"> </td>
							<td>
								<a type="button" onclick="confirm_del('.$row->id_gambar.','.$row->id_wisata.')" title="Hapus" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> </a>
							</td>
						</tr>';
			}
		$tabel.='</tbody></table>';
		echo $tabel;
	}

	function hapus_gmb_wisata($id='')
	{
		$delete_gmb_wisata = $this->Model_manajemen->delete_data('gambar', array('id_gambar' => $id));
		$this->Model_manajemen->delete_img_dir_wisata($id);
			if($delete_gmb_wisata > 0)
			{
				$status = TRUE;
				$message = 'Hapus gambar sukses !';
			} else {
				$status = FALSE;
				$message = 'Hapus gambar gagal !';
			}
		echo json_encode(array('status' => $status, 'message' => $message));
	}

	function js_edit_wisata()
	{
		$js = ' loadtable();
				function loadtable()
	            {
	            	var id = $("#id").val();
	            	// alert(id);
	            	$.ajax({
                        url : "'.base_url().'Manajemen_data/tabel_gmb_wisata/"+id,
                        type : "POST",
                        success: function(data){
                            	$("#tabel_gambar").html(data);
                            	$("#dataTable").DataTable({
                            		responsive:true
                            	});
                            
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

	            function confirm_del(id)
	            {
	                bootbox.confirm({ 
	                    size: "small",
	                    message: "Anda Akan Menghapus Data ini?", 
	                    callback: function(result){ 
		                    if(result)
		                    {
		                    	$.ajax({
			                        url : "'.base_url().'Manajemen_data/hapus_gmb_wisata/"+id,
			                        type : "POST",
			                        dataType : "JSON",
			                        success: function(data){
			                            	if(data.status == true)
			                            	{
			                            		bootbox.alert({
				                                    message: data.message,
				                                    callback: function () {
				                                    }
				                                })
				                                loadtable(); 
			                            	}
			                            
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
	                    }
	                })    
	            }
	            
	            $("#add_data").click(function(){
	            	$("#modal_gmb").modal("show");
	            	$("#gambar").val();
	            });

	            var id_wisata = $("#id").val();

	            $("#form_gambar").submit(function(event){
			        event.preventDefault();
			        var d = new FormData($(this)[0]);
			        $.ajax({
			            url : "'.base_url().'Manajemen_data/update_gambar_wisata/"+id_wisata,
			            type : "post",
			            data : d,
			            dataType : "json",
			            async : false,
			            cache : false,
			            contentType : false,
			            processData : false,
			            success : function(data) {
			                if(data.status == true) {
			                    $("#modal_gmb").modal("hide");
			                    bootbox.alert({
				                        message: data.message+"",
				                        callback: function () {
				                        }
				                    }) 
				                loadtable(); 
			                } else {
			                	bootbox.alert({
				                        message: data.message+"",
				                        callback: function () {
				                        }
				                    }) 
			                }
			            }
			        });
			        return false;
			    }); 
				';
		return $js;
	}


	function js_wisata()
	{
		$fungsi_js = '
					function confirm_del(id)
		            {
		                bootbox.confirm({ 
		                    size: "small",
		                    message: "Anda Akan Menghapus Data ini?", 
		                    callback: function(result){ 
		                       if (result) 
		                       {
		                           document.location.href = "'.base_url().'Manajemen_data/hapus_wisata/"+id;        
		                       }  
		                    }
		                })    
		            }
		            function get_status(id, val)
		            {
		            	bootbox.confirm({ 
		                    size: "small",
		                    message: "Anda Akan Mengubah Status Wisata ini?", 
		                    callback: function(result){ 
			                    if(result)
			                    {
			                    	$.ajax({
			                            url : "'.base_url().'Manajemen_data/update_status/"+id+"/"+val,
			                            type : "POST",
			                            success: function(data){
			                                    var result=JSON.parse(data);
			                                    if(result.status == true)
			                                    {
			                                    	loadtable();
			                                    	bootbox.alert({
								                        message: result.message+"",
								                        callback: function () {
								                        }
								                    })
			                                    }
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
		                    }
		                })  
		            }

		            function detail(id)
		            {
		            	window.location.href ="'.base_url().'Manajemen_data/detail_wisata/"+id;
		       	    }

		            function get_edit(id)
		            {
		            	window.location.href ="'.base_url().'Manajemen_data/formwisata/"+id;
		            }

		            loadtable();
		            
		            function loadtable()
		            {
		            	$.ajax({
                            url : "'.base_url().'Manajemen_data/tabel_wisata/",
                            type : "POST",
                            success: function(data){
	                            	$("#tabel_wisata").html(data);
	                            	$("#dataTable").DataTable({
	                            		responsive:true
	                            	});
                                
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

	// === End CRUD wisata === // 	


	// ===== CRUD Kuliner ===== //
	function save_kuliner()
	{
		$id = $this->input->post('id');

		$id_wisata  = $this->input->post('id_wisata');

		$nama       = $this->input->post('inama');
		$alamat 	= $this->input->post('ialamat');
		$latitude 	= $this->input->post('ilat');
		$longitude 	= $this->input->post('ilong');
		$jam_buka 	= $this->input->post('ijam_buka');

		$data = array(
				'nama_kuliner' => $nama, 
				'id_wisata'    => $id_wisata,
				'alamat_kuliner' => $alamat,
				'jam_buka' 	   => $jam_buka,
				'latitude' 	   => $latitude,
				'longitude'    => $longitude,
				'status'       => 1
				);

	    $this->load->library('upload');
	    $dataInfo = array();
	    $files = $_FILES;
	    $cpt = count($_FILES['file']['name']);
	    $path = './assets/uploads/resto/real/';
	    $path2 = './assets/uploads/resto/thumb/';
		for($i=0; $i<$cpt; $i++)
	    {           
	        $_FILES['file']['name']		= $files['file']['name'][$i];
	        $_FILES['file']['type']		= $files['file']['type'][$i];
	        $_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
	        $_FILES['file']['error']	= $files['file']['error'][$i];
	        $_FILES['file']['size']	    = $files['file']['size'][$i];    

	        $this->upload->initialize($this->set_upload_options($path));
	        $this->upload->do_upload('file');
	        $dataInfo[] = $this->upload->data();

	        $this->set_resize($path, $path2, $dataInfo);
	    }
	    // print_r();exit();

		if($id)
		{
			$this->Model_manajemen->process_data('kuliner', $data, array('id_kuliner'=>$id));
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Update</b> Data Sukses! </div>';
			// $insert_id = $id;
		} else {
			$insert_id = $this->Model_manajemen->process_data('kuliner', $data);
			$msg='<div class="alert alert-success">
			<button class="close" data-close="alert"></button> <b>Simpan</b> Data Sukses! </div>';
			$this->upload_image_kuliner($dataInfo, $insert_id);
		}

		$this->warung_makan($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('Manajemen_data/warung_makan');
	}

	function upload_image_kuliner($data, $id)
	{
		for ($i=0; $i < count($data) ; $i++) 
		{ 
			$data_img = array(
					'id_kuliner' => $id,
					'gambar' => $data[$i]['file_name']
					);
			$this->Model_manajemen->process_data('gambar_kuliner', $data_img);
		}
	}

	function tabel_kuliner()
	{
		$data=$this->Model_manajemen->view_kuliner()->result();
		$no=1;
		$tabel ='<table id="dataTable" class="table table-striped table-bordered" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Kuliner</th>
							<th>Dekat Wisata</th>
							<th>Jam Buka</th>
							<th>Alamat</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>';
			foreach ($data as $row) 
			{
				$status = ($row->status == 1) ? '<label class="label label-md label-success">Actived</label>' :'<label class="label label-md label-danger">Deactived</label>';
				$value = ($row->status == 1) ? '0' :'1';
				$tabel.='<tr>
							<td>'.$no++.'</td>
							<td>'.$row->nama_kuliner.'</td>
							<td>'.$row->nama_wisata.'</td>
							<td>'.$row->jam_buka.'</td>
							<td>'.$row->alamat_kuliner.'</td>
							<td align="center">'.$status.'</td>
							<td>
								<a type="button" title="Edit" onclick="get_edit('.$row->id_kuliner.')" class="btn btn-primary"><i class="fa fa-pencil fa-lg"></i> </a>
								<a type="button" onclick="confirm_del('.$row->id_kuliner.')" title="Hapus" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> </a>
								<a type="button" title="Status" onclick="get_status('.$row->id_kuliner.','.$value.')" class="btn btn-warning"><i class="fa fa-refresh fa-lg"></i> </a>
								<a type="button" onclick="detail('.$row->id_kuliner.')" title="Detail" class="btn btn-info"><i class="fa fa-eye fa-lg"></i> </a>
							</td>
						</tr>';
			}
		$tabel.='</tbody></table>';
		echo $tabel;
	}

	function hapus_kuliner($id='')
	{
		$delete_wisata = $this->Model_manajemen->delete_data('kuliner', array('id_kuliner' => $id));
		$delete_gmb_wisata = $this->Model_manajemen->delete_data('gambar_kuliner', array('id_kuliner' => $id));
			if($delete_wisata > 0 && $delete_gmb_wisata > 0)
			{
				$msg='<div class="alert alert-success">
				<button class="close" data-close="alert"></button> <b>Hapus</b> Data Berhasil! </div>';
			} else {
				$msg='<div class="alert alert-danger">
				<button class="close" data-close="alert"></button> <b>Gagal</b> Menghapus Data! </div>';
			}

		$this->warung_makan($msg);
		$this->session->set_flashdata('message', $msg);
		redirect('Manajemen_data/warung_makan');
	}

	function update_status_kuliner($id='', $val='')
	{
		$data = array('status' => $val);
		$this->Model_manajemen->process_data('kuliner', $data, array('id_kuliner' => $id));

		echo json_encode(array('status' => TRUE, 'message' => 'Status Berhasil DiUbah'));
	}

	function detail_kuliner($id='')
	{
		$data['detail'] = $this->Model_manajemen->view_kuliner($id)->row();
		$data['gambar'] = $this->Model_manajemen->view_by_id('gambar_kuliner', array('id_kuliner' => $id), 'result');

		$this->load->view('head', $data);
		$this->load->view('manajemen/detail_kuliner', $data);
		$this->load->view('foot', $data);
	}

	function update_gambar_kuliner($id_wisata='')
	{
		$this->load->library('upload');
	    $dataInfo = array();
	    $files = $_FILES;
	    $cpt = count($_FILES['gambar']['name']);
	    $path = './assets/uploads/resto/real/';
	    $path2 = './assets/uploads/resto/thumb/';
		for($i=0; $i<$cpt; $i++)
	    {           
	        $_FILES['gambar']['name']		= $files['gambar']['name'][$i];
	        $_FILES['gambar']['type']		= $files['gambar']['type'][$i];
	        $_FILES['gambar']['tmp_name'] = $files['gambar']['tmp_name'][$i];
	        $_FILES['gambar']['error']	= $files['gambar']['error'][$i];
	        $_FILES['gambar']['size']	    = $files['gambar']['size'][$i];    

	        $this->upload->initialize($this->set_upload_options($path));
	        $this->upload->do_upload('gambar');
	        $dataInfo[] = $this->upload->data();

	        $this->set_resize($path, $path2, $dataInfo);
	    }

	    for ($i=0; $i < count($dataInfo) ; $i++) 
		{ 
			$data_img = array(
					'id_kuliner' => $id_wisata,
					'gambar' => $dataInfo[$i]['file_name']
					);
			$update = $this->Model_manajemen->process_data('gambar_kuliner', $data_img);
		}
		if($update > 0)
			{
				$status = TRUE;
				$message = 'Simpan gambar sukses !';
			} else {
				$status = FALSE;
				$message = 'Simpan gambar gagal !';
			}
		echo json_encode(array('status' => $status, 'message' => $message));
	}

	function hapus_gmb_kuliner($id='')
	{
		$delete_gmb_kuliner = $this->Model_manajemen->delete_data('gambar_kuliner', array('idg' => $id));
		$this->Model_manajemen->delete_img_dir_kuliner($id);
			if($delete_gmb_kuliner > 0)
			{
				$status = TRUE;
				$message = 'Hapus gambar sukses !';
			} else {
				$status = FALSE;
				$message = 'Hapus gambar gagal !';
			}
		echo json_encode(array('status' => $status, 'message' => $message));
	}

	function tabel_gmb_kuliner($id=' ')
	{
		$data=$this->Model_manajemen->view_by_id('gambar_kuliner', array('id_kuliner' => $id), 'result');
		$no=1;
		$tabel ='<table id="dataTable" class="table table-striped table-bordered" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Gambar</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>';
			foreach ($data as $row) 
			{
				$tabel.='<tr>
							<td>'.$no++.'</td>
							<td><img width="200px;" src="'.base_url().'assets/uploads/resto/real/'.$row->gambar.'"> </td>
							<td>
								<a type="button" onclick="confirm_del('.$row->idg.','.$row->id_kuliner.')" title="Hapus" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> </a>
							</td>
						</tr>';
			}
		$tabel.='</tbody></table>';
		echo $tabel;
	}

	function js_edit_kuliner()
	{
		$js = ' loadtable();
				function loadtable()
	            {
	            	var id = $("#id").val();
	            	// alert(id);
	            	$.ajax({
                        url : "'.base_url().'Manajemen_data/tabel_gmb_kuliner/"+id,
                        type : "POST",
                        success: function(data){
                            	$("#tabel_gambar").html(data);
                            	$("#dataTable").DataTable({
                            		responsive:true
                            	});
                            
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

	            function confirm_del(id)
	            {
	                bootbox.confirm({ 
	                    size: "small",
	                    message: "Anda Akan Menghapus Data ini?", 
	                    callback: function(result){ 
		                     if(result)
		                     {
		                     	$.ajax({
			                        url : "'.base_url().'Manajemen_data/hapus_gmb_kuliner/"+id,
			                        type : "POST",
			                        dataType : "JSON",
			                        success: function(data){
			                            	if(data.status == true)
			                            	{
			                            		bootbox.alert({
				                                    message: data.message,
				                                    callback: function () {
				                                    }
				                                })
				                                loadtable(); 
			                            	}
			                            
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
	                    }
	                })    
	            }
	            
	            $("#add_data").click(function(){
	            	$("#modal_gmb").modal("show");
	            	$("#gambar").val();
	            });

	            var id_kuliner = $("#id").val();

	            $("#form_gambar").submit(function(event){
			        event.preventDefault();
			        var d = new FormData($(this)[0]);
			        $.ajax({
			            url : "'.base_url().'Manajemen_data/update_gambar_kuliner/"+id_kuliner,
			            type : "post",
			            data : d,
			            dataType : "json",
			            async : false,
			            cache : false,
			            contentType : false,
			            processData : false,
			            success : function(data) {
			                if(data.status == true) {
			                    $("#modal_gmb").modal("hide");
			                    bootbox.alert({
				                        message: data.message+"",
				                        callback: function () {
				                        }
				                    }) 
				                loadtable(); 
			                } else {
			                	bootbox.alert({
				                        message: data.message+"",
				                        callback: function () {
				                        }
				                    }) 
			                }
			            }
			        });
			        return false;
			    }); 
				';
		return $js;
	}

	function js_kuliner()
	{
		$fungsi_js = '
					function confirm_del(id)
		            {
		                bootbox.confirm({ 
		                    size: "small",
		                    message: "Anda Akan Menghapus Data ini?", 
		                    callback: function(result){ 
		                       if (result) 
		                       {
		                           document.location.href = "'.base_url().'Manajemen_data/hapus_kuliner/"+id;        
		                       }  
		                    }
		                })    
		            }
		            function get_status(id, val)
		            {
		            	bootbox.confirm({ 
		                    size: "small",
		                    message: "Anda Akan Mengubah Status Kuliner ini?", 
		                    callback: function(result){ 
		                       	if(result)
		                       	{
		                       		$.ajax({
			                            url : "'.base_url().'Manajemen_data/update_status_kuliner/"+id+"/"+val,
			                            type : "POST",
			                            success: function(data){
			                                    var result=JSON.parse(data);
			                                    if(result.status == true)
			                                    {
			                                    	loadtable();
			                                    	bootbox.alert({
								                        message: result.message+"",
								                        callback: function () {
								                        }
								                    })
			                                    }
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
		                    }
		                })  
		            }

		            function detail(id)
		            {
		            	window.location.href ="'.base_url().'Manajemen_data/detail_kuliner/"+id;
		       	    }

		            function get_edit(id)
		            {
		            	window.location.href ="'.base_url().'Manajemen_data/formWarungMakan/"+id;
		            }

		            loadtable();
		            
		            function loadtable()
		            {
		            	$.ajax({
                            url : "'.base_url().'Manajemen_data/tabel_kuliner/",
                            type : "POST",
                            success: function(data){
	                            	$("#tabel_kuliner").html(data);
	                            	$("#dataTable").DataTable({
	                            		responsive:true
	                            	});
                                
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
	// === End CRUD Kuliner === // 	


		
}
