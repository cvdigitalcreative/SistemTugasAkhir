<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		// Load database
		$this->load->model('mahasiswa_Database');
	}

	public function index()
	{
		if(isset($this->session->userdata['logged_in']) and $_SESSION['logged_in']['role']==="3")
			{
				 $this->load->view('admin/jurusan/index');
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}

	public function dashboard()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="3")
			{
				 $this->load->view('admin/jurusan/index');
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}

	public function jadwalinformasi()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="3")
			{
				 $this->load->view('admin/jurusan/jadwalinformasi');
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}

	public function seminarproposal()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="3")
			{
				$data['data']=$this->tugasakhir_Database->get_tugas_akhir_by_status_tugas_akhir('1');
				$this->load->view('admin/jurusan/seminarproposal',$data);
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}

	public function seminarproposaltodatabase()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="3")
			{
				$id=$this->input->post('id_tugas_akhir');
				$this->tugasakhir_Database->update_status_tugas_akhir($id,'2');
				redirect('Admin/seminarproposal', 'refresh');
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}

	public function seminartugasakhir()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="3")
			{
				$data['data']=$this->seminartugasakhir_Database->get_mahasiswa_by_status_ujian('1');
				$this->load->view('admin/jurusan/seminartugasakhir',$data);
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}

	public function seminartugasakhirtodatabase()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="3")
			{
				$id=$this->input->post('id_tugas_akhir');
				$status_ujian=$this->input->post('status_ujian');
				$this->seminartugasakhir_Database->update_status_ujian_kelulusan($id,$status_ujian);
				redirect('Admin/seminartugasakhir', 'refresh');
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}

	public function daftarjudul()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="3")
			{

				$data['data']=$this->dosen_database->get_all_dosen();
				 $this->load->view('admin/jurusan/daftarjudul',$data);
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}
	public function editjudul()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="3")
			{
				$nim=basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
				$data['mahasiswa']=$this->tugasakhir_Database->get_tugas_akhir_by_nim($nim)->row();
				$data['pembimbing_1']=$this->dosen_database->get_dosen_by_id($data['mahasiswa']->id_pembimbing_1)->row();
				$data['pembimbing_2']=$this->dosen_database->get_dosen_by_id($data['mahasiswa']->id_pembimbing_2)->row();
				$data['data']=$this->dosen_database->get_all_dosen();
				 $this->load->view('admin/jurusan/editjudul',$data);
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}

	public function daftarjudultodatabase()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="3")
			{
				$nama=$this->input->post('nama');
				$nim=$this->input->post('nim');
				$judul_tugas_akhir=$this->input->post('judul_tugas_akhir');
				$id_pembimbing_1=$this->input->post('id_pembimbing_1');
				$id_pembimbing_2=$this->input->post('id_pembimbing_2');

				$this->ujianterakhir_Database->simpan_ujian_terakhir($nim,$id_pembimbing_1,"1");
				$this->ujianterakhir_Database->simpan_ujian_terakhir($nim,$id_pembimbing_2,"2");

				$this->seminartugasakhir_Database->simpan_seminar_tugas_akhir($nim);

				$this->mahasiswa_Database->simpan_mahasiswa($nama,$nim,$judul_tugas_akhir);

				$this->tugasakhir_Database->simpan_laporan($nama,$nim,$judul_tugas_akhir,$id_pembimbing_1,$id_pembimbing_2);
				$this->login_Database->register_mahasiswa($nim);
				$data= array(
						'error_message' => "Berhasil Kiriman",
						'data' => $this->dosen_database->get_all_dosen()
						);
				
				$this->load->view('admin/jurusan/daftarjudul',$data);
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}

	public function updatejudultodatabase()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="3")
			{
				$nama=$this->input->post('nama');
				$nim=$this->input->post('nim');
				$judul_tugas_akhir=$this->input->post('judul_tugas_akhir');
				$id_pembimbing_1=$this->input->post('id_pembimbing_1');
				$id_pembimbing_2=$this->input->post('id_pembimbing_2');

				$this->ujianterakhir_Database->delete_ujian_terakhir($nim);
				$this->ujianterakhir_Database->simpan_ujian_terakhir($nim,$id_pembimbing_1,"1");
				$this->ujianterakhir_Database->simpan_ujian_terakhir($nim,$id_pembimbing_2,"2");

				$this->seminartugasakhir_Database->update_seminar_tugas_akhir($nim);

				$this->mahasiswa_Database->update_mahasiswa($nim,$judul_tugas_akhir);

				$this->tugasakhir_Database->update_laporan($nim,$judul_tugas_akhir,$id_pembimbing_1,$id_pembimbing_2);
				redirect('Admin/seminarproposal', 'refresh');
			} else
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