<?php
Class Tugasakhir_Database extends CI_Model{

	
	public function simpan_laporan($nama,$nim,$judul_tugas_akhir,$id_pembimbing_1,$id_pembimbing_2)
	{
		$data = array(
			'nama'=>$nama,
			'nim'=> $nim,
			'judul_tugas_akhir'=> $judul_tugas_akhir,
			'id_pembimbing_1'=> $id_pembimbing_1,
			'id_pembimbing_2'=> $id_pembimbing_2); 
		$this->db->insert('tugasakhir',$data);
	}

	public function update_laporan($nim,$judul_tugas_akhir,$id_pembimbing_1,$id_pembimbing_2)
	{
		$this->db->set('judul_tugas_akhir', $judul_tugas_akhir);
		$this->db->set('id_pembimbing_1', $id_pembimbing_1);
		$this->db->set('id_pembimbing_2', $id_pembimbing_2);
		$this->db->set('status_proposal_pembimbing_1', '0');
		$this->db->set('status_proposal_pembimbing_2', '0');
		$this->db->set('status_tugas_akhir', '0');
		$this->db->where('nim', $nim);
		$this->db->update('tugasakhir');
		
	}

	public function get_tugas_akhir_by_status_tugas_akhir($status_tugas_akhir)
	{
		$this->db->select('*');
		$this->db->from('tugasakhir');
		$this->db->where('status_tugas_akhir', $status_tugas_akhir);
		$hasil = $this->db->get();
		return $hasil;
	}

	public function get_tugas_akhir_by_id_pembimbing($id_pembimbing)
	{
		$this->db->select('*');
		$this->db->from('tugasakhir');
		$this->db->where('id_pembimbing_1', $id_pembimbing);
		$this->db->or_where('id_pembimbing_2', $id_pembimbing);
		$hasil = $this->db->get();
		return $hasil;
	}
	
	public function get_tugas_akhir_by_nim($nim)
	{
		$this->db->select('*');
		$this->db->from('tugasakhir');
		$this->db->where('nim', $nim);
		$hasil = $this->db->get();
		return $hasil;
	}
	
	public function get_tugas_akhir_by_id_pembimbing_1($id_pembimbing_1)
	{
		$this->db->select('*');
		$this->db->from('tugasakhir');
		$this->db->where('id_pembimbing_1', $id_pembimbing_1);
		$hasil = $this->db->get();
		return $hasil;
	}

	public function get_tugas_akhir_by_id_pembimbing_2($id_pembimbing_2)
	{
		$this->db->select('*');
		$this->db->from('tugasakhir');
		$this->db->where('id_pembimbing_2', $id_pembimbing_2);
		$hasil = $this->db->get();
		return $hasil;
	}

	public function update_status_proposal_pembimbing_1($id,$status_proposal_pembimbing_1){
		$this->db->set('status_proposal_pembimbing_1', $status_proposal_pembimbing_1);
		$this->db->where('id', $id);
		$this->db->update('tugasakhir');
	}

	public function update_status_proposal_pembimbing_2($id,$status_proposal_pembimbing_2){
		$this->db->set('status_proposal_pembimbing_2', $status_proposal_pembimbing_2);
		$this->db->where('id', $id);
		$this->db->update('tugasakhir');
	}

	public function update_status_tugas_akhir($id,$status_tugas_akhir){
		$this->db->set('status_tugas_akhir', $status_tugas_akhir);
		$this->db->where('id', $id);
		$this->db->update('tugasakhir');
	}

	public function update_berkas_proposal_tugas_akhir($id,$berkas_proposal){
		$this->db->set('berkas_proposal', $berkas_proposal);
		$this->db->where('id', $id);
		$this->db->update('tugasakhir');
	}

	
}
?>