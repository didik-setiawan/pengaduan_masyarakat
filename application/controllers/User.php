<?php
class User extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $user = $this->db->get_where('tb_masyarakat',['nik' => $this->session->userdata('nik')])->row_array();
        if($this->session->userdata('level_admin')){
            redirect('auth/block');
        } elseif(!$this->session->userdata('nik') || !$this->session->userdata('username_masyarakat')){
            redirect('auth');
        } elseif($user['aktif'] == 0) {
         redirect('auth');
     }
 }

 public function index(){
    $data['title'] = 'Sistem Pengaduan Masyarakat | Home User';
    $data['pengguna'] = $this->db->get_where('tb_masyarakat',['nik' => $this->session->userdata('nik')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('templates/sidebar', $data);
    $this->load->view('user/index', $data);
    $this->load->view('templates/footer');

}

public function edit_profile(){
  $data['title'] = 'Edit Profile Masyarakat';
  $data['pengguna'] = $this->db->get_where('tb_masyarakat',['nik' => $this->session->userdata('nik')])->row_array();

  $this->form_validation->set_rules('nama','nama','required|trim|min_length[3]',[
    'required' => 'Nama harus di isi',
    'min_length' => 'Nama min 3 huruf'
]);

  if($this->form_validation->run() == false){
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar');
      $this->load->view('templates/sidebar', $data);
      $this->load->view('user/edit_profile', $data);
      $this->load->view('templates/footer');
  } else {
   $this->pv_edit_profile();
}
}

private function pv_edit_profile(){
    $this->db->set('nama',htmlspecialchars($this->input->post('nama')));
    $this->db->where('nik', $this->session->userdata('nik'));
    if($this->db->update('tb_masyarakat')){
        $this->session->set_flashdata('true','Profile berhasil di edit');
        redirect('user/edit_profile');
    } else {
        $this->session->set_flashdata('false','Profile gagal di edit');
        redirect('user/edit_profile');
    }
}

public function edit_password(){
    $data['title'] = 'Edit Password';
    $data['pengguna'] = $this->db->get_where('tb_masyarakat',['nik' => $this->session->userdata('nik')])->row_array();

    $this->form_validation->set_rules('pl','password lama','required|trim',['required' => 'Password lama harus di isi']);
    $this->form_validation->set_rules('pb','password baru','required|trim|min_length[5]|matches[kpb]',[
        'required' => 'Password baru harus di isi',
        'min_length' => 'Password baru min 5 karakter',
        'matches' => 'Password baru harus sama dengan konfirmasi password baru'
    ]);
    $this->form_validation->set_rules('kpb','konfirmasi password baru','required|trim|matches[pb]',[
        'required' => 'Konfirmasi Password baru harus di isi',
        'matches' => 'Konfirmasi password baru harus sama dengan password baru'
    ]);
    if($this->form_validation->run() == false){
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/edit_password', $data);
        $this->load->view('templates/footer');
    } else {
        $this->pv_edit_password();
    }

}

private function pv_edit_password(){
    $oldpass = $this->input->post('pl');
    $newpass = $this->input->post('pb');
    $user = $this->db->get_where('tb_masyarakat',['nik' => $this->session->userdata('nik')])->row_array();

    if($newpass != $oldpass){
        if(password_verify($oldpass, $user['password'])){
            $password = password_hash($newpass, PASSWORD_DEFAULT);
        } else {
            $this->session->set_flashdata('false','Password lama salah');
            redirect('user/edit_password');
        }
    } else {
        $this->session->set_flashdata('false','Password baru tidak boleh sama dengan password lama');
        redirect('user/edit_password');
    }

    $this->db->set('password', $password);
    $this->db->where('nik', $this->session->userdata('nik'));
    if($this->db->update('tb_masyarakat')){
        $this->session->set_flashdata('true','Password berhasil di edit');
        redirect('user/edit_profile');
    } else {
        $this->session->set_flashdata('false','Password gagal di edit');
        redirect('user/edit_profile');
    }

}
}