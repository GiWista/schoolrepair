<?php

	class Report extends CI_Controller {
		function __construct(){
			parent::__construct();

		}

		function index(){
			$this->do_report();
		}

		function do_report(){
			if(isset($_SESSION['percobaan'])){

				$a = "SELECT * FROM hasil_optimasi ORDER BY keluar DESC";
				$b = $this->db->query($a);
				$c = $b->result_array();

				$data['report'] = $c;

				$this->load->view('report',$data);
			}else{
				echo "<script>alert('anda belum melakukan optimasi')</script>";
				redirect('nilai');
			}
		}
	}

?>