<?php
	class M_grafik extends CI_Model{
		public function __construct()
		{
			$this->load->database();
		}

		public function diagram()
		{
			$data = $this->db->query("SELECT * FROM rata_kerusakan");
			return $data->result();
		}

		public function diagram1()
		{
			$data = $this->db->query("SELECT * FROM wilayah_sekolah");
			return $data->result();
		}
	}

?>