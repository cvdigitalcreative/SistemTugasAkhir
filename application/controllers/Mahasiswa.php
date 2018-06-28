<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {	 
		parent::__construct();
		// Load form helper library
		$this->load->helper('form');
		// Load form validation library
		$this->load->library('form_validation');
		// Load session library
		$this->load->library('session');
			// Load database
		$this->load->model('dosen_database');
		// Load database
		$this->load->model('tugasakhir_Database');
		// Load database
		$this->load->model('login_Database');
		// Load database
		$this->load->model('ujianterakhir_Database');
		// Load database
		$this->load->model('seminartugasakhir_Database');
	}

	public function index()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="1")
			{
				 $this->load->view('mahasiswa/index');
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}

	public function dashboard()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="1")
			{
				 $this->load->view('mahasiswa/index');
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}

	public function jadwalinformasi()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="1")
			{
				 $this->load->view('mahasiswa/jadwalinformasi');
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}

	public function proposaltugasakhir()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="1")
			{
				$nim=$_SESSION['logged_in']['username'];
				$data['data']=$this->tugasakhir_Database->get_tugas_akhir_by_nim($nim);
				$result=$data['data']->row();
				$id_pembimbing_1=$result->id_pembimbing_1;
				$id_pembimbing_2=$result->id_pembimbing_2;
				
				 $this->load->view('mahasiswa/proposaltugasakhir',$data);
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}


	public function proposaltugasakhirtodatabase()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="1")
			{
				$nim=$_SESSION['logged_in']['username'];
				$config['upload_path']          = 'berkasproposal/'.$nim;
				if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
				$config['allowed_types']        = 'gif|jpg|png|pdf';
				$config['max_size']             = 3000;
				$upload_path=$config['upload_path']  ;
				$id_tugas_akhir=$this->input->post('id_tugas_akhir');
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('berkasproposal')){
					redirect('Mahasiswa/proposaltugasakhir', 'refresh');
				}else{
					$laporan=$this->upload->data();
					$berkas_proposal=$laporan['file_name'] ;
					$this->tugasakhir_Database->update_berkas_proposal_tugas_akhir($id_tugas_akhir,$berkas_proposal);
					$this->tugasakhir_Database->update_status_tugas_akhir($id_tugas_akhir,'1');
					redirect('Mahasiswa/proposaltugasakhir', 'refresh');
				}
			} 
			else
			{
				redirect('Home', 'refresh');
			}
		
	}


	public function laporanprogress()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="1")
			{
				$nim=$_SESSION['logged_in']['username'];
				$data['status_ujian']=$this->seminartugasakhir_Database->get_status_ujian($nim)->statusujian;
				$data['pembimbing_1']=$this->ujianterakhir_Database->get_tugas_akhir_by_status_tugas_akhir($nim,"1")->row();
				$data['pembimbing_2']=$this->ujianterakhir_Database->get_tugas_akhir_by_status_tugas_akhir($nim,"2")->row();
				
				 $this->load->view('mahasiswa/laporanprogress',$data);
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}

	public function seminartugasakhir()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="1")
			{
				$nim=$_SESSION['logged_in']['username'];
				$config['upload_path']          = 'berkasproposal/'.$nim;
				if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
				$config['allowed_types']        = 'gif|jpg|png|pdf';
				$config['max_size']             = 3000;
				$upload_path=$config['upload_path']  ;
				$id_tugas_akhir=$this->input->post('id_tugas_akhir');
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('berkastugasakhir')){
					redirect('Mahasiswa/laporanprogress', 'refresh');
				}else{
					$laporan=$this->upload->data();
					$berkas_proposal=$laporan['file_name'] ;
					$this->seminartugasakhir_Database->update_status_ujian($nim,$berkas_proposal);
					redirect('Mahasiswa/laporanprogress', 'refresh');
				}
			} 
			else
			{
				redirect('Home', 'refresh');
			}
		
	}


	
	// Logout from admin page
	public function logout() {

		// Removing session data
		$sess_array = array(
		'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		redirect('Home', 'refresh');
	}

}
