<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

	class M_sekolah extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
			$this->tbl="identitas_sekolah";
		}

		public function get_sekolah(){

			$this->db->order_by('id_sekolah','ASC');

			$query = $getData = $this->db->get('identitas_sekolah');

			if($getData->num_rows() > 0)

				return $query;
			else
				return null;

		}

		function tambah_sekolah(){
		$id_sekolah = $this->input->post('id_sekolah');
		$nama_sekolah = $this->input->post('nama_sekolah');
		$alamat_sekolah = $this->input->post('alamat_sekolah');
		$tingkat_kerusakan = $this->input->post('tingkat_kerusakan');
		$lama_rusak = $this->input->post('lama_rusak');
		$kapasitas_sekolah = $this->input->post('kapasitas_sekolah');
		$intensitas_perbaikan = $this->input->post('intensitas_perbaikan');
		$anggaran_perbaikan= $this->input->post('anggaran_perbaikan');
		$kapasitas_lahan = $this->input->post('kapasitas_lahan');
		$jarak_sekolah_lain = $this->input->post('jarak_sekolah_lain');
		$jumlah_guru = $this->input->post('jumlah_guru');
		$jumlah_siswa = $this->input->post('jumlah_siswa');
		$pertumbuhan_murid = $this->input->post('pertumbuhan_murid');

		$data = array (
		'id_sekolah' => $id_sekolah,
		'nama_sekolah' => $nama_sekolah,
		'tingkat_kerusakan' => $tingkat_kerusakan,
		'alamat_sekolah' => $alamat_sekolah,
		'lama_rusak'=> $lama_rusak,
		'kapasitas_sekolah' =>$kapasitas_sekolah,
		'intensitas_perbaikan' =>$intensitas_perbaikan,
		'anggaran_perbaikan' => $anggaran_perbaikan,
		'kapasitas_lahan' => $kapasitas_lahan,
		'jarak_sekolah_lain' => $jarak_sekolah_lain,
		'jumlah_guru' => $jumlah_guru,
		'jumlah_siswa' => $jumlah_siswa,
		'pertumbuhan_murid' => $pertumbuhan_murid
			);
		$this->db->insert('identitas_sekolah',$data);
	}

	
	function detail_sekolah($id_sekolah){
		$str = "SELECT * FROM identitas_sekolah WHERE id_sekolah = '$id_sekolah'";
		$q = $this->db->query($str);
		$f = $q->row_array();
		return $f;
	}

	function edit_sekolah($where,$table){
		return $this->db->get_where($table,$where);
	}
	
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	


	}