<?php
Class Dosen_database extends CI_Model{

	public function get_all_dosen()
	{
		
		$hasil = $this->db->get('dosen');
		return $hasil;
	}
	public function get_dosen_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->where('id', $id);
		$hasil = $this->db->get();
		return $hasil;
	}
}
?>