<?php
Class Mahasiswa_Database extends CI_Model{

	public function simpan_mahasiswa($nama,$nim,$judul_tugas_akhir)
	{
		$data = array(
			'nama'=>$nama,
			'nim'=>$nim,
			'judul_tugas_akhir'=>$judul_tugas_akhir); 
		$this->db->insert('mahasiswa',$data);
	}
	public function update_mahasiswa($nim,$judul_tugas_akhir)
	{
		$this->db->set('judul_tugas_akhir',  $judul_tugas_akhir);
		$this->db->where('nim', $nim);
		$this->db->update('mahasiswa');
		
	}

	public function get_all_mahasiswa()
	{
		
		$hasil = $this->db->get('mahasiswa');
		return $hasil;
	}
	public function get_mahasiswa_by_nim($nim)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where('nim', $nim);
		$hasil = $this->db->get();
		return $hasil;
	}
}
?>