<?php 
 /**
  * 
  */
 class Laporan extends CI_Controller
 {

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('M_pengaduan_admin');

 		$admin = $this->db->get_where('tb_admin',['username' => $this->session->userdata('username_admin')])->row_array();
		if ($this->session->userdata('nik')) {
			redirect('auth/block');
		} elseif(!$this->session->userdata('username_admin') || !$this->session->userdata('level_admin')){
			redirect('auth');
		} elseif($admin['aktif'] == 0) {
			redirect('auth');
		}
 		
 	}

 	public function error404(){
 		$this->load->view('error/404');
 	}
 	
 	private function secure($id){
 		if($this->uri->segment(3) == null){
 			redirect('laporan/error404');
 		} 
 		$pengaduan = $this->M_pengaduan_admin->getPengaduanId($id);
 		if($pengaduan->id_pengaduan != $id){
 			redirect('laporan/error404');
 		}
 	}

 	public function index(){
 		$data['pengguna'] = $this->db->get_where('tb_admin',['username' => $this->session->userdata('username_admin')])->row_array();
 		if($this->input->get('cari')){
 			$cari = $this->input->get('cari');
 			$this->session->set_userdata('cari_pengaduan', $cari);
 		} else{
 			$cari = $this->session->userdata('cari_pengaduan');
 		}
 		$this->db->like('isi_pengaduan', $cari);
 		$this->db->from('tb_pengaduan');

 		$config['base_url'] = 'http://localhost/pengaduan/laporan/index/';
 		$config['total_rows'] = $this->db->count_all_results();
 		$config['per_page'] = 5;
 		$start = $this->uri->segment(3);

 		$this->pagination->initialize($config);

 		$data['pengaduan'] = $this->M_pengaduan_admin->getPengaduanAll($cari, $config['per_page'], $start);
 		$data['title'] = 'Laporan Pengaduan Semua';
 		$this->load->view('templates/header', $data);
 		$this->load->view('templates/navbar');
 		$this->load->view('templates/sidebar', $data);
 		$this->load->view('laporan/index');
 		$this->load->view('templates/footer');
 	}

 	public function hapus($id){
 		return $this->M_pengaduan_admin->hapusLaporan($id);
 	}

 	public function detail($id = null){

 		$this->secure($id);

 		$data['pengguna'] = $this->db->get_where('tb_admin',['username' => $this->session->userdata('username_admin')])->row_array();
 		$data['pengaduan'] = $this->M_pengaduan_admin->getPengaduanId($id);
 		$data['tanggapan'] = $this->M_pengaduan_admin->getTanggapan($id);
 		$data['title'] = 'Detail Laporan Pengaduan';
 		$this->load->view('templates/header', $data);
 		$this->load->view('templates/navbar');
 		$this->load->view('templates/sidebar', $data);
 		$this->load->view('laporan/detail');
 		$this->load->view('templates/footer');
 	}

 	public function add_tanggapan($id){
 		$admin = $this->db->get_where('tb_admin',['username' => $this->session->userdata('username_admin')])->row_array();
 		$this->form_validation->set_rules('tanggapan','tanggapan','required|trim');
 		if($this->form_validation->run() == false){
 			redirect('laporan/detail/' . $id);
 		} else {
 			$this->M_pengaduan_admin->add_tanggapan($id, $admin);
 		}
 	}

 	public function edit_status($id){
 		$this->form_validation->set_rules('status','status','required|trim');
 		if($this->form_validation->run() == false){
 			$this->session->set_flashdata('false','Harap pilih salah satu');
 			redirect('laporan/detail/' . $id);
 		} else {
 			return $this->M_pengaduan_admin->edit_status($id); 
 		}
 	}

 	public function status_selesai(){
 		$data['pengguna'] = $this->db->get_where('tb_admin',['username' => $this->session->userdata('username_admin')])->row_array();
 		if($this->input->get('cari')){
 			$cari = $this->input->get('cari');
 			$this->session->set_userdata('cari_selesai', $cari);
 		} else{
 			$cari = $this->session->userdata('cari_selesai');
 		}

 		$this->db->like('isi_pengaduan', $cari);
 		$this->db->from('tb_pengaduan');
 		$this->db->where('status', 1);

 		$config['base_url'] = 'http://localhost/pengaduan/laporan/status_selesai/';
 		$config['total_rows'] = $this->db->count_all_results();
 		$config['per_page'] = 5;
 		$start = $this->uri->segment(3);

 		$this->pagination->initialize($config);

 		$data['pengaduan'] = $this->M_pengaduan_admin->getPengaduanAllSelesai($cari, $config['per_page'], $start);
 		$data['title'] = 'Laporan Pengaduan Selesai';
 		$this->load->view('templates/header', $data);
 		$this->load->view('templates/navbar');
 		$this->load->view('templates/sidebar', $data);
 		$this->load->view('laporan/selesai');
 		$this->load->view('templates/footer');
 	}

 	public function dalam_proses(){
 		$data['pengguna'] = $this->db->get_where('tb_admin',['username' => $this->session->userdata('username_admin')])->row_array();
 		if($this->input->get('cari')){
 			$cari = $this->input->get('cari');
 			$this->session->set_userdata('cari_proses', $cari);
 		} else{
 			$cari = $this->session->userdata('cari_proses');
 		}

 		$this->db->like('isi_pengaduan', $cari);
 		$this->db->from('tb_pengaduan');
 		$this->db->where('status', 0);

 		$config['base_url'] = 'http://localhost/pengaduan/laporan/dalam_proses/';
 		$config['total_rows'] = $this->db->count_all_results();
 		$config['per_page'] = 5;
 		$start = $this->uri->segment(3);

 		$this->pagination->initialize($config);

 		$data['pengaduan'] = $this->M_pengaduan_admin->getPengaduanAllProses($cari, $config['per_page'], $start);
 		$data['title'] = 'Laporan Pengaduan Dalam Proses';
 		$this->load->view('templates/header', $data);
 		$this->load->view('templates/navbar');
 		$this->load->view('templates/sidebar', $data);
 		$this->load->view('laporan/proses');
 		$this->load->view('templates/footer');
 	}
 }