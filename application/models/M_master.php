<?php 
 /**
  * 
  */
 class M_master extends CI_Model
 {

 	public function getMasyarakat(){
 		$this->db->order_by('nama','ASC');
 		return $this->db->get('tb_masyarakat')->result();
 	}

 	public function getPetugas(){
 		$this->db->order_by('nama','ASC');
 		return $this->db->get_where('tb_admin',['level' => 2])->result();
 	}

 	public function getPengaduanBulan(){
 		date_default_timezone_set('Asia/Jakarta');
 		$m = date('m');
 		$y = date('Y');
 		$q = "SELECT * FROM tb_pengaduan WHERE year(tanggal) = $y AND month(tanggal) = $m";
 		return $this->db->query($q)->result();
 	}

 	public function getPengaduanHari(){
 		date_default_timezone_set('Asia/Jakarta');
 		$m = date('m');
 		$y = date('Y');
 		$d = date('d');
 		$q = "SELECT * FROM tb_pengaduan WHERE year(tanggal) = $y AND month(tanggal) = $m AND day(tanggal) = $d";
 		return $this->db->query($q)->result();
 	}

 	// ambil semua data petugas
 	public function getOnlyPetugas($cari, $limit, $start){

 		if($cari){
 			$this->db->like('nama', $cari);
 		}
 		$this->db->order_by('nama','ASC');
 		$this->db->where(['level' => 2]);
 		return $this->db->get('tb_admin', $limit, $start)->result();
 	}

 	// ambil semua data masyarakat
 	public function getAllMasyarakat($cari, $limit, $start){
 		if($cari){
 			$this->db->like('nama', $cari);
 			$this->db->or_like('username', $cari);
 		}
 		$this->db->order_by('tgl_bergabung', 'DESC');
 		return $this->db->get('tb_masyarakat', $limit, $start)->result();
 	}

 	public function getPetugasId($id){
 		return $this->db->get_where('tb_admin',['id_admin' => $id])->row_array();
 	}

 	// tambah data petugas
 	public function add_Petugas(){
 		$data = [
 			'nama' => htmlspecialchars($this->input->post('nama')),
 			'username' => htmlspecialchars($this->input->post('username')),
 			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
 			'telp' => htmlspecialchars($this->input->post('telp')),
 			'level' => htmlspecialchars($this->input->post('level')),
 			'aktif' => 1
 		];

 		if($this->db->insert('tb_admin', $data)){
 			$this->session->set_flashdata('true','Akun petugas berhasil ditambahkan');
 			redirect('master');
 		} else {
 			$this->session->set_flashdata('false','Akun petugas gagal ditambahkan');
 			redirect('master');
 		}
 	}

 	//hapus data petugas
 	public function petugas_delete($id){
 		if($this->db->delete('tb_admin',['id_admin' => $id])){
 			$this->session->set_flashdata('true','Akun petugas berhasil dihapus');
 			redirect('master');
 		} else {
 			$this->session->set_flashdata('false','Akun petugas gagal dihapus');
 			redirect('master');
 		}
 	}

	// aktifkan akun petugas
 	public function petugas_aktif($id){
 		$this->db->set('aktif',1);
 		$this->db->where('id_admin', $id);
 		if($this->db->update('tb_admin')){
 			$this->session->set_flashdata('true','Akun petugas berhasil di aktifkan');
 			redirect('master');
 		} else {	
 			$this->session->set_flashdata('false','Akun petugas gagal di aktifkan');
 			redirect('master');
 		}
 	}

 	// nonaktifkan akun petugas
 	public function petugas_nonaktif($id){
 		$this->db->set('aktif',0);
 		$this->db->where('id_admin', $id);
 		if($this->db->update('tb_admin')){
 			$this->session->set_flashdata('true','Akun petugas berhasil di nonaktifkan');
 			redirect('master');
 		} else {	
 			$this->session->set_flashdata('false','Akun petugas gagal di nonaktifkan');
 			redirect('master');
 		}
 	}


 	// edit level petugas
 	public function edit_level_petugas($id){
 		$this->db->set('level', $this->input->post('level'));
 		$this->db->where('id_admin', $id);
 		if($this->db->update('tb_admin')){
 			$this->session->set_flashdata('true','Level petugas berhasil di edit');
 			redirect('master');
 		} else {
 			$this->session->set_flashdata('false','Level petugas gagal di edit');
 			redirect('master');
 		}
 	}


 	// hapus akun masyarakat
 	public function masyarakat_delete($id){
 		if($this->db->delete('tb_masyarakat', ['id_masyarakat' => $id])){
 			$this->session->set_flashdata('true','Akun masyarakat berhasil di hapus');
 			redirect('master/masyarakat');
 		} else {
 			$this->session->set_flashdata('false','Akun masyarakat gagal di hapus');
 			redirect('master/masyarakat');
 		}
 	}

 	// aktifkan akun masyarakat
 	public function masyarakat_aktif($id){
 		$this->db->set('aktif', 1);
 		$this->db->where('id_masyarakat', $id);
 		if($this->db->update('tb_masyarakat')){
 			$this->session->set_flashdata('true','Akun masyarakat berhasil di aktifkan');
 			redirect('master/masyarakat');
 		} else {
 			$this->session->set_flashdata('false','Akun masyarakat gagal di aktifkan');
 			redirect('master/masyarakat');
 		}
 	} 

 	// nonaktifkan akun masyarakat
 	public function masyarakat_nonaktif($id){
 		$this->db->set('aktif', 0);
 		$this->db->where('id_masyarakat', $id);
 		if($this->db->update('tb_masyarakat')){
 			$this->session->set_flashdata('true','Akun masyarakat berhasil di nonaktifkan');
 			redirect('master/masyarakat');
 		} else {
 			$this->session->set_flashdata('false','Akun masyarakat gagal di nonaktifkan');
 			redirect('master/masyarakat');
 		}
 	}
 }