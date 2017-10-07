<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_data extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('api/MyModel', '', TRUE);
        $this->load->model('api/Model_master', '', TRUE);
        // header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: OPTIONS, GET, PUT, POST, DELETE');
        header('Access-Control-Allow-Headers: Content-Type, Client-Service, Auth-Key');
    }

    function get_kategori($id='')
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
        		$data = $this->Model_master->tampil_data_kategori($id);

        		if(count($data) > 0)
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

    function get_transportasi($id='')
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
                $data = $this->Model_master->tampil_data_tarnsp($id);

                if(count($data) > 0)
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
       
}
 
