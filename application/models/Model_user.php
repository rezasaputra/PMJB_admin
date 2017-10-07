<?php
/**
* 
*/
class Model_user extends CI_Model
{
	//CRUD KATEGORI
	function insert_admin($data="", $id="")
	{
		if($id == "")
		{
			$this->db->insert('admin', $data);
		} else {
			$this->db->where('uid', $id);
			$this->db->update('admin', $data);
		}
	}

	function get_admin_id($id='')
	{
		return $this->db->query("SELECT * FROM admin WHERE uid='$id'")->row();
	}

	function tampil_admin()
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('level = 2 AND status = 1');
		return $this->db->get()->result();
	}

	function view_client()
	{
		$this->db->select('*');
		$this->db->from('user');
		return $this->db->get()->result();
	}

	function tanggal_indo($tgl, $a = 0)
	{     
        $hari_array = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
        $hr         = date('w', strtotime($tgl));
        $hari       = $hari_array[$hr];
        $tanggal    = substr($tgl, 8, 2);
        $bulan      = $this->getBulan(substr($tgl, 5, 2));
        $tahun      = substr($tgl, 0, 4);
        $hr_tgl     = "$hari, $tanggal $bulan $tahun";
        if($a > 0){
            $hr_tgl     = "$tanggal $bulan $tahun";
        }
        return $hr_tgl;
    }

    function getBulan($bln)
    {
	    switch ($bln)
	    {
	        case '01': 
	                return "Januari";
	                break;
	        case '02':
	                return "Februari";
	                break;
	        case '03':
	                return "Maret";
	                break;
	        case '04':
	                return "April";
	                break;
	        case '05':
	                return "Mei";
	                break;
	        case '06':
	                return "Juni";
	                break;
	        case '07':
	                return "Juli";
	                break;
	        case '08':
	                return "Agustus";
	                break;
	        case '09':
	                return "September";
	                break;
	        case '10':
	                return "Oktober";
	                break;
	        case '11':
	                return "November";
	                break;
	        case '12':
	                return "Desember";
	                break;
	    }
    }
	
}

?>