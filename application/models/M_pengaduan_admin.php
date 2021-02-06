<?php 

/**
 * 
 */
class M_pengaduan_admin extends CI_Model
{
	public function getPengaduanAll($cari, $limit, $start){
		if($cari){
			$this->db->like('isi_pengaduan', $cari);
		}
		$this->db->order_by('id_pengaduan','DESC');
		return $this->db->get('tb_pengaduan', $limit, $start)->result();
	}

	public function getPengaduanAllSelesai($cari, $limit, $start){
		if($cari){
			$this->db->like('isi_pengaduan', $cari);
		}
		$this->db->order_by('id_pengaduan','DESC');
		$this->db->where('status', 1);
		return $this->db->get('tb_pengaduan', $limit, $start)->result();
	}

	public function getPengaduanAllProses($cari, $limit, $start){
		if($cari){
			$this->db->like('isi_pengaduan', $cari);
		}
		$this->db->order_by('id_pengaduan','DESC');
		$this->db->where('status', 0);
		return $this->db->get('tb_pengaduan', $limit, $start)->result();
	}

	public function getPengaduanId($id){
		$q = "SELECT * FROM tb_pengaduan INNER JOIN tb_masyarakat ON tb_pengaduan.id_masyarakat = tb_masyarakat.id_masyarakat WHERE tb_pengaduan.id_pengaduan = $id";
		return $this->db->query($q)->row();
	}

	public function getTanggapan($id){
		$query = "SELECT * FROM tb_tanggapan INNER JOIN tb_admin ON tb_tanggapan.id_admin = tb_admin.id_admin WHERE tb_tanggapan.id_pengaduan = $id ORDER BY tb_tanggapan.id_tanggapan DESC";
		return $this->db->query($query)->result();
	}

	public function hapusLaporan($id){
		$laporan = $this->db->get_where('tb_pengaduan',['id_pengaduan' => $id])->row_array();
		unlink(FCPATH.'/asset/img/pengaduan/'.$laporan['foto']);
		if($this->db->delete('tb_pengaduan',['id_pengaduan' => $id])){
			$this->db->delete('tb_tanggapan',['id_pengaduan' => $id]);
			$this->session->set_flashdata('true','Laporan pengaduan berhasil di hapus');
			redirect('laporan');
		} else {
			$this->session->set_flashdata('false','Laporan pengaduan gagal di hapus');
			redirect('laporan');
		}
	}

	public function add_tanggapan($id, $admin){
		$data = [
			'id_tanggapan' => time(),
			'id_pengaduan' => $id,
			'isi_tanggapan' => htmlspecialchars($this->input->post('tanggapan')),
			'id_admin' => $admin['id_admin']
		];

		if($this->db->insert('tb_tanggapan', $data)){
			$this->session->set_flashdata('true','Berhasil menambahkan tanggapan');
			redirect('laporan/detail/'.$id);
		} else {
			$this->session->set_flashdata('false','Gagal menambahkan tanggapan');
			redirect('laporan/detail/'.$id);
		}
	}

	public function edit_status($id){
		$this->db->set('status',htmlspecialchars($this->input->post('status')));
		$this->db->where('id_pengaduan', $id);
		if($this->db->update('tb_pengaduan')){
			$this->session->set_flashdata('true','Status berhasil di edit');
			redirect('laporan/detail/'.$id);
		} else {
			$this->session->set_flashdata('false','Status gagal di edit');
			redirect('laporan/detail/'.$id);
		}
	}
}