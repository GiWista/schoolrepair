<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

    class Nilai extends CI_Controller {

        function __construct(){
            parent::__construct();
            $this->load->model('m_optimasi');
            $this->load->model('m_sekolah');

        }

        function index(){

            $data['tittle'] = "";
            //$data['dt'] = $this->nilai_pv();
            //$data1['bobot'] = $this->bobot_param();
            //$data['dt2'] = $this->nilai_pv2();

            $this->load->view('optimasi',$data);
        }

        function bobot_param(){
            $data['param'] = $this->m_optimasi->bobot();
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

            return $rel_val;

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
           //return $mul_pv;
            // decision index
            //$dec_index = $this->decision_index($mul_pv);
            // foreach ($dec_index as $value) {
            //  # code...
            //  echo $value . "<br>";
            // }
            //return $dec_index;
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
                    if($i == 7 ){
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
            $cons_pv = array(0.181, 0.163, 0.145, 0.127, 0.109, 0.090, 0.072, 0.054, 0.036, 0.018);

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




       
}
        

         function nilai_pv2(){
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

           // return $rel_val;

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
            return $mul_pv;
            // decision index
            //$dec_index = $this->decision_index($mul_pv);
            // foreach ($dec_index as $value) {
            //  # code...
            //  echo $value . "<br>";
            // }
            // return $dec_index;
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

    



        