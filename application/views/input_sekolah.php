<?php $this->load->view('element/head'); ?>
<?php $this->load->view('element/header'); ?>
<?php $this->load->view('element/sidebar'); ?>
<?php $this->load->view ('element/tambahan') ?>

	<section id="main-content">
          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" align="center"></i>Input Sekolah</h3>
                </div>
            </div>
            <div class="input">
            <?php echo form_open('dashboard/tambah_sekolah') ?>
  <table class="table table-hover">
   <tr>
    <td> ID </td>
    <td> <?php echo form_input('id_sekolah'); ?> </td>
  </tr> 
  <tr>
    <td> Nama Sekolah </td>
    <td> <?php echo form_input('nama_sekolah'); ?> </td>
  </tr>
  <tr>
    <td> Alamat Sekolah </td>
    <td> <?php echo form_textarea('alamat_sekolah'); ?> </td>
  </tr>
  <tr>
    <td> Tingkat Kerusakan </td>
    <td> <?php echo form_input('tingkat_kerusakan'); ?> &nbsp; %</td>
  </tr>
  <tr>
    <td> Lama Rusak </td>
    <td> <?php echo form_input('lama_rusak'); ?> &nbsp; Bulan</td>
  </tr>
  <tr>
    <td> Kapasitas Sekolah </td>
    <td> <?php echo form_input('kapasitas_sekolah'); ?> &nbsp; %</td>
  </tr>
  <tr>
    <td> Intensitas Perbaikan </td>
    <td> <?php echo form_input('intensitas_perbaikan'); ?>&nbsp; kali</td>
  </tr>
  <tr>
    <td> Anggaran Perbaikan </td>
    <td> <?php echo form_input('anggaran_perbaikan'); ?> &nbsp;Rupiah</td>
  </tr>
  <tr>
    <td> Kapasitas Lahan </td>
    <td> <?php echo form_input('kapasitas_lahan'); ?> &nbsp;Meter Persegi</td>
  </tr>
  <tr>
    <td> Jarak Sekolah Lain </td>
    <td> <?php echo form_input('jarak_sekolah_lain'); ?>&nbsp; Meter </td>
  </tr>
  <tr>
    <td> Jumlah Guru </td>
    <td> <?php echo form_input('jumlah_guru'); ?>&nbsp;Orang </td>
  </tr>
  <tr>
    <td> Jumlah Siswa </td>
    <td> <?php echo form_input('jumlah_siswa'); ?>&nbsp;Orang </td>
  </tr>
  <tr>
    <td> Pertumbuhan Murid </td>
    <td> <?php echo form_input('pertumbuhan_murid'); ?> Murid </td>
  </tr>
  <tr>
 <td> <?php echo form_submit('submit', 'Simpan'); ?> </td>
  <!-- <td><a href="<?php echo base_url();?>dashboard/data_sekolah" class="btn btn-default">Back</a></td>
    -->                
    
  


  </table>
    </div>
		
</div>
        </section>
    </section>


<?php $this->load->view('element/js'); ?>