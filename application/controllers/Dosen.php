<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

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
	}
	public function index()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="2")
			{
				 $this->load->view('dosen/index');
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}

	public function dashboard()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="2")
			{
				 $this->load->view('dosen/index');
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}

	public function jadwalinformasi()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="2")
			{
				 $this->load->view('dosen/jadwalinformasi');
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}
	
	public function daftarmahasiswa()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="2")
			{
				$id_pembimbing=$_SESSION['logged_in']['username'];
				$data['data']=$this->tugasakhir_Database->get_tugas_akhir_by_id_pembimbing($id_pembimbing);
				$this->load->view('dosen/daftarmahasiswa',$data);
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}
	
	public function proposalmahasiswa()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="2")
			{
				$id_pembimbing=$_SESSION['logged_in']['username'];
				$data['pembimbing_1']=$this->tugasakhir_Database->get_tugas_akhir_by_id_pembimbing_1($id_pembimbing);
				$data['pembimbing_2']=$this->tugasakhir_Database->get_tugas_akhir_by_id_pembimbing_2($id_pembimbing);
				
				 $this->load->view('dosen/proposalmahasiswa',$data);
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}

	public function proposalmahasiswapembimbing1todatabase()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="2")
			{
				$id=$this->input->post('id_tugas_akhir');
				$status_proposal_pembimbing_1=$this->input->post('status_proposal_pembimbing_1');
				$this->tugasakhir_Database->update_status_proposal_pembimbing_1($id,$status_proposal_pembimbing_1);
				redirect('Dosen/proposalmahasiswa', 'refresh');
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}

	public function proposalmahasiswapembimbing2todatabase()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="2")
			{
				$id=$this->input->post('id_tugas_akhir');
				$status_proposal_pembimbing_2=$this->input->post('status_proposal_pembimbing_2');
				$this->tugasakhir_Database->update_status_proposal_pembimbing_2($id,$status_proposal_pembimbing_2);
				redirect('Dosen/proposalmahasiswa', 'refresh');
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}

	public function tugasakhirmahasiswa()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="2")
			{
				$nip=$_SESSION['logged_in']['username'];
				$data['data']=$this->ujianterakhir_Database->get_tugas_akhir_by_id_pembimbing($nip);
				 $this->load->view('dosen/tugasakhirmahasiswa',$data);
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}


	public function updatebab1()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="2")
			{
				$id=$this->input->post('id_ujian_akhir');
				
				$this->ujianterakhir_Database->update_bab_1_status_ujian_akhir($id);
				redirect('Dosen/tugasakhirmahasiswa', 'refresh');
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}
	public function updatebab2()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="2")
			{
				$id=$this->input->post('id_ujian_akhir');
				
				$this->ujianterakhir_Database->update_bab_2_status_ujian_akhir($id);
				redirect('Dosen/tugasakhirmahasiswa', 'refresh');
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}
	public function updatebab3()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="2")
			{
				$id=$this->input->post('id_ujian_akhir');
				
				$this->ujianterakhir_Database->update_bab_3_status_ujian_akhir($id);
				redirect('Dosen/tugasakhirmahasiswa', 'refresh');
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}
	public function updatebab4()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="2")
			{
				$id=$this->input->post('id_ujian_akhir');
				
				$this->ujianterakhir_Database->update_bab_4_status_ujian_akhir($id);
				redirect('Dosen/tugasakhirmahasiswa', 'refresh');
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}
	public function updatebab5()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="2")
			{
				$id=$this->input->post('id_ujian_akhir');
				
				$this->ujianterakhir_Database->update_bab_5_status_ujian_akhir($id);
				redirect('Dosen/tugasakhirmahasiswa', 'refresh');
			} else
			{
				redirect('Home', 'refresh');
			}
		
	}
	public function updateprogram()
	{
		if(isset($this->session->userdata['logged_in'])and $_SESSION['logged_in']['role']==="2")
			{
				$id=$this->input->post('id_ujian_akhir');
				$this->ujianterakhir_Database->update_program_status_ujian_akhir($id);
				redirect('Dosen/tugasakhirmahasiswa', 'refresh');
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