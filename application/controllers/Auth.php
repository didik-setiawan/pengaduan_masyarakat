<?php

class Auth extends CI_Controller{
    public function index(){

        if($this->session->userdata('level_admin') || $this->session->userdata('username_admin')){
            redirect('admin');
        } elseif($this->session->userdata('nik') || $this->session->userdata('username_masyarakat')){
            redirect('user');
        }

        $this->form_validation->set_rules('username','Username','required|trim',[
            'required' => 'Username tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('password','Password','required|trim',[
            'required' => 'Password tidak boleh kosong',
        ]);
        if($this->form_validation->run() == false){
            $this->load->view('auth/index');
        } else {
            $this->pv_login();
        }
    }

    private function pv_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $admin = $this->db->get_where('tb_admin',['username' => $username])->row_array();
        $masyarakat = $this->db->get_where('tb_masyarakat',['username' => $username])->row_array();

        if($admin){
            if(password_verify($password, $admin['password'])){
                if($admin['aktif'] == 1){
                    $data = [
                        'level_admin' => $admin['level'],
                        'username_admin' => $admin['username']
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('false','Akun anda sudah tidak aktif');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('false','Password salah');
                redirect('auth');
            }
        } else {
            if($masyarakat){
                if(password_verify($password, $masyarakat['password'])){
                    if($masyarakat['aktif'] == 1){
                        $data = [
                            'nik' => $masyarakat['nik'],
                            'username_masyarakat' => $masyarakat['username']
                        ];
                        $this->session->set_userdata($data);
                        redirect('user');
                    } else {
                        $this->session->set_flashdata('false','Akun anda sudah tidak aktif');
                    redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('false','Password salah');
                redirect('auth');
                }
            } else {
                $this->session->set_flashdata('false','Username tidak terdaftar');
                redirect('auth');
            }
        }

    }

    public function register(){
        if($this->session->userdata('level_admin') || $this->session->userdata('username_admin')){
            redirect('admin');
        } elseif($this->session->userdata('nik') || $this->session->userdata('username_masyarakat')){
            redirect('user');
        }

        
        $this->form_validation->set_rules('nama','Nama','required|trim|min_length[3]',[
            'required' => 'Nama tidak boleh kosong',
            'min_length' => 'Nama min 3 huruf'
        ]);

        $this->form_validation->set_rules('username','Username','required|trim|min_length[5]|is_unique[tb_masyarakat.username]',[
            'required' => 'Username tidak boleh kosong',
            'min_length' => 'Username min 5 huruf',
            'is_unique' => 'Username sudah ada silahkan gunakan username lain'
        ]);

        $this->form_validation->set_rules('telp','No Telp','required|trim|max_length[13]|min_length[10]|numeric|is_unique[tb_masyarakat.telp]',[
            'required' => 'No Telp tidak boleh kosong',
            'min_length' => 'No Telp min 10 angka',
            'max_length' => 'No Telp max 13 angka',
            'numeric' => 'No Telp harus angka',
            'is_unique' => 'No Telp sudah ada, gunakan no telp lain'
        ]);

        $this->form_validation->set_rules('password1','Password','required|trim|min_length[5]|matches[password2]',[
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Password min 5 huruf',
            'matches' => 'Password harus sama dengan ulangi password'
        ]);

        $this->form_validation->set_rules('password2','Password','required|trim|min_length[5]|matches[password1]',[
            'required' => 'Ulangi Password tidak boleh kosong',
            'min_length' => 'Ulangi Password min 5 huruf',
            'matches' => 'Ulangi Password harus sama dengan password'
        ]);

        $this->form_validation->set_rules('nik','NIK','required|trim|min_length[9]|numeric',[
            'required' => 'NIK tidak boleh kosong',
            'min_length' => 'NIK min 9 angka',
            'numeric' => 'NIK harus angka'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('auth/register');
        } else {
           $this->pv_register();
        }
    }

    private function pv_register(){
        $data = [
            'nik' => htmlspecialchars($this->input->post('nik')),
            'nama' => htmlspecialchars($this->input->post('nama')),
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'telp' => htmlspecialchars($this->input->post('telp')),
            'tgl_bergabung' => time(),
            'aktif' => 1
        ];

        if($this->db->insert('tb_masyarakat', $data)){
            $this->session->set_flashdata('true','Akun baru sudah dibuat, Silahkan log in');
            redirect('auth');
        } else {
            $this->session->set_flashdata('false','Akun baru gagal dibuat, Silahkan coba kembali');
            redirect('auth/register');
        }

    }

    public function block(){
        $this->load->view('error/403');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }
}