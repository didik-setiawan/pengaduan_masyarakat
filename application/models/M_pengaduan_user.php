<?php 
 /**
  * 
  */
 class M_pengaduan_user extends CI_Model
 {

 	public function getPengaduanIdMasyarakat($id){
 		$this->db->order_by('id_pengaduan','DESC');
 		return $this->db->get_where('tb_pengaduan',['id_masyarakat' => $id])->result();
 	}

 	public function getPengaduanId($id){
 		return $this->db->get_where('tb_pengaduan',['id_pengaduan' => $id])->row();
 	}

 	public function getPengaduanIdJoin($id){
		$q = "SELECT * FROM tb_pengaduan INNER JOIN tb_masyarakat ON tb_pengaduan.id_masyarakat = tb_masyarakat.id_masyarakat WHERE tb_pengaduan.id_pengaduan = $id";
		return $this->db->query($q)->row();
	}

	public function getTanggapan($id){
		$query = "SELECT * FROM tb_tanggapan INNER JOIN tb_admin ON tb_tanggapan.id_admin = tb_admin.id_admin WHERE tb_tanggapan.id_pengaduan = $id ORDER BY tb_tanggapan.id_tanggapan DESC";
		return $this->db->query($query)->result();
	}
 	
 	public function add_Pengaduan($masyarakat){
 		date_default_timezone_set('Asia/Jakarta');
 		$img = $_FILES['foto'];

 		if($img){
 			$config['upload_path']          = './asset/img/pengaduan';
 			$config['allowed_types']        = 'gif|jpg|png|jpeg';
 			$config['max_size']             = 500;

 			$this->load->library('upload', $config);

 			if($this->upload->do_upload('foto')){
 				$foto = $this->upload->data('file_name');
 			} else {
 				$this->session->set_flashdata('false','Kesalahan saat upload foto. harap coba kembali');
 				redirect('pengaduan');
 			}
 		}

 		$data = [
 			'id_pengaduan' => time(),
 			'id_masyarakat' => $masyarakat['id_masyarakat'],
 			'isi_pengaduan' => htmlspecialchars($this->input->post('isi')),
 			'foto' => $foto,
 			'status' => 0,
 			'tanggal' => date('Y-m-d')
 		];

 		if($this->db->insert('tb_pengaduan', $data)){
 			$this->session->set_flashdata('true','Pengaduan baru berhasil di upload');
 			redirect('pengaduan/history');
 		} else {
 			$this->session->set_flashdata('false','Pengaduan baru gagal di upload');
 			redirect('pengaduan');
 		}

 	}


 	public function pengaduan_delete($id){
 		$pengaduan = $this->db->get_where('tb_pengaduan',['id_pengaduan' => $id])->row_array();
 		unlink(FCPATH .'/asset/img/pengaduan/'. $pengaduan['foto']);
 		if($this->db->delete('tb_pengaduan', ['id_pengaduan' => $id])){
 			$this->db->delete('tb_tanggapan',['id_pengaduan' => $id]);
 			$this->session->set_flashdata('true','Pengaduan berhasil di hapus');
 			redirect('pengaduan/history');
 		} else {
 			$this->session->set_flashdata('false','Pengaduan gagal di hapus');
 			redirect('pengaduan/history');
 		}
 	}

 	public function pengaduan_edit($id){
 		$pengaduan = $this->getPengaduanId($id);

 		$img = $_FILES['foto'];
 		if($img){
 			$config['upload_path']          = './asset/img/pengaduan';
 			$config['allowed_types']        = 'gif|jpg|png|jpeg';
 			$config['max_size']             = 500;
 			$this->load->library('upload', $config);

 			if($this->upload->do_upload('foto')){
 				unlink(FCPATH.'/asset/img/pengaduan/'.$pengaduan->foto);
 				$foto = $this->upload->data('file_name');
 			} else {
 				$foto = $pengaduan->foto;
 			}
 		}

 		$this->db->set('isi_pengaduan', htmlspecialchars($this->input->post('isi')));
 		$this->db->set('foto', $foto);
 		$this->db->where('id_pengaduan', $id);
 		if($this->db->update('tb_pengaduan')){
 			$this->session->set_flashdata('true','Pengaduan berhasil di edit');
 			redirect('pengaduan/history');
 		} else {
 			$this->session->set_flashdata('false','Pengaduan gagal di edit');
 			redirect('pengaduan/history');
 		}

 	}


 }