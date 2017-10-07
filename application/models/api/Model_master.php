<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_master extends CI_Model {

    function tampil_data_kategori()
    {
        return $this->db->query("SELECT * FROM kategori WHERE status = 1 ORDER BY nama_kategori ASC")->result();
    }

    function tampil_data_tarnsp()
    {
        return $this->db->query("SELECT * FROM transportasi WHERE status = 1 ORDER BY nama_t ASC")->result();
    }

}