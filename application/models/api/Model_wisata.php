<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_wisata extends CI_Model {

    function create_data($data='')
    {
        $this->db->insert('wisata', $data);
        // $query = $this->db->insert('wisata', $data);
        return $this->db->insert_id();
        // if ($query) {
        //     return array(
        //         'response' => '',
        //         'metadata' => array(
        //             'status'    => 200,
        //             'message'   => 'Data has been insert'
        //         )
        //     );
        // } else {
        //     return array(
        //         'response' => '',
        //         'metadata' => array(
        //             'status'    => 400,
        //             'message'   => 'Data insert error'
        //         )
        //     );
        // }
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

    function tampil_data($id='')
    {
        if($id=='')
        {
            return $this->db->query("SELECT w.*,k.`nama_kategori`, g.url AS gambar FROM wisata w INNER JOIN kategori k ON w.`id_kategori`=k.`id_kategori` INNER JOIN (SELECT * FROM gambar LIMIT 1 ) g ON w.`id_wisata`=g.id_wisata 
            WHERE w.status = 1")->result();
        } else {
            return $this->db->query("SELECT w.*,k.`nama_kategori` FROM wisata w INNER JOIN kategori k ON w.`id_kategori`=k.`id_kategori` WHERE w.status = 1 AND w.id_wisata='$id'")->result();
        }
    }

    function get_gambar_wisata($id_wisata="")
    {
        return $this->db->query("SELECT * FROM gambar WHERE id_wisata = '$id_wisata'")->result();
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

    function search_data($cari='')
    {
        if($cari=='') {
            $respon = array(
                'response' => '',
                'metadata' => array(
                    'status'    => 400,
                    'message'   => 'Keyword Cannot be null'
                )
            );
        } else {

            $query = $this->db->query("SELECT * FROM wisata WHERE nama_wisata LIKE '%$cari%'")->result();
            if(COUNT($query) == 0){
                $respon = array(
                'response' => '',
                'metadata' => array(
                    'status'    => 400,
                    'message'   => 'Data Not Found'
                )
            );
            } else {
                $respon = array(
                'response' => $query,
                'metadata' => array(
                    'status'    => 200,
                    'message'   => 'Succes Search Data'
                )
            );
            }
        }
        return $respon;
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