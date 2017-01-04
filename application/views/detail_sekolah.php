<?php $this->load->view('element/head'); ?>
<?php $this->load->view('element/header'); ?>
<?php $this->load->view('element/sidebar'); ?>
<?php $this->load->view ('element/tambahan') ?>

	<section id="main-content">
          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" align="center"></i>Detail Sekolah</h3>
                </div>
            </div>
           <div class="row">
                      <div class="col-md-6">
                          <table class="table table-bordered">
                            <tr>
                              <td> Nama Sekolah </td> <td> : </td> <td> <strong> <?=$identitas_sekolah['nama_sekolah']; ?> </strong></td>
                            </tr>
                            <tr>
                              <td> Alamat Sekolah </td> <td> : </td> <td> <?=$identitas_sekolah['alamat_sekolah'];?> </td>
                            </tr>
                            <tr>
                              <td> Tingkat Kerusakan </td> <td> : </td> <td> <?=$identitas_sekolah['tingkat_kerusakan'];?>&nbsp; % </td>
                            </tr>
                            <tr>
                              <td> Lama Rusak </td> <td> : </td> <td> <?=$identitas_sekolah['lama_rusak'];?>&nbsp;Bulan </td>
                            </tr>
                            <tr>
                              <td> Kapasitas Sekolah </td> <td> : </td> <td> <?=$identitas_sekolah['kapasitas_sekolah'];?>&nbsp; % </td>
                            </tr>
                            <tr>
                              <td> Intensitas Perbaikan </td> <td> : </td> <td> <?=$identitas_sekolah['intensitas_perbaikan'];?> &nbsp; kali</td>
                            </tr>
                            <tr>
                              <td> Anggaran Perbaikan </td> <td> : </td> <td> <?=$identitas_sekolah['anggaran_perbaikan'];?> &nbsp;Rupiah</td>
                            </tr>
                         
                            <tr>
                              <td> Kapasitas Lahan </td> <td> : </td> <td> <?=$identitas_sekolah['kapasitas_lahan'];?> &nbsp;%</td>
                            </tr>
                            <tr>
                              <td> Jarak Sekolah Lain </td> <td> : </td> <td> <?=$identitas_sekolah['jarak_sekolah_lain'];?> &nbsp; Meter </td>
                            </tr>
                            <tr>
                              <td> Jumlah Guru </td> <td> : </td> <td> <?=$identitas_sekolah['jumlah_guru'];?> &nbsp;Orang</td>
                            </tr>
                            <tr>
                              <td> Jumlah Siswa </td> <td> : </td> <td> <?=$identitas_sekolah['jumlah_siswa'];?>&nbsp;Siswa </td>
                            </tr>
                            <tr>
                              <td> Pertumbuhan Murid </td> <td> : </td> <td> <?=$identitas_sekolah['pertumbuhan_murid'];?>&nbsp; Murid</td>
                            </tr>
                            
                          </table>
                          <a href="<?php echo base_url();?>dashboard/data_sekolah" class="btn btn-primary">Back</a>
                    
           
        </section>
    </section>

<?php $this->load->view('element/js'); ?>