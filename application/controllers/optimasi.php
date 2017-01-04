<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

	class Optimasi extends CI_Controller {

		function __construct(){
			parent::__construct();
			$this->load->model('m_optimasi');
            $this->load->model('m_sekolah');

		}

         function newopt(){
            $_SESSION['percobaan'] = $_POST['nilai'];
            $nilai = $_POST['nilai'];
             $this->benchmark->mark('code_start');
            for ($x=1;$x<=$nilai; $x++){
                $this->index($x);
            }
            echo "Selesai dalam ";
            echo $this->benchmark->elapsed_time('code_start','code_end');
            echo " detik";
            echo "<br>";
            echo "<br>";
            echo "<a class='btn btn-primary ' href='".base_url()."report/do_report'> Hasil </a>'";
            
        }
        
        // function nilai_awal(){
        //     $data['school'] = $this->m_sekolah->get_sekolah();
        //     $data['content'] = "optimasi/before";

        //     $this->load->

        // }

        // function test(){
        //    // $test = $this->m_optimasi->bobot();
        //         $test = $this->gen->retrieve_many('bobot_parameter');
        //     echo "<pre>";
        //     print_r($test);
        //     echo "</pre>";
        // }

        function reset(){
            unset($_SESSION['percobaan']);
            $a ="DELETE FROM hasil_optimasi";
            $b = $this->db->query($a);
            if($b){
                redirect('nilai');
            }
        }    

        // function hitung(){
        //     $px = $this->m_optimasi->bobot();

        //     $param = array();
        //     for($x=1;$x<=count($px)-1;$x++){
        //         array_push($param, );
        //     }
        //     echo '<pre>';
        //     print_r($param);
        //     var_dump($param);
        //     echo '</pre>';
             // echo '<pre>';
            // var_dump($param);
            // echo '</pre>';

           // cek($param);

        function get_nilai($val,$data,$param){

            // print_r($param);
            // exit;

            $nilaike1 = $data[$val]['v1'] * $param[0]['nilai_bobot'];
            $nilaike2 = $data[$val]['v2'] * $param[1]['nilai_bobot'];
            $nilaike3 = $data[$val]['v3'] * $param[2]['nilai_bobot'];
            $nilaike4 = $data[$val]['v4'] * $param[3]['nilai_bobot'];
            $nilaike5 = $data[$val]['v5'] * $param[4]['nilai_bobot'];
            $nilaike6 = $data[$val]['v6'] * $param[5]['nilai_bobot'];
            $nilaike7 = $data[$val]['v7'] * $param[6]['nilai_bobot'];
            $nilaike8 = $data[$val]['v8'] * $param[7]['nilai_bobot'];
            $nilaike9 = $data[$val]['v9'] * $param[8]['nilai_bobot'];
            $nilaike10 = $data[$val]['v10'] * $param[9]['nilai_bobot'];

            $di = $nilaike1 + $nilaike2 + $nilaike3 + $nilaike4 + $nilaike5 + $nilaike6 + $nilaike7 + $nilaike8 + $nilaike9 + $nilaike10;

            return $di;

         }


         function best_neightbor($cpos,$dt,$param){
        if($cpos == 0){
            $left_neightbor = $cpos +1;
            $right_neightbor = $cpos + 1;
         }else{ 
            $left_neightbor = $cpos - 1;
            $right_neightbor = $cpos + 1;
            }
        if(!isset($dt[$left_neightbor])){
            $dt[$left_neightbor] = $dt[$right_neightbor];
        }else if(!isset($dt[$right_neightbor])){
             $dt[$right_neightbor] = $dt[$left_neightbor];
        }


         $nilaikiri = $this->get_nilai($left_neightbor,$dt,$param);
         $nilaikanan = $this->get_nilai($right_neightbor,$dt,$param);

        if($nilaikiri >= $nilaikanan){
            $best_neightbor = $left_neightbor;
            $nilai = $nilaikiri;
        }else{
            $best_neightbor = $right_neightbor;
            $nilai= $nilaikanan;
        }

        return $nilai."-".$best_neightbor;

        }

    
    function fix_optimasi($data = array()){

        //buat ngemudahin laporan
            // if(isset($_SESSION['percobaan'])){
            //      $_SESSION['percobaan'] = $_SESSION['percobaan'] + 1;
         // }else{
            //  $percobaan = 1;
            //  }

            if(isset($percobaan)){
                $percobaan = $percobaan + 1;
            }else{
                $percobaan = 1;
            }

            
            // if($percobaan >= $_SESSION['percobaan']){
            // echo "<a class='btn btn-primary' href='".base_url()."report/do_report'> Hasil </a>'";
            // echo "<br /> Selesai dalam ";
            // echo $this->benchmark->elapsed_time('code_start','code_end');
            // echo " detik";
            //                 // $_SESSION['percobaan'] = 1;
            // }

            $param = $this->gen->retrieve_many('bobot_parameter');
            // $param = array();
            // foreach($px as $key => $ppp){
            //  $pxz = array($ppp['nilai']);
            //  array_push($param,$pxz);
            // }

            //mencari nilai awal random data
            $a = array_rand($data);

            $cpos = $a;
            $nilaiawal = $this->get_nilai($a,$data,$param);
            $dicpos = $nilaiawal;

            $i=1;
            while($i <= 1000000){
             $best_neightbor = $this->best_neightbor($cpos,$data,$param);
             $di = explode("-",$best_neightbor);

             if($dicpos >= $di[0] ){
                $cpos = $cpos;
             $dicpos = $dicpos;
     //  echo "<br>";
     // echo 'ini adalah nilai bestneightbor ' .$dt[$cpos];
     // echo "<br>";
             break;
            }else {

      
            $dicpos = $di[0];
            $cpos = $di[1];
         } 

         $i++;

        }    

            $this->benchmark->mark('code_end');


        $aj = $this->gen->retrieve_one('hasil_optimasi',array('id_sekolah' => $data[$cpos]['id_sekolah']));

            if(count($aj) == 0){
            $dta = array(
                'keluar' => 1,
                'id_sekolah' => $data[$cpos]['id_sekolah'],
                'nilai' => $dicpos);
                        $this->db->insert('hasil_optimasi',$dta);

            }else{
            $keluar = $aj['keluar'] + 1;
            $dta = array('keluar' => $keluar);
            $this->db->update('hasil_optimasi',$dta,array('id_sekolah' => $data[$cpos]['id_sekolah']));
        }


        }    

        function index($percobaan){
            $data = $this->gen->retrieve_many('identitas_sekolah');

            for($x=1;$x<=10;$x++){
                $pmax['p'.$x] = array();
            }
            array_walk($data, function(&$val) use (&$pmax) {

                $val['v1'] = $val['tingkat_kerusakan'];
                $val['v2'] = $val['lama_rusak'];
                $val['v3'] = $val['kapasitas_sekolah'];
                $val['v4'] = $val['intensitas_perbaikan'];
                $val['v5'] = $val['anggaran_perbaikan'];
                $val['v6'] = $val['kapasitas_lahan'];
                $val['v7'] = $val['jarak_sekolah_lain'];
                $val['v8'] = $val['jumlah_guru'];
                $val['v9'] = $val['jumlah_siswa'];
                $val['v10'] = $val['pertumbuhan_murid'];

                for($x=1;$x<=10;$x++){
                    array_push($pmax['p'.$x],$val['v'.$x]);
                }


            }
            );



            array_walk($data, function(&$val) use (&$pmax){

                $val['v1'] = round($val['v1'] / max($pmax['p1']),2);
                $val['v2'] = round($val['v2'] / max($pmax['p2']),2);
                $val['v3'] = round($val['v3'] / max($pmax['p3']),2);
                $val['v4'] = round($val['v4'] / max($pmax['p4']),2);
                $val['v5'] = round(min($pmax['p5']) / $val['v5'],2);
                $val['v6'] = round($val['v6'] / max($pmax['p6']),2);
                $val['v7'] = round($val['v7'] / max($pmax['p7']),2);
                $val['v8'] = round($val['v8'] / max($pmax['p8']),2);
                $val['v9'] = round($val['v9'] / max($pmax['p9']),2);
                $val['v10'] = round($val['v10'] / max($pmax['p10']),2);
            });

            $this->fix_optimasi($data,$percobaan);
        }




        }    



        

        
        




		