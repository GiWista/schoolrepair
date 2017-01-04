<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

	class Dashboard extends CI_Controller {

		function __construct(){
			parent::__construct();
			$this->load->model('m_sekolah');
			$this->load->model('m_grafik');
            $this->load->model('m_optimasi');
		}

		function index(){

			$data['title'] = "";

			$this->load->view('dashboard',$data);
		}

		public function diagram(){
			$data ['diagram'] = $this->m_grafik->diagram();
			$this->load->view('grafik',$data);
		}

        public function diagram_wilayah(){
            $data ['diagram'] = $this->m_grafik->diagram1();
            $this->load->view('grafik_wilayah',$data);
        }


		function data_sekolah(){
			$data['school'] = $this->m_sekolah->get_sekolah();
			$this->load->view('data_sekolah',$data);

		}

		function nilai_pv(){
          $data['school'] = $this->m_sekolah->get_sekolah();
            $this->load->view('nilai_pv',$data);
        }
        /*
            $params = array();
            foreach ($data['school']->result() as $school) {
                # code...
                $params[]= array(
                        $school->id_sekolah,
                        $school->nama_sekolah,
                        $school->alamat_sekolah,
                        $school->lama_rusak,
                        $school->kapasitas_sekolah,
                        $school->intensitas_perbaikan,
                        $school->anggaran_perbaikan,
                        $school->kapasitas_lahan,
                        $school->jarak_sekolah_lain,
                        $school->jumlah_guru,
                        $school->jumlah_siswa,
                        $school->pertumbuhan_murid
                    );
            }

            $get_maks = $this->maks($params);
            // foreach ($get_maks as $value) {
            //  # code...
            //  echo $value . "<br>";
            // }
            // consider it done!

            // relative value
            $rel_val = $this->relative_value($params, $get_maks);
            $data['relative_value'] = $rel_val;

            //multiple value
            $mul_pv = $this->multiple_pv($rel_val);
            
            foreach ($mul_pv as $param) {
             foreach ($param as $key => $value) {
                 if ($key !== 'id_sekolah' && $key !== 'nama_sekolah' && $key !== 'alamat_sekolah'){
                     echo $value . "<br>";
                 }
                 # code...
             }
             # code...
             echo "<br>";
            }

            // decision index
            $dec_index = $this->decision_index($mul_pv);
            foreach ($dec_index as $value) {
             # code...
             echo $value . "<br>";
            }
            return $dec_index; 


        }

        function maks($param){
            $maks = array(0,0,0,0,0,0,0,0,0);
            // echo "total sekolah : " . count($param) . "<br>";
            for($i=0; $i < count($param);$i++){
                // echo $maks[$i-3];
                // echo "total atribut : " . count($param[$i]) . "<br>";
                for($j=3; $j < count($param[$i]);$j++){
                    // echo $maks[$i-3] . ">" . $param[$i][$j] . "<br>";
                    // echo $param[$i][$j] . " : ";
                    // echo "index: " . $j . "<br>";
                    // echo $param[$j][$j] . "<br>";
                    // index : 6 = anggaran perbaikan cari yang minimum
                    if($i == 2 || $i == 3 || $i == 4){
                        if($maks[$i] == 0) {
                            $maks[$i] = $param[$j-3][$i+3];
                        }

                        // echo $param[$j-3][$i+3] . "<br>";
                        if($maks[$i] > $param[$j-3][$i+3]){
                            // echo "index : " . $i . " - ";
                            // echo $maks[$i] . " < " . $param[$j][$i+3] . "<br>";
                            $maks[$i] = $param[$j-3][$i+3];
                            // echo "dapat";
                        }
                    }
                    else{
                        if($maks[$i] < $param[$j-3][$i+3]){
                            // echo "index : " . $i . " - ";
                            // echo $maks[$i] . " < " . $param[$j][$i+3] . "<br>";
                            $maks[$i] = $param[$j-3][$i+3];
                            // echo "dapat";
                        }
                    }
                    
                }
            }
            return $maks;
        }

        function relative_value($param, $maks){
            for($i=0; $i < count($param);$i++){         
                for($j=3; $j < count($param[$i]);$j++){
                    // echo gettype($param[$i][$j]);
                    if($j == 5 || $j == 6 || $j == 7){
                        $param[$i][$j] = $maks[$j-3] / intval($param[$i][$j]) ;
                        $param[$i][$j] = round($param[$i][$j], 3);
                    }
                    else {
                        $param[$i][$j] = intval($param[$i][$j]) / $maks[$j-3];
                        $param[$i][$j] = round($param[$i][$j], 3);
                    }
                }
            }
            return $param;
        }

        function multiple_pv($param){
            $cons_pv = array(0.17, 0.15, 0.14, 0.12, 0.11, 0.09, 0.08, 0.07, 0.06, 0.03);

            for($i=0; $i < count($param);$i++){         
                for($j=3; $j < count($param[$i]);$j++){
                    // echo $param[$i][$j] . " - "  ;
                    $param[$i][$j] = $param[$i][$j] * $cons_pv[$j-3];
                    $param[$i][$j] = round($param[$i][$j], 3);
                    // echo $param[$i][$j] . "<br>";
                }
            }
            return $param;
        }

        function decision_index($param) {
            $dec_ind = array();
            for($i=0; $i < count($param);$i++){         
                $temp_val = 0;
                for($j=3; $j < count($param[$i]);$j++){
                    //echo $param[$i][$j] . " - "  ;
                    echo $temp_val . " + " . $param[$i][$j] . " = ";
                    $temp_val += $param[$i][$j];
                    echo $temp_val . "<br>";
                }
                echo "total : " . $temp_val . "<br>";
                $dec_ind[] = $temp_val;
            }
            return $dec_ind;
        }
            */





		function tambah_sekolah(){
			if($this->input->post('submit')){
				$this->m_sekolah->tambah_sekolah();
				redirect('dashboard/data_sekolah');
			}
			$this->load->view('input_sekolah');
		}


		function form(){
			$data['title'] = "Form";
			$this->load->view('form',$data);

		}

		function form_damage(){
			$data['title'] = "Form Damage";
			$this->load->view('form_damage',$data);

		}


		function input_sekolah(){
			$data['school'] = "Input Sekolah";
			$this->load->view('input_sekolah',$data);
		}

		/*
		function detail_sekolah($id_sekolah){
			$where = array('id_sekolah' => $id_sekolah);
			$data['identitas_sekolah'] = $this->m_sekolah->detail_sekolah($where,'identitas_sekolah')->result();
			$this->load->view('detail_sekolah',$data);
		} */


		function detail_sekolah($id_sekolah){
			$data['title'] = "Detail Sekolah";
			
			$data['identitas_sekolah'] = $this->m_sekolah->detail_sekolah($id_sekolah);
			$this->load->view('detail_sekolah',$data);
		}

		function edit_sekolah ($id_sekolah){
			$where = array('id_sekolah' => $id_sekolah);
			$data['identitas_sekolah'] = $this->m_sekolah->edit_sekolah($where,'identitas_sekolah')->result();
			$this->load->view('edit_sekolah',$data);
		}

		function update(){
			$id_sekolah = $this->input->post('id_sekolah');
			$nama_sekolah = $this->input->post('nama_sekolah');
			$alamat_sekolah = $this->input->post('alamat_sekolah');
            $tingkat_kerusakan = $this->input->post('tingkat_kerusakan');
			$lama_rusak = $this->input->post('lama_rusak');
			$kapasitas_sekolah = $this->input->post('kapasitas_sekolah');
			$intensitas_perbaikan = $this->input->post('intensitas_perbaikan');
			$anggaran_perbaikan = $this->input->post('anggaran_perbaikan');
			$kapasitas_lahan = $this->input->post('kapasitas_lahan');
			$jarak_sekolah_lain = $this->input->post('jarak_sekolah_lain');
			$jumlah_guru = $this->input->post('jumlah_guru');
			$jumlah_siswa = $this->input->post('jumlah_siswa');
			$pertumbuhan_murid = $this->input->post('pertumbuhan_murid');


			$data = array(
				'nama_sekolah' => $nama_sekolah,
				'alamat_sekolah' => $alamat_sekolah,
                'tingkat_kerusakan' => $tingkat_kerusakan,
				'lama_rusak' => $lama_rusak,
				'kapasitas_sekolah' => $kapasitas_sekolah,
				'intensitas_perbaikan' => $intensitas_perbaikan,
				'anggaran_perbaikan' => $anggaran_perbaikan,
				'kapasitas_lahan' => $kapasitas_lahan,
				'jarak_sekolah_lain' => $jarak_sekolah_lain,
				'jumlah_guru' => $jumlah_guru,
				'jumlah_siswa' => $jumlah_siswa,
				'pertumbuhan_murid' => $pertumbuhan_murid
				);

			$where = array(
				'id_sekolah' => $id_sekolah
				);

			$this->m_sekolah->update_data($where,$data,'identitas_sekolah');
			
			redirect('dashboard/data_sekolah');
		}

		function delete_sekolah($id){
			$str = "DELETE FROM identitas_sekolah WHERE id_sekolah = '$id'";
			$q = $this->db->query($str);
			redirect('dashboard/data_sekolah');
		}

		function optimizing(){
			$data ['title'] = "Optimmizing";
			$this->load->view('optimizing',$data);
		}

		function report(){
			$data["title"] = "Report";
			$this->load->view('report',$data);
			
		}

		function user(){
			$data['user'] = "Manajemen User";
			$this->load->view('user',$data);


		}
	}

