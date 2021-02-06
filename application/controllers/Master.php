<?php 
require_once FCPATH.'asset/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
 /**
  * 
  */
 class Master extends CI_Controller
 {

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('M_master');
 		$admin = $this->db->get_where('tb_admin',['username' => $this->session->userdata('username_admin')])->row_array();
 		if ($this->session->userdata('nik')) {
 			redirect('auth/block');
 		} elseif(!$this->session->userdata('username_admin') || !$this->session->userdata('level_admin')){
 			redirect('auth');
 		} elseif($admin['aktif'] == 0) {
 			redirect('auth');
 		} elseif($this->session->userdata('level_admin') != 1){
 			redirect('auth/block');
 		}
 	}

	// halaman Management data petugas
 	public function index(){
 		$data['title'] = 'Management Data Petugas';
 		$data['pengguna'] = $this->db->get_where('tb_admin',['username' => $this->session->userdata('username_admin')])->row_array();
 		$cari = $this->input->get('cari');
 		$this->db->like('nama', $cari);
 		$this->db->where('level',2);
 		$this->db->from('tb_admin');

 		$config['base_url'] = 'http://localhost/pengaduan/master/index/';
 		$config['total_rows'] = $this->db->count_all_results();
 		$config['per_page'] = 5;
 		$data['start'] = $this->uri->segment(3);
 		$this->pagination->initialize($config);

 		$data['petugas'] = $this->M_master->getOnlyPetugas($cari, $config['per_page'], $data['start']);
 		$this->load->view('templates/header', $data);
 		$this->load->view('templates/navbar');
 		$this->load->view('templates/sidebar', $data);
 		$this->load->view('petugas/index', $data);
 		$this->load->view('templates/footer');
 	}

 	//halaman tambah petugas
 	public function add_Petugas(){
 		$data['title'] = 'Tambah Data Petugas';
 		$data['pengguna'] = $this->db->get_where('tb_admin',['username' => $this->session->userdata('username_admin')])->row_array();

 		$this->form_validation->set_rules('nama','Nama','required|trim|min_length[3]',[
 			'required' => 'Nama harus di isi',
 			'min_length' => 'Nama min 3 huruf'
 		]);
 		$this->form_validation->set_rules('username','Username','required|trim|min_length[5]|is_unique[tb_admin.username]',[
 			'required' => 'Username harus di isi',
 			'min_length' => 'Username min 5 huruf',
 			'is_unique' => 'Username sudah digunakan, silahkan gunakan username lain'
 		]);
 		$this->form_validation->set_rules('password1','Password','required|trim|min_length[5]|matches[password2]',[
 			'required' => 'Password harus di isi',
 			'min_length' => 'Password min 5 karakter',
 			'matches' => 'Password harus sama dengan ulangi password'
 		]);
 		$this->form_validation->set_rules('password2','Ulangi password','required|trim|matches[password1]',[
 			'required' => 'Ulangi password harus di isi',
 			'matches' => 'Ulangi password harus sama dengan password'
 		]);
 		$this->form_validation->set_rules('telp','No telp','required|trim|max_length[13]|is_unique[tb_admin.telp]|numeric',[
 			'required' => 'No telp harus di isi',
 			'max_length' => 'No telp max 13 angka',
 			'is_unique' => 'No telp sudah terdaftar, silahkan gunakan no telp lain',
 			'numeric' => 'No telp harus angka' 
 		]);
 		$this->form_validation->set_rules('level','Level','required',[
 			'required' => 'Harap pilih salah satu level'
 		]);

 		if($this->form_validation->run() == false){
 			$this->load->view('templates/header', $data);
 			$this->load->view('templates/navbar');
 			$this->load->view('templates/sidebar', $data);
 			$this->load->view('petugas/add', $data);
 			$this->load->view('templates/footer');
 		} else {
 			$this->M_master->add_Petugas();
 		}
 	}

 	//hapus data petugas
 	public function petugas_delete($id){
 		return $this->M_master->petugas_delete($id);
 	}

 	// aktifkan petugas
 	public function petugas_aktif($id){
 		return $this->M_master->petugas_aktif($id);
 	} 

 	// nonaktifkan petugas
 	public function petugas_nonaktif($id){
 		return $this->M_master->petugas_nonaktif($id);
 	}

 	// ambil data petugas sesuai ID
 	public function getPetugasId(){
 		$id = $_POST['id'];
 		echo json_encode($this->M_master->getPetugasId($id));
 	}

 	// edit level petugas
 	public function edit_level_petugas(){
 		$this->form_validation->set_rules('level','level','required|trim');
 		if($this->form_validation->run() == false){
 			$this->session->set_flashdata('false','Harap pilih salah satu level');
 			redirect('master');
 		} else {
 			$id = $this->input->post('id');
 			return $this->M_master->edit_level_petugas($id);
 		}
 	}

 	// halaman masyarakat
 	public function masyarakat(){
 		$data['title'] = 'Management Data Masyarakat';
 		$data['pengguna'] = $this->db->get_where('tb_admin',['username' => $this->session->userdata('username_admin')])->row_array();

 		if($this->input->get('cari')){
 			$cari = $this->input->get('cari');
 			$this->session->set_userdata('cari', $cari);
 		} else {
 			$cari = $this->session->userdata('cari');
 		}

 		$this->db->like('nama', $cari);
 		$this->db->or_like('username', $cari);
 		$this->db->from('tb_masyarakat');

 		$config['base_url'] = 'http://localhost/pengaduan/master/masyarakat/';
 		$config['total_rows'] = $this->db->count_all_results();
 		$config['per_page'] = 5;
 		$data['start'] = $this->uri->segment(3);
 		$this->pagination->initialize($config);

 		$data['masyarakat'] = $this->M_master->getAllMasyarakat($cari, $config['per_page'], $data['start']);
 		$this->load->view('templates/header', $data);
 		$this->load->view('templates/navbar');
 		$this->load->view('templates/sidebar', $data);
 		$this->load->view('masyarakat/index', $data);
 		$this->load->view('templates/footer');
 	}

 	// hapus akun masyarakat
 	public function masyarakat_delete($id){
 		return $this->M_master->masyarakat_delete($id);
 	}

 	public function masyarakat_nonaktif($id){
 		return $this->M_master->masyarakat_nonaktif($id);
 	}

 	public function masyarakat_aktif($id){
 		return $this->M_master->masyarakat_aktif($id);
 	}

 	public function generate_laporan(){
 		$data['title'] = 'Generate Laporan';
 		$data['pengguna'] = $this->db->get_where('tb_admin',['username' => $this->session->userdata('username_admin')])->row_array();
 		$this->load->view('templates/header', $data);
 		$this->load->view('templates/navbar');
 		$this->load->view('templates/sidebar', $data);
 		$this->load->view('laporan/generate_laporan', $data);
 		$this->load->view('templates/footer');
 	}

 	public function generator_pdf($html, $filename = '', $size = 'A4', $orientation = 'portrait'){
 		$pdf = new Dompdf;
 		$pdf->loadHtml($html);
 		$pdf->setPaper($size, $orientation);
 		$pdf->render();
 		$pdf->stream($filename . '.pdf', array('Attachment' => 0));
 	}

 	public function topdf_masyarakat(){
 		$data['masyarakat'] = $this->M_master->getMasyarakat();
 		$html = $this->load->view('generate/pdf_masyarakat',$data, true);
 		$this->generator_pdf($html, 'Data Masyarakat');
 	}

 	public function topdf_petugas(){
 		$data['petugas'] = $this->M_master->getPetugas();
 		$html = $this->load->view('generate/pdf_petugas', $data, true);
 		$this->generator_pdf($html, 'Data Petugas');
 	}

 	public function topdf_pengaduan_bulan(){
 		$data['pengaduan'] = $this->M_master->getPengaduanBulan();
 		$data['type'] = 'bulan';
 		$html = $this->load->view('generate/pdf_pengaduan', $data, true);
 		$this->generator_pdf($html, 'Data pengaduan bulan ini');
 	}

 	public function topdf_pengaduan_hari(){
 		$data['pengaduan'] = $this->M_master->getPengaduanHari();
 		$data['type'] = 'hari';
 		$html = $this->load->view('generate/pdf_pengaduan', $data, true);
 		$this->generator_pdf($html, 'Data pengaduan hari ini');
 	}
 }