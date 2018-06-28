<?php

Class Seminartugasakhir_Database extends CI_Model {

	public function simpan_seminar_tugas_akhir($id_mahasiswa)
	{
		$data = array(
			'id_mahasiswa'=>$id_mahasiswa); 
		$this->db->insert('seminartugasakhir',$data);
	}
	public function update_seminar_tugas_akhir($id_mahasiswa)
	{
		$this->db->set('statusujian',  '0');
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$this->db->update('seminartugasakhir');
		
	}

	public function get_status_ujian($id_mahasiswa)
	{
		$this->db->select('*');
		$this->db->from('seminartugasakhir');
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$hasil = $this->db->get()->row();
		return $hasil;
	}

	public function get_mahasiswa_by_status_ujian($statusujian)
	{
		$this->db->select('*');
		$this->db->from('seminartugasakhir');
		$this->db->join('mahasiswa', 'mahasiswa.nim = seminartugasakhir.id_mahasiswa');
		$this->db->where('statusujian', $statusujian);
		$hasil = $this->db->get();
		return $hasil;
	}
	public function update_status_ujian_kelulusan($id,$statusujian){
		$this->db->set('statusujian',  $statusujian);
		$this->db->where('id', $id);
		$this->db->update('seminartugasakhir');
	}
	public function update_status_ujian($id_mahasiswa,$berkastugasakhir){
		$this->db->set('berkastugasakhir', $berkastugasakhir);
		$this->db->set('statusujian',  '1');
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$this->db->update('seminartugasakhir');
	}

	



}

?>