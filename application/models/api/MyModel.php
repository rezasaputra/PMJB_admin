<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel extends CI_Model {

    var $client_service = "frontend-client";
    var $auth_key       = "pmjb";
    // header('Content-Type: application/json');
    
    public function check_auth_client()
    {
        $client_service = $this->input->get_request_header('Client-Service', TRUE);
        $auth_key       = $this->input->get_request_header('Auth-Key', TRUE);

        if ($client_service == $this->client_service && $auth_key == $this->auth_key) 
        {
            return true;
        } 
        else 
        {
            $respon = array(
                'response' => '',
                'metadata' => array(
                    'status'    => 401,
                    'message'   => 'Unauthorized'
                )
            );
            return json_output(401, $respon);    
        }
    }

    function bad_request()
    {
        return json_output(200, array(
                'response' => '',
                'metadata' => array(
                            'status' => 400,
                            'message' => 'Bad request.'
                )
            ));
    }

    function data_not_found()
    {
         return $json = array(
                        'response'  => '',
                        'metadata'  => array(
                            'status'    => 404,
                            'message'   => 'Data Not Found!'
                            )
                        );
    }

    function success($data)
    {
        return $json = array(
                        'response'  => $data,
                        'metadata'  => array(
                            'status'    => 200,
                            'message'   => 'Success!'
                            )
                        );
    }

}
