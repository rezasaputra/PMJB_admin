<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('api/MyModel', '', TRUE);
        $this->load->model('api/Model_pengaduan', '', TRUE);
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

    function all_pengaduan()
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
        		$data = $this->Model_pengaduan->tampil_data();

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

    function get_gambar_wisata($id_wisata='')
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
                $data = $this->Model_wisata->get_gambar_wisata($id_wisata);

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

    function create_pengaduan()
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
                //$id_user=$params['id_user'];
               
                //$path = "assets/Event_img/$id_user.jpg";
                //$actualpath = "$id_user.jpg";

                $image = $params['img'];
                //file_put_contents($path,base64_decode($image));
                // echo "<img src='$image'>";
                
                $id_pengaduan=$params['id_pengaduan'];
                $longtitude=$params['longitude'];
                $latitude=$params['latitude'];
                $detail_lokasi=$params['detail_lokasi'];
                $id_firebase=$params['id_firebase'];
                

                $data = array(
                   
                    'id_pengaduan' =>$id_pengaduan,
                    'longtitude' => $longtitude,
                    'latitude' =>$latitude,
                    'detail_lokasi' =>$detail_lokasi,
                    'id_firebase' =>$id_firebase,
                    'img' =>$image,
                    );


                $response=$this->Model_pengaduan->create_data($data);

                json_output(200, $response);
            }
        }
    }


    

    function insert_gambar($array="", $id_wisata="")
    {
        $jumlah  = COUNT($array);

        $j = 1;
        for ($i=0; $i < $jumlah; $i++) 
        { 
            
            $name = "img_".time().$j++.".jpg";
            $path = "assets/uploads/wisata/real/$name";
            $actualpath = "http://localhost/$path";
            file_put_contents($path,base64_decode($array[$i]['gambar']));

            $data[$i] = array(
                'id_wisata' => $id_wisata,
                'url'       => $name);
            $name_img[] = array(
                    'file_name' => $name
                    );
            $response = $this->Model_wisata->create_gambar_wisata($data[$i]);
            $respon = $this->Model_wisata->set_resize($name_img);
        }
        // print_r($name_img);exit();
        return $response;
    }

    
       
}
 
