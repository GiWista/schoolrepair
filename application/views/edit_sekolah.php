<?php $this->load->view('element/head'); ?>
<?php $this->load->view('element/header'); ?>
<?php $this->load->view('element/sidebar'); ?>
<?php $this->load->view ('element/tambahan') ?>

	<section id="main-content">
          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" align="center"></i>Data Sekolah</h3>
                </div>
            </div>
           
            <?php foreach ($identitas_sekolah as $u) { ?>
            <form action="<?php echo base_url(). 'dashboard/update'; ?>" method="post">

            <table class="table table-hover table-bordered">
             <tr>
          <td width="70px">Nama Sekolah</td>
       
        <td>
        <input type="hidden" name="id_sekolah" value="<?php echo $u->id_sekolah ?>" size="30" />
        <input type="text" name="nama_sekolah" value="<?php echo $u->nama_sekolah ?>"size="30" /></td>
          </tr>
          <tr>
        <td>Alamat Sekolah</td>
        <td><input type="text" name="alamat_sekolah" value="<?php echo $u->alamat_sekolah ?>" size="30" /></td>
         </tr>
         <td>Tingkat Kerusakan</td>
        <td><input type="text" name="tingkat_kerusakan" value="<?php echo $u->tingkat_kerusakan ?>" size="30" />&nbsp;%</td>
         </tr>

         <td>Lama Rusak</td>
        <td><input type="text" name="lama_rusak" value="<?php echo $u->lama_rusak ?>" size="30" /> &nbsp;Bulan</td>
         </tr>
         <td>Kapasitas Sekolah</td>
        <td><input type="text" name="kapasitas_sekolah" value="<?php echo $u->kapasitas_sekolah ?>" size="30" />&nbsp;%</td>
         </tr>
         <td>Intensitas Perbaikan</td>
        <td><input type="text" name="intensitas_perbaikan" value="<?php echo $u->intensitas_perbaikan ?>" size="30" />&nbsp;kali</td>
         </tr>
         <td>Angaran Perbaikan</td>
        <td><input type="text" name="anggaran_perbaikan" value="<?php echo $u->anggaran_perbaikan ?>" size="30" />&nbsp;rupiah</td>
         </tr>
         <td>Kapasitas Lahan</td>
        <td><input type="text" name="kapasitas_lahan" value="<?php echo $u->kapasitas_lahan ?>" size="30" />&nbsp;Meter Persegi</td>
         </tr>
         <td>Jarak Sekolah Lain</td>
        <td><input type="text" name="jarak_sekolah_lain" value="<?php echo $u->jarak_sekolah_lain ?>" size="30" />&nbsp;Meter</td>
         </tr>
         
         <td>Jumlah Guru</td>
        <td><input type="text" name="jumlah_guru" value="<?php echo $u->jumlah_guru ?>" size="30" />&nbsp;Orang</td>
         </tr>
         <td>Jumlah Siswa</td>
        <td><input type="text" name="jumlah_siswa" value="<?php echo $u->jumlah_siswa ?>" size="30" />&nbsp;Orang</td>
         </tr>
         <td>Pertumbuhan Murid</td>
        <td><input type="text" name="pertumbuhan_murid" value="<?php echo $u->pertumbuhan_murid ?>" size="30" />&nbsp;Murid</td>
         </tr>
         
         <?php } ?>

    </table>
    <br></br>
    <table>
        <tr><button type="submit" value="Simpan" class="btn btn-success">Simpan</button></tr>&nbsp;
        <button type="cancel" value="Cancel" class="btn btn-danger">Batal</button>

        </table>

        </section>
    </section>

<?php $this->load->view('element/js'); ?>