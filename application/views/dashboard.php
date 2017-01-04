<?php $this->load->view('element/head'); ?>
<?php $this->load->view('element/header');?>
<?php $this->load->view('element/sidebar'); ?>    

<script type="text/javascript" src="<?php echo base_url();?>assets/js/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/exporting.js"></script>
              <!-- page start-->
              <section id="main-content">
          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" align="center"></i> Dashboard</h3>
                </div>
            </div>
              <div class="row">
                  <div class="col-sm-12">
                      <section class="panel">
                          <h2 align="center">Parameterizing </h2>

                          <div class="col-md-12">
                          <div class="grafik" style="height:500px;"></div>
                          </div>

                          <script type="text/javascript">
$('.grafik').highcharts({
 chart: {
  type: 'pie',
  marginTop: 50
 },
 credits: {
  enabled: false
 }, 
 tooltip: {
  pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
 },
 title: {
  text: ''
 },
 subtitle: {
  text: 'DSS for School Repair'
 },
 xAxis: {
  categories: [''],
  labels: {
   style: {
    fontSize: '10px',
    fontFamily: 'Verdana, sans-serif'
   }
  }
 },
 legend: {
  enabled: true
 },
 plotOptions: {
   pie: {
     allowPointSelect: true,
     cursor: 'pointer',
     dataLabels: {
       enabled: false
     },
     showInLegend: true
   }
 },
 series: [{
   'name':'Parameter Value',
   'data':[
     ['Tingkat Kerusakan',683],
     ['Lama Kerusakan',726],
     ['Kapasitas Sekolah',700],
     ['Intensitas Perbaikan',716],
     ['Anggaran Perbaikan', 578],
     ['Kapasitas Bangunan' , 716],
     ['Jarak Sekolah Lain', 681],
     ['Jumlah Guru', 681],
     ['Jumlah Siswa' , 831],
     ['Pertumbuhan Murid' , 783]
     
   ]
 }]
});
</script>
                         <!-- <a href="<?php echo base_url()?>dashboard/diagram_wilayah"  class="btn btn-warning btn-sm">Parameter</a>
                          
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Parameter</th>
                                  
              
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>1</td>
                                  <td>Tingkat kerusakan</td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td>Lama Rusak</td>
                        
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td>Kapasitas Sekolah</td>
        
                              </tr>
                              <tr>
                                  <td>4</td>
                                  <td>Intensitas Perbaikan</td>
                              </tr>
                              <tr>
                                  <td>5</td>
                                  <td>Anggaran Perbaikan</td>
                        
                              </tr>
                              <tr>
                                  <td>6</td>
                                  <td>Kapasitas Lahan</td>
        
                              </tr>
                              <tr>
                                  <td>7</td>
                                  <td>Jarak Sekolah Lain</td>
        
                              </tr>
                              <tr>
                                  <td>8</td>
                                  <td>Jumlah Guru</td>
                              </tr>
                              <tr>
                                  <td>9</td>
                                  <td>Jumlah Siswa</td>
                        
                              </tr>
                              <tr>
                                  <td>10</td>
                                  <td>Pertumbuhan Murid</td>
        
                              </tr>

                              </tbody>
                          </table>
                      </section>
                  </div>
               page start
              <div class="row">
                  <div class="col-sm-6">
                      <section class="panel">
                          <h3 align="center">Daftar Sekolah yang Diperbaiki </h3>
                          <a href="<?php echo base_url()?>dashboard/diagram_wilayah"  class="btn btn-warning btn-sm">Diagram</a>
                          
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama Sekolah</th>
                                  <th>Alamat </th>
              
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>1</td>
                                  <td>SDN 1 Tangsel</td>
                                  <td>Pamulang</td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td>SDN 4 Ciputat</td>
                                  <td>Ciputat</td>
                        
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td>SDN 3 Pamulang</td>
                                  <td>Pamulang</td>
                                  
                              </tr>
                              </tbody>
                          </table>
                      </section>
                  </div>
                  <div class="col-sm-6">
                      <section class="panel">
                          <h3 align="center">Rata-rata Kerusakan </h3>
                          <a href="<?php echo base_url()?>dashboard/diagram"  class="btn btn-warning btn-sm">Diagram</a>
                          <table class="table table-striped">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Kerusakan</th>
                                  <th>Rata-rata</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>1</td>
                                  <td>Dinding</td>
                                  <td>20%</td>
                                  
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td>Atap</td>
                                  <td>10%</td>
                                  
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td>Lantai</td>
                                  <td>30%</td>
                                  
                              </tr>
                              </tbody>
                          </table>
                      </section>
                  </div>
              </div>
                      -->
            
            <!-- DONUT CHART -->
             <!-- <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Donut Chart</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChart" style="height:250px"></canvas>
                </div> /.box-body
              </div>/.box -->


              </div>
                </section>
      </section>
      <!--main content end-->

<?php $this->load->view('element/js'); ?>
