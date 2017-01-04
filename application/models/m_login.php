<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	class M_login extends CI_Model {
		function cek_login($username,$password){

			$a = $this->db->get_where('user',array('username'=>$username,'password'=> $password),1);
			$b = $a->row_array();
			return $b;

		}

		function detail_user($where){
			$str = "SELECT * FROM user WHERE $where;";
			$q = $this->db->query($str);
			$f = $q->row_array();
			return $f;
		}
		}
	


/*
	// begin
		arrayindexrandom = rand(min max)
		CI nilai[arrayindexrandom] = 10 //curent value

		foreach ($datadi as $key => $value) {
			$after = datadi[arrayindexrandom+1]
			$beforre = datadi[arrayindexrandom-1]

			sementara = 0

			if (after > sementara)
				sementara = after

			if (before > sementara)
				sementara = before

			if (sementarra > CI)
				CI = sementara
		}

		return CI

		// end
*/