<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuliner extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('api/MyModel', '', TRUE);
        $this->load->model('api/Model_kuliner', '', TRUE);
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

    function all_kuliner($id='')
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
        		$data = $this->Model_kuliner->tampil_data($id);

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

    function get_gambar_kuliner($id_kuliner='')
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
                $data = $this->Model_kuliner->get_gambar_kuliner($id_kuliner);

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

    function create_kuliner()
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
                            'id_wisata'     => $array1[$i]['id_wisata'],
                            'nama_kuliner'  => $array1[$i]['nama_kuliner'],
                            'pic_kuliner'   => $array1[$i]['pic_kuliner'],
                            'jam_buka'      => $array1[$i]['jam_buka'],
                            'alamat_kuliner'=> $array1[$i]['alamat_kuliner'],
                            'latitude'      => $array1[$i]['lat'],
                            'longitude'     => $array1[$i]['long']);
                        $insert_id = $this->Model_kuliner->create_data($data[$i]);
                        $response  = $this->insert_gambar($array2, $insert_id);
                    }
                json_output(200, $response);
            }
        }
    }

    function insert_gambar($array="", $id_kuliner="")
    {
        $jumlah  = COUNT($array);

        $j = 1;
        for ($i=0; $i < $jumlah; $i++) 
        { 
            
            $name = "img_".time().$j++;
            $path = "assets/uploads/resto/real/$name.jpg";
            $actualpath = "http://localhost/$path";
            file_put_contents($path,base64_decode($array[$i]['gambar']));

            $data[$i] = array(
                'id_kuliner' => $id_kuliner,
                'gambar'       => $name);

            $response = $this->Model_kuliner->create_gambar_kuliner($data[$i]);
        }
        return $response;
    }
       
}
 
