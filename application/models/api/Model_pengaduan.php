<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengaduan extends CI_Model {

     function create_data($data='')
    {
        $query = $this->db->insert('pengaduan', $data);
        if ($query) {
            return array(
                'response' => '',
                'metadata' => array(
                    'status'    => 200,
                    'message'   => 'Data has been insert'
                )
            );
        } else {
            return array(
                'response' => '',
                'metadata' => array(
                    'status'    => 400,
                    'message'   => 'Data insert error'
                )
            );
        }
    }

    function create_gambar_wisata($data="")
    {
        $query = $this->db->insert('gambar', $data);
        if ($query) {
            return array(
                'response' => '',
                'metadata' => array(
                    'status'    => 200,
                    'message'   => 'Data has been insert'
                )
            );
        } else {
            return array(
                'response' => '',
                'metadata' => array(
                    'status'    => 400,
                    'message'   => 'Data insert error'
                )
            );
        }
    }

    function tampil_data()
    {
            return $this->db->query("SELECT * FROM pengaduan ")->result();
    }




    function delete($id='')
    {
        $data = $this->db->query("DELETE FROM wisata WHERE id_wisata = '$id'");
        
        if($data)
        {
            return array(
                'response' => '',
                'metadata' => array(
                    'status'    => 200,
                    'message'   => 'Success delete user'
                )
            );
        }
        else
        {
            return array(
                'response' => '',
                'metadata' => array(
                    'status'    => 400,
                    'message'   => 'Error delete user'
                )
            );
        }
        
    }

   

    function set_resize($data="")
    {
        $path  = './assets/uploads/wisata/real/';
        $path2 = './assets/uploads/wisata/thumb/';
        // print_r($path2);exit();
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
            $respon = $this->cek_exist_file($path2, $data);

        return $respon;
    }

    function cek_exist_file($path='', $data='')
    {
        for ($i=0; $i < count($data) ; $i++) 
        { 
            // print_r($data);exit();
            $file_cek = $path.$data[$i]['file_name'];
            if(!file_exists($file_cek))
            {
                $respon = array(
                    'response' => '',
                    'metadata' => array(
                        'status'    => 400,
                        'message'   => 'Gagal Resize Data'
                    )
                );
            } else {
                $respon = array(
                    'response' => '',
                    'metadata' => array(
                        'status'    => 200,
                        'message'   => 'Succes Resize Data'
                    )
                );
            }
        }
        return $respon;
    }


}