<?php
class Admin extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$admin = $this->db->get_where('tb_admin',['username' => $this->session->userdata('username_admin')])->row_array();
		if ($this->session->userdata('nik')) {
			redirect('auth/block');
		} elseif(!$this->session->userdata('username_admin') || !$this->session->userdata('level_admin')){
			redirect('auth');
		} elseif($admin['aktif'] == 0) {
			redirect('auth');
		} 
	}

	public function index(){
		$data['pengguna'] = $this->db->get_where('tb_admin',['username' => $this->session->userdata('username_admin')])->row_array();
		$data['title'] = 'Sistem Pengaduan Masyarakat | Home';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/index');
		$this->load->view('templates/footer');
	}

	public function edit_profile(){
		$data['pengguna'] = $this->db->get_where('tb_admin',['username' => $this->session->userdata('username_admin')])->row_array();
		$data['title'] = 'Edit Profile';

		$this->form_validation->set_rules('nama','Nama','required|trim|min_length[3]',[
			'required' => 'Nama tidak boleh kosong',
			'min_length' => 'Nama min 3 huruf'
		]);

		if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/edit_profile', $data);
			$this->load->view('templates/footer');
		} else {
			$this->pv_edit();
		}
	}

	private function pv_edit(){
		$this->db->set('nama', htmlspecialchars($this->input->post('nama')));
		$this->db->where('username', $this->session->userdata('username_admin'));
		if($this->db->update('tb_admin')){
			$this->session->set_flashdata('true','Profile berhasil di edit');
			redirect('admin/edit_profile');
		} else {
			$this->session->set_flashdata('false','Profile gagal di edit');
			redirect('admin/edit_profile');
		}
	}

	public function edit_password(){
		$data['pengguna'] = $this->db->get_where('tb_admin',['username' => $this->session->userdata('username_admin')])->row_array();
		$data['title'] = 'Edit Password';

		$this->form_validation->set_rules('pl','password lama','required|trim',['required' => 'Password lama harus di isi']);
		$this->form_validation->set_rules('pb','password baru','required|trim|min_length[5]|matches[kpb]',[
			'required' => 'Password baru harus di isi',
			'min_length' => 'Password baru min 5 karakter',
			'matches' => 'Password baru harus sama dengan konfirmasi password baru'
		]);
		$this->form_validation->set_rules('kpb','konfirmasi password baru','required|trim|matches[pb]',[
			'required' => 'Password baru harus di isi',
			'matches' => 'Konfirmasi password baru harus sama dengan password baru'
		]);
		if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('admin/edit_pass', $data);
			$this->load->view('templates/footer');
		} else {
			$this->pv_edit_pass();
		}
	}

	private function pv_edit_pass(){
		$oldpass = htmlspecialchars($this->input->post('pl'));
		$newpass = htmlspecialchars($this->input->post('pb'));
		$admin = $this->db->get_where('tb_admin',['username' => $this->session->userdata('username_admin')])->row_array();

		if($oldpass != $newpass){
			if(password_verify($oldpass, $admin['password'])){
				$pass = password_hash($newpass, PASSWORD_DEFAULT);
			} else {
				$this->session->set_flashdata('false','Password lama salah');
			redirect('admin/edit_password');
			}
		} else {
			$this->session->set_flashdata('false','Password baru tidak boleh sama dengan password lama');
			redirect('admin/edit_password');
		}

		$this->db->set('password', $pass);
		$this->db->where('username', $this->session->userdata('username_admin'));
		if($this->db->update('tb_admin')){
			$this->session->set_flashdata('true','Password berhasil di edit');
			redirect('admin/edit_profile');
		} else {
			$this->session->set_flashdata('false','Password gagal di edit');
			redirect('admin/edit_profile');
		}
	}
}