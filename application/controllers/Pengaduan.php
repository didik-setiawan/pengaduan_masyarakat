<?php 
 /**
  * 
  */
 class Pengaduan extends CI_Controller
 {

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('M_pengaduan_user');

 		$user = $this->db->get_where('tb_masyarakat',['nik' => $this->session->userdata('nik')])->row_array();
        if($this->session->userdata('level_admin')){
            redirect('auth/block');
        } elseif(!$this->session->userdata('nik') || !$this->session->userdata('username_masyarakat')){
            redirect('auth');
        } elseif($user['aktif'] == 0) {
         redirect('auth');
     }
 		
 	}


 	public function secure($id){
 		if($this->uri->segment(3) == null){
 			redirect('pengaduan/error404');
 		}
 		$pengaduan = $this->M_pengaduan_user->getPengaduanId($id);
 		if($pengaduan->id_pengaduan != $id){
 			redirect('pengaduan/error404');
 		}
 	}

 	public function error404(){
 		$this->load->view('error/404');
 	}

 	public function index(){
 		$data['title'] = 'Tambah Pengaduan';
 		$data['pengguna'] = $this->db->get_where('tb_masyarakat',['nik' => $this->session->userdata('nik')])->row_array();

 		$this->form_validation->set_rules('isi','Isi','required|trim|min_length[10]',[
 			'required' => 'Isi pengaduan harus di isi',
 			'min_length' => 'Isi pengaduan min 10 karakter'
 		]);
 		if($this->form_validation->run() == false){
 			$this->load->view('templates/header', $data);
 			$this->load->view('templates/navbar');
 			$this->load->view('templates/sidebar', $data);
 			$this->load->view('pengaduan/add');
 			$this->load->view('templates/footer'); 
 		} else {
 			$this->M_pengaduan_user->add_Pengaduan($data['pengguna']);
 		}
 	}

 	public function history(){
 		$data['title'] = 'Histori Pengaduan';
 		$data['pengguna'] = $this->db->get_where('tb_masyarakat',['nik' => $this->session->userdata('nik')])->row_array();
 		$data['pengaduan'] = $this->M_pengaduan_user->getPengaduanIdMasyarakat($data['pengguna']['id_masyarakat']);
 		$this->load->view('templates/header', $data);
 		$this->load->view('templates/navbar');
 		$this->load->view('templates/sidebar', $data);
 		$this->load->view('pengaduan/history', $data);
 		$this->load->view('templates/footer'); 
 	}

 	public function pengaduan_delete($id){
 		return $this->M_pengaduan_user->pengaduan_delete($id);
 	}

 	public function pengaduan_edit($id = null){
 		$this->secure($id);
 		$data['title'] = 'Edit Pengaduan';
 		$data['pengguna'] = $this->db->get_where('tb_masyarakat',['nik' => $this->session->userdata('nik')])->row_array();
 		$data['pengaduan'] = $this->M_pengaduan_user->getPengaduanId($id);

 		$this->form_validation->set_rules('isi','Isi','required|trim|min_length[10]',[
 			'required' => 'Isi pengaduan harus di isi',
 			'min_length' => 'Isi pengaduan min 10 karakter'
 		]);
 		if($this->form_validation->run() == false){
 			$this->load->view('templates/header', $data);
 			$this->load->view('templates/navbar');
 			$this->load->view('templates/sidebar', $data);
 			$this->load->view('pengaduan/edit', $data);
 			$this->load->view('templates/footer'); 
 		} else {
 			$this->M_pengaduan_user->pengaduan_edit($id);
 		}
 	}

 	public function detail($id = null){
 		$this->secure($id);
 		$data['title'] = 'Detail Pengaduan';
 		$data['pengguna'] = $this->db->get_where('tb_masyarakat',['nik' => $this->session->userdata('nik')])->row_array();
 		$data['pengaduan'] = $this->M_pengaduan_user->getPengaduanIdJoin($id);
 		$data['tanggapan'] = $this->M_pengaduan_user->getTanggapan($id);
 		$this->load->view('templates/header', $data);
 		$this->load->view('templates/navbar');
 		$this->load->view('templates/sidebar', $data);
 		$this->load->view('pengaduan/detail', $data);
 		$this->load->view('templates/footer'); 
 	}


 }