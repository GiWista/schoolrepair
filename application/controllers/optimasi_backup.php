<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

	class Optimasi extends CI_Controller {

		function __construct(){
			parent::__construct();
			//$this->load->model('m_optimasi');
            $this->load->model('m_sekolah');

		}

		function index(){

			$data['tittle'] = "";
            $data['dt'] = $this->nilai_pv();

			$this->load->view('optimasi',$data);
		}

        
        function nilai_pv(){
            $data['school'] = $this->m_sekolah->get_sekolah();

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
            
            // foreach ($mul_pv as $param) {
            //  foreach ($param as $key => $value) {
            //      if ($key !== 'id_sekolah' && $key !== 'nama_sekolah' && $key !== 'alamat_sekolah'){
            //          echo $value . "<br>";
            //      }
            //      # code...
            //  }
            //  # code...
            //  echo "<br>";
            // }

            // decision index
            $dec_index = $this->decision_index($mul_pv);
            // foreach ($dec_index as $value) {
            //  # code...
            //  echo $value . "<br>";
            // }
            return $dec_index;
        }

        function maks($param){
            $maks = array(0,0,0,0,0,0,0,0,0,0);
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
                    // echo $param[$i][$j] . " - "  ;
                    // echo $temp_val . " + " . $param[$i][$j] . " = ";
                    $temp_val += $param[$i][$j];
                    // echo $temp_val . "<br>";
                }
                // echo "total : " . $temp_val . "<br>";
                $dec_ind[] = $temp_val;
            }
            return $dec_ind;
        }


       /* 
		public function perkalian() //membuat function perkalian
    {
        $this->load->library('form_validation'); //mengambil validasi di library yg sudah disediakan CI
        $this->form_validation->set_rules('v1','Variabel 1','required|integer');
        $this->form_validation->set_rules('v2','Variabel 2','required|integer');
        if ($this->form_validation->run())
        {
        $data['v1']=(int)$this->input->post('v1',true); //mengambil nilai yg dimasukan
        $data['v2']=(int)$this->input->post('v2',true); //mengambil nilai yg dimasukan
        $data['hasil']=$data['v1']*$data['v2']; //proses data
        }
        else
        {
        $data['v1']=0;
        $data['v2']=0;
        $data['hasil']=0;
        }
        $this->load->view('optimasi',$data); //menampilkan hasil proses data
    } */

    /*
    function array($strSql) {
        $display = mysql_query($strSql);

        $arrResult = Array();

        $cnt=0;

        while ($data = mysql_fetch_row($display))
        {
            $arrResult[$cnt++] = $data[0];
        }

        return $arrResult;

    } */

   // function fuzzy($id_bobot){
     //   $data['bobot'] = $this->m_optimasi->fuzzy();
       // $this->load->view('fuzzy',$data);
   /// }
}
		