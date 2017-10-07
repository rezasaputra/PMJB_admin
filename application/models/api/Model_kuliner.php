<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kuliner extends CI_Model {

    function create_data($data='')
    {
        $this->db->insert('kuliner', $data);
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

    function create_gambar_kuliner($data="")
    {
        $query = $this->db->insert('gambar_kuliner', $data);
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
            return $this->db->query("SELECT k.*,w.`nama_wisata`, g.gambar FROM kuliner k INNER JOIN wisata w ON k.`id_wisata`=w.`id_wisata`INNER JOIN (SELECT * FROM gambar_kuliner LIMIT 1) g ON k.`id_kuliner`=g.id_kuliner WHERE k.status = 1")->result();
        } else {
            return $this->db->query("SELECT k.*,w.`nama_wisata` FROM kuliner k INNER JOIN wisata w ON k.`id_wisata`=w.`id_wisata` WHERE k.status = 1 AND k.id_kuliner='$id'")->result();
        }
    }

    function get_gambar_kuliner($id_kuliner="")
    {
        return $this->db->query("SELECT * FROM gambar_kuliner WHERE id_kuliner = '$id_kuliner'")->result();
    }


    function delete($id='')
    {
        $data = $this->db->query("DELETE FROM kuliner WHERE id_kuliner = '$id'");
        
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

            $query = $this->db->query("SELECT * FROM kuliner WHERE nama_kuliner LIKE '%$cari%'")->result();
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