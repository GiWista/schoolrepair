<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

	class M_optimasi extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
			$this->tbl="bobot_parameter";
		}

			public function bobot(){

			$this->db->order_by('id_bobot','ASC');

			$query  = $this->db->get('bobot_parameter');
				return $query->result();
			//else
			//	return null;

		}

        // function tes(){
        //     $query = SELECT * FROM bobot_parameter;
        //     return $query;
        // }

    }

		