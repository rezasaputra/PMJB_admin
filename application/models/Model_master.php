<?php
/**
* 
*/
class Model_master extends CI_Model
{
	//CRUD KATEGORI
	function insert_kategori($data="", $id="")
	{
		if($id == "")
		{
			$this->db->insert('kategori', $data);
		} else {
			$this->db->where('id_kategori', $id);
			$this->db->update('kategori', $data);
		}
	}

	function get_kategori_id($id='')
	{
		return $this->db->query("SELECT * FROM kategori WHERE id_kategori='$id'")->row();
	}

	function tampil_kategori()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('status = 1');
		return $this->db->get()->result();
	}

	//CRUD TRANSPORTASI
	function insert_transportasi($data="", $id="")
	{
		if($id == "")
		{
			$this->db->insert('transportasi', $data);
		} else {
			$this->db->where('id_t', $id);
			$this->db->update('transportasi', $data);
		}
	}

	function get_transportasi_id($id="")
	{
		return $this->db->query("SELECT * FROM transportasi WHERE id_t ='$id'")->row();
	}

	function tampil_transportasi()
	{
		$this->db->select('*');
		$this->db->from('transportasi');
		$this->db->where('status = 1');
		return $this->db->get()->result();
	}
}

?>