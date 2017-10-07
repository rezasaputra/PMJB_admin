<?php
/**
* 
*/
class Model_login extends CI_Model
{
	
	function cek($username="", $password="")
	{
		$this->db->select('*');
		$this->db->where('username',$username);
		$this->db->where('password',md5($password));
		$this->db->where('status = 1');
		$this->db->from('admin');
		return $this->db->get();
	}

	function update_user($username="", $data="")
	{
		$this->db->where('username', $username);
		$this->db->update('admin', $data);
	}
	
}

?>