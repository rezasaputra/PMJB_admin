<?php
/**
* 
*/
class Model_manajemen extends CI_Model
{
	function process_data($table='', $data='', $condition='') 
    {
        if($condition) {
            $this->db->where($condition)->update($table, $data);
        } else {
            $this->db->insert($table, $data);
        }
        return $this->db->insert_id();
    }

	function view_by_id($table='',$condition='',$row='row')
    {
        if($row == 'row') {
            if($condition) {
                return $this->db->where($condition)->get($table)->row();
            } else {
                return $this->db->get($table)->row();
            }
        } else {
            if($condition) {
                return $this->db->where($condition)->get($table)->result();
            } else {
                return $this->db->get($table)->result();
            }
        }
    }

    function view_wisata($id="")
    {
        if($id == "")
        {
            $query = $this->db->query("SELECT w.*, k.`nama_kategori`, t.`nama_t` FROM wisata w INNER JOIN kategori k ON w.`id_kategori`=k.`id_kategori` INNER JOIN transportasi t ON w.`transportasi`=t.`id_t`");
        } else {
            $query = $this->db->query("SELECT w.*, k.`nama_kategori`, t.`nama_t` FROM wisata w INNER JOIN kategori k ON w.`id_kategori`=k.`id_kategori` INNER JOIN transportasi t ON w.`transportasi`=t.`id_t` WHERE w.id_wisata= '$id'");
        }
        return $query;
    }

    function view_kuliner($id="")
    {
        if($id == "")
        {
            $query = $this->db->query("SELECT k.*,w.`nama_wisata` FROM kuliner k INNER JOIN wisata w ON k.`id_wisata`=w.`id_wisata`");
        } else {
            $query = $this->db->query("SELECT k.*,w.`nama_wisata` FROM kuliner k INNER JOIN wisata w ON k.`id_wisata`=w.`id_wisata` WHERE k.`id_kuliner`='$id'");
        }
        return $query;
    }

	function delete_data($table='', $condition='')
    {
        $this->db->where($condition)->delete($table);
        return $this->db->affected_rows();
    }

    function delete_img_dir_wisata($id='')
    {
        $get = $this->db->query("SELECT * FROM gambar WHERE id_gambar ='$id' ")->row();
        $img = $get->url;
        unlink('./assets/uploads/wisata/real/'.$img);
        unlink('./assets/uploads/wisata/thumb/'.$img);
    }

    function delete_img_dir_kuliner($id='')
    {
        $get = $this->db->query("SELECT * FROM gambar_kuliner WHERE idg ='$id' ")->row();
        $img = $get->gambar;
        unlink('./assets/uploads/resto/real/'.$img);
        unlink('./assets/uploads/resto/thumb/'.$img);
    }
}

?>