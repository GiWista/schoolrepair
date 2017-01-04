<?php $this->load->view('element/head'); ?>
<?php $this->load->view('element/header'); ?>
<?php $this->load->view('element/sidebar'); ?>
<?php $this->load->view ('element/tambahan') ?>

  <section id="main-content">
          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" align="center"></i>Optimasi</h3>
                </div>
            </div>
            <div class="col-sm-10">
            <h1> </h1>
<!--
<?php

//$dt = array('60','80','30','190','50','60','70','90','100','180','170','120','130','140','150');
echo "<pre>";
var_dump($dt);
print_r($dt);
echo "</pre>";
?>-->

<table border='1'>
  <tr>
    <th>Nama Sekolah</th>
    <th>Nilai DI</th>
  </tr>
<?php foreach ($dt as $nilai) : ?>
  <tr>
    <td></td>
    <td>
      <?php echo ($nilai)?>
    </td>
  </tr>
<?php endforeach; ?>
</table>
<?php
$posisiawal = array_rand($dt);
echo "<br> Nilai Awal ".$dt[$posisiawal]. " ada di posisi ".$posisiawal."<br>";
$cpos = $posisiawal;
function best_neightbor($cpos,$dt){

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

  if($dt[$left_neightbor] >= $dt[$right_neightbor]){
    $best_neightbor = $left_neightbor;
  }else{
    $best_neightbor = $right_neightbor;
  }
  return $best_neightbor;

}

$best_neightborawal = best_neightbor($cpos,$dt);
echo 'ini adalah bestneightbor awal di posisi '.$best_neightborawal. ' dengan nilai '.$dt[$best_neightborawal];
$i=1;
while($i <= 100){
  $bestneightbor = best_neightbor($cpos,$dt);

   if($dt[$cpos] >= $dt[$bestneightbor] ){

      $cpos = $cpos;
      echo "<br>";
     echo 'ini adalah nilai bestneightbor ' .$dt[$cpos];
     echo "<br>";
      break;
    }else {

      
      $cpos = $bestneightbor;
    } 

   $i++;

  } 
  echo 'nilai optimal adalah '.$dt[$cpos].' diposisi '.$cpos;
  /*
  while($temp >= $opt){
    $best_neightbor = best_neightbor($cpos,$dt);
        echo "<b> Ini Temperatur ".$temp."</b> dengan Nilai ".$dt[$cpos]." dan  Posisi di ".$cpos." Dan Best Neightbord : ".$dt[$best_neightbor];

    if($dt[$best_neightbor] > $dt[$cpos]){

      $cpos = $best_neightbor;
      echo "<br>";

    }else {

      $delta = $dt[$best_neightbor]  - $dt[$cpos];
      $rand = rand(0,1);
      $np = exp($delta / $temp);
      echo " Delta nya adalah <b>".$delta."</b> Nilai Perbandingan :  <b>".$np."</b> Random angka : <b>".$rand."</b> ";
      if($np > $rand){
        echo " Ya lebih besar  <br>";
        $cpos = $best_neightbor; 
      }else{
        echo " Tidak Berubah  <br>";
        $cpos = $cpos;
      }

    } 



    $temp = $temp - 10;


  }


  echo " <h3> Dan Nilai ANELING : ".$dt[$cpos]." ada di posisi ".$cpos."</h3>"; */

?>









<!--<p>Silahkan masukan data berikut :</p>
<ul>
    <?php echo form_open('optimasi/perkalian'); ?>
    <?php echo form_input('v1',$v1); ?> x
    <?php echo form_input('v2',$v2); ?> <br>
    <p><?php echo validation_errors();?></p>
     
    <?php echo form_submit('submit','Hitung'); ?>
    <?php echo form_close(); ?> <br>
     
    Hasil : <?php echo $hasil; ?>
</ul> 

    <?php
//$sekolah =array( "SELECT * FROM identitas_sekolah " 

                /* "SDN 1 Tangerang","SDN 2 Tangerang","SDN 3 Tangerang","SDN 4 Tangerang",
                "SDN 5 Tangerang","SDN 1 Pamulang","SDN 2 Pamulang","SDN 3 Pamulang","SDN 4 Pamulang",
                "SDN 5 Pamulang"); */

$query = mysql_query("SELECT * FROM identitas_sekolah");

$array = array();

while($row = mysql_fetch_assoc($query)){
  $array[] = $row;
}

print_r($array); 
/*
$random_keys=array_rand($sekolah,9);
// echo $sekolah[$random_keys[]]."<br>";
$rand = rand(0, count($sekolah)-1);
echo $sekolah[$rand];*/
?>  -->

          </div>
        </section>
    </section>

<?php $this->load->view('element/js'); ?>

