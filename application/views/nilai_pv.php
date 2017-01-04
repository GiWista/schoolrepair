<?php $this->load->view('element/head'); ?>
<?php $this->load->view('element/header'); ?>
<?php $this->load->view('element/sidebar'); ?>
<?php $this->load->view ('element/tambahan') ?>

	<section id="main-content">
          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" align="center"></i>Nilai Parameter</h3>
                </div>
            </div>
            <div class="col-sm-10">
            <table id="dataTable" class="table table-striped table-bordered " >
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Sekolah</th>
                <th>Alamat </th>
                <th>P1</th>
                <th>P2</th>
                <th>P3</th>
                <th>P4</th>
                <th>P5</th>
                <th>P6</th>
                <th>P7</th>
                <th>P8</th>
                <th>P9</th>
                <th>10</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach ($school ->result() as $row):?>
                
                <tr>
                  <td><?php echo($row->id_sekolah);?></td>
                  <td><?php echo($row->nama_sekolah);?></td>
                  <td><?php echo($row->alamat_sekolah);?></td>
                  <td><?php echo ($row->tingkat_kerusakan);?></td>
                  <td><?php echo($row->lama_rusak);?></td>
                  <td><?php echo($row->kapasitas_sekolah);?></td>
                  <td><?php echo($row->intensitas_perbaikan);?></td>
                  <td><?php echo($row->anggaran_perbaikan);?></td>
                  <td><?php echo($row->kapasitas_lahan);?></td>
                  <td><?php echo($row->jarak_sekolah_lain);?></td>
                  <td><?php echo($row->jumlah_guru);?></td>
                  <td><?php echo($row->jumlah_siswa);?></td>
                  <td><?php echo($row->pertumbuhan_murid);?></td>
                </tr>
              
                  <!--<td><a href= '<?=base_url();?>dashboard/detail_sekolah/<?=$row->id_sekolah;?>' class="btn btn-primary btn-sm">Detail</a>
                    &nbsp;
                    <!-- <?php echo anchor('dashboard/edit_sekolah/'.$row->id_sekolah,"Edit");?>
                    <a href='<?=base_url();?>dashboard/edit_sekolah/<?=$row->id_sekolah;?>' class="btn btn-warning btn-sm">Edit</a>
                    &nbsp;<a href="<?=base_url();?>dashboard/delete_sekolah/<?=$row->id_sekolah;?>" class="btn btn-danger btn-sm">Delete</a></td>
                </tr> -->
              <?php endforeach; ?>
              </tbody>
             <!-- <div class="btn-group btn-group-sm">
             <a type="button" class="btn btn-success" href="<?php echo base_url()?>dashboard/tambah_sekolah">Tambah Sekolah</a></div></p>
              -->
            </table>
          </div>
          <br />
          <br />
          <br />

        </section>
    </section>

<?php $this->load->view('element/js'); ?>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
      $('#dataTable').dataTable();
    } );
  </script>