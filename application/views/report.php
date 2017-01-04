<?php $this->load->view('element/head'); ?>
<?php $this->load->view('element/header'); ?>
<?php $this->load->view('element/sidebar'); ?>
<?php $this->load->view ('element/tambahan'); ?>

<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/datatables.bootstrap.min.css"/>

  <section id="main-content">
          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" align="center"></i>Hasil</h3>
                </div>
            </div>
            <div class="grafik" style="width:100%; height:500px;"></div>
            <?php $sekolah = array();
            $nilai = array();
            $keluar = array();
// echo "<pre>";
// print_r($report);

 foreach($report as $m){ 
    $ma = $this->gen->retrieve_one('identitas_sekolah',array('id_sekolah' => $m['id_sekolah']));
    array_push($sekolah," Sekolah : ".$ma['nama_sekolah']);
    array_push($nilai,$m['keluar']);
 }

 ?>


            <div class="col-sm-10">
            <h1> </h1>
<table class="table table-striped" id="datasekolah">
    <thead>
        <tr> 
            <th> No </th>
            <th> Nama Sekolah </th>
            <th> Nilai DI </th>
            <th> Keluar </th>
        </tr>
    </thead> 
    <tbody>
    <?php foreach ($report as $k => $val) {
        $sekola = $this->gen->retrieve_one('identitas_sekolah',array('id_sekolah' => $val['id_sekolah']));
        ?>
        <tr>
            <th> <?=$k+1;?> </th>
            <th><a href="<?php echo base_url();?>dashboard/detail_sekolah/<?=$sekola['id_sekolah'];?>"> <?=$sekola['nama_sekolah'];?> </a></th>
            <th> <?=$val['nilai'];?> </th>
            <th> <?=$val['keluar'];?> </th>
       </tr>

    <?php } ?>
  </tbody>
</table>

<br>
<a class="btn btn-danger" href="<?=base_url();?>optimasi/reset"> RESET DATA </a>


<script type="text/javascript" src="<?php echo base_url();?>assets/js/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/exporting.js"></script>
<script src="<?=base_url();?>assets/js/jquery.datatables.min.js"></script>
<script src="<?=base_url();?>assets/js/datatables.bootstrap.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
   $("#datasekolah").DataTable();
 });

$('.grafik').highcharts({
 chart: {
  type: 'column',
  marginTop: 80
 },
 credits: {
  enabled: false
 }, 
 tooltip: {
  shared: true,
  crosshairs: true,
  headerFormat: '<b>{point.key}</b>< br />'
 },
 title: {
  text: 'Hasil Optimasi Menggunakan Hill Climbing Sebanyak  <?php echo $_SESSION['percobaan']; ?> Kali '
 },
 subtitle: {
  text: ''
 },
 xAxis: {
  categories: <?php echo json_encode($sekolah); ?>,
  labels: {
   rotation: 0,
   align: 'right',
   style: {
    fontSize: '12px',
    fontFamily: 'Verdana, sans-serif'
   }
  }
 },
 legend: {
  enabled: false
 },
 series: [{
  "name":"Keluar Sebanyak ",
  "data":<?php echo json_encode($nilai,JSON_NUMERIC_CHECK); ?>
  }]
});
</script>

<?php $this->load->view('element/js'); ?>


