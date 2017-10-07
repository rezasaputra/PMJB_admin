<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekitar extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        // $this->load->model('MyModel', '', TRUE);
        $this->load->model('Model_sekitar', '', TRUE);
        // header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: OPTIONS, GET, PUT, POST, DELETE');
        header('Access-Control-Allow-Headers: Content-Type, Client-Service, Auth-Key');
    }

    // function get_ip()
    // {
    //     $pc_ip = 'http://resto.gmedia.bz/';
    //     return $pc_ip;
    // }

    function all_wisata($id='')
    {
    	$method = $_SERVER['REQUEST_METHOD'];
    	if ($method != 'GET') 
    	{
    		$this->MyModel->bad_request();
    	} else 
    	{
            $check_auth_client = $this->MyModel->check_auth_client();
            if ($check_auth_client == true) 
            {
        		$data = $this->Model_sekitar->tampil_data($id);

        		if(count($data)>0)
                {
                    $json = $this->MyModel->success($data);
                }
                else
                {
                    $json = $this->MyModel->data_not_found();
                }

                json_output(200, $json);
            }
    	}
    }

    function all_event_kat($id_kat='')
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'GET') 
        {
            $this->MyModel->bad_request();
        } else 
        {
            $check_auth_client = $this->MyModel->check_auth_client();
            if ($check_auth_client == true) 
            {
                $data = $this->Model_event->tampil_event_kat($id_kat);

                if(count($data)>0)
                {
                    $json = $this->MyModel->success($data);
                }
                else
                {
                    $json = $this->MyModel->data_not_found();
                }

                json_output(200, $json);
            }
        }
    }

    function get_event_user($id_user=''){
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'GET') 
        {
            $this->MyModel->bad_request();
        } else 
        {
            $check_auth_client = $this->MyModel->check_auth_client();
            if ($check_auth_client == true) 
            {
                $data = $this->Model_event->get_event($id_user);

                if(count($data)>0)
                {
                    $json = $this->MyModel->success($data);
                }
                else
                {
                    $json = $this->MyModel->data_not_found();
                }

                json_output(200, $json);
            }
        }
    }

  

function create_event()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') 
        {
            $this->MyModel->bad_request();
        } else {
            $check_auth_client = $this->MyModel->check_auth_client();
            if ($check_auth_client == true) 
            {
                $params  = json_decode(file_get_contents('php://input'), TRUE);
                $id_user=$params['id_user'];
               
                $path = "assets/Event_img/$id_user.jpg";
                $actualpath = "$id_user.jpg";

                $image = $params['gmb_poster'];
                file_put_contents($path,base64_decode($image));
                // echo "<img src='$image'>";
                
                
                $id_kategori=$params['id_kategori'];
                $judul_acara=$params['judul_acara'];
                $desk_acara=$params['desk_acara'];
                $instansi=$params['instansi'];
                $kuota=$params['kuota'];
                $tagline=$params['tag_line'];
                $gmb_poster=$actualpath;
                $id_bid=$params['id_bid'];
                $id_prov=$params['id_prov'];
                $id_kota=$params['id_kota'];
                $tgl_acara=$params['tgl_acara'];
                $tgl_exp=$params['tgl_exp'];
                $harga=$params['harga'];
                $kontak=$params['kontak'];
                $no_rek=$params['no_rek'];
                $alamat=$params['alamat'];
                $status=$params['status'];

                $data = array(
                   
                    'id_user' =>$id_user,
                    'id_kategori' => $id_kategori,
                    'judul_acara' =>$judul_acara,
                    'desk_acara' =>$desk_acara,
                    'instansi' =>$instansi,
                    'kuota' =>$kuota,
                    'gmb_poster' => $gmb_poster,
                    'id_bid' =>$id_bid,
                    'tag_line'=>$tagline,
                    'id_prov' =>$id_prov,
                    'id_kota' => $id_kota,
                    'tgl_acara' =>$tgl_acara,
                    'tgl_exp' =>$tgl_exp,
                    'harga' => $harga,
                    'kontak' =>$kontak,
                    'no_rek' => $no_rek,
                    'alamat' =>$alamat,
                    'status' => $status,);


                $response=$this->Model_makeEvent->create_data($data);

                json_output(200, $response);
            }
        }
    }


    function search_key()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') 
        {
            $this->MyModel->bad_request();
        } else {
            $check_auth_client = $this->MyModel->check_auth_client();
            if ($check_auth_client == true) 
            {
                $params  = json_decode(file_get_contents('php://input'), TRUE);
                
                $cari=$params['cari'];

                $response=$this->Model_makeEvent->search_data($cari);

                json_output(200, $response);
            }
        }
    }

    function search_key_kat()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method != 'POST') 
        {
            $this->MyModel->bad_request();
        } else {
            $check_auth_client = $this->MyModel->check_auth_client();
            if ($check_auth_client == true) 
            {
                $params  = json_decode(file_get_contents('php://input'), TRUE);
                
                $cari=$params['cari'];
                $id_kat=$params['id_kat'];

                $response=$this->Model_makeEvent->search_data_kat($cari,$id_kat);

                json_output(200, $response);
            }
        }
    }
       
}
 
