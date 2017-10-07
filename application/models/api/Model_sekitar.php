<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_sekitar extends CI_Model {

    function create_data($data='')
    {
        $query = $this->db->insert('wisata', $data);
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
            return $this->db->query("SELECT wisata.id_wisata, kategori.nama_kategori, wisata.nama_wisata, 
            wisata.pic_wisata, wisata.latitude, wisata.longtitude FROM wisata INNER JOIN kategori ON wisata.id_kategori = kategori.id_kategori")->result();
        } else {
            return $this->db->query("SELECT wisata.id_wisata, kategori.nama_kategori, wisata.nama_wisata, 
            wisata.pic_wisata, wisata.latitude, wisata.longtitude FROM wisata INNER JOIN kategori ON wisata.id_kategori = kategori.id_kategori WHERE wisata.id_wisata='$id'")->result();
        }
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


}