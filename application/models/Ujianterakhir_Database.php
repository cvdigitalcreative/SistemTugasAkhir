<?php

Class Ujianterakhir_Database extends CI_Model {

	public function simpan_ujian_terakhir($id_mahasiswa,$id_pembimbing,$status_pembimbing)
	{
		$data = array(
			'id_mahasiswa'=>$id_mahasiswa,
			'id_pembimbing'=> $id_pembimbing,
			'status_pembimbing'=> $status_pembimbing); 
		$this->db->insert('ujianterakhir',$data);
	}

	public function delete_ujian_terakhir($id_mahasiswa){
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$this->db->delete('ujianterakhir');
	}
	

	public function get_tugas_akhir_by_status_tugas_akhir($id_mahasiswa,$status_pembimbing)
	{
		$this->db->select('*');
		$this->db->from('ujianterakhir');
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$this->db->where('status_pembimbing', $status_pembimbing);
		$hasil = $this->db->get();
		return $hasil;
	}


	public function get_tugas_akhir_by_id_pembimbing($nip)
	{
		$this->db->select('*');
		$this->db->from('ujianterakhir');
		$this->db->join('mahasiswa', 'mahasiswa.nim = ujianterakhir.id_mahasiswa');
		$this->db->where('id_pembimbing', $nip);
		$hasil = $this->db->get();
		return $hasil;
	}


	public function update_bab_1_status_ujian_akhir($id){
		$this->db->set('bab_1_status', '1');
		$this->db->set('tanggal_bab_1',  'NOW()', FALSE);
		$this->db->where('id', $id);
		$this->db->update('ujianterakhir');
	}
	public function update_bab_2_status_ujian_akhir($id){
		$this->db->set('bab_2_status', '1');
		$this->db->set('tanggal_bab_2',  'NOW()', FALSE);
		$this->db->where('id', $id);
		$this->db->update('ujianterakhir');
	}
	public function update_bab_3_status_ujian_akhir($id){
		$this->db->set('bab_3_status', '1');
		$this->db->set('tanggal_bab_3',  'NOW()', FALSE);
		$this->db->where('id', $id);
		$this->db->update('ujianterakhir');
	}
	public function update_bab_4_status_ujian_akhir($id){
		$this->db->set('bab_4_status', '1');
		$this->db->set('tanggal_bab_4',  'NOW()', FALSE);
		$this->db->where('id', $id);
		$this->db->update('ujianterakhir');
	}
	public function update_bab_5_status_ujian_akhir($id){
		$this->db->set('bab_5_status', '1');
		$this->db->set('tanggal_bab_5',  'NOW()', FALSE);
		$this->db->where('id', $id);
		$this->db->update('ujianterakhir');
	}
	public function update_program_status_ujian_akhir($id){
		$this->db->set('program_status', '1');
		$this->db->set('tanggal_program',  'NOW()', FALSE);
		$this->db->where('id', $id);
		$this->db->update('ujianterakhir');
	}





}

?>