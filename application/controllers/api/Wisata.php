<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('api/MyModel', '', TRUE);
        $this->load->model('api/Model_wisata', '', TRUE);
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
        		$data = $this->Model_wisata->tampil_data($id);

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

    function create_wisata()
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
                $array1 = $params['data'];
                $array2 = $params['data2'];

                    for ($i=0; $i < COUNT($array1) ; $i++) 
                    { 
                        $data[$i] = array(
                            'id_kategori'   => $array1[$i]['id_kategori'],
                            'nama_wisata'   => $array1[$i]['nm_wisata'],
                            'deskripsi'     => $array1[$i]['deskripsi'],
                            'pic_wisata'    => $array1[$i]['pic_wisata'],
                            'pengunjung'    => $array1[$i]['pengunjung'],
                            'transportasi'  => $array1[$i]['id_trans'],
                            'alamat'        => $array1[$i]['alamat'],
                            'latitude'      => $array1[$i]['lat'],
                            'longtitude'    => $array1[$i]['long']);
                        $insert_id = $this->Model_wisata->create_data($data[$i]);
                        $response  = $this->insert_gambar($array2, $insert_id);
                    }
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
 
