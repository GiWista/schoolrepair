<?php $this->load->view('element/head'); ?>
<?php $this->load->view('element/header'); ?>
<?php $this->load->view('element/sidebar'); ?>
<?php $this->load->view ('element/tambahan') ?>

 <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/datatables.bootstrap.min.css"/>
	<section id="main-content">
          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" align="center"></i>Data Sekolah</h3>
                </div>
            </div>
            <div class="col-sm-8">
            <table id="datasekolah" class="table table-striped table-bordered " >
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Sekolah</th>
                <th>Alamat </th>
                <th>Aksi </th>
              </tr>
            </thead>

                <tbody>
              <?php 
                foreach ($school ->result() as $row):?>
                <tr>
                  <td><?php echo($row->id_sekolah);?></td>
                  <td><?php echo($row->nama_sekolah);?></td>
                  <td><?php echo($row->alamat_sekolah);?></td>
                  <td><a href= '<?=base_url();?>dashboard/detail_sekolah/<?=$row->id_sekolah;?>' class="btn btn-primary btn-sm">Detail</a>
                    &nbsp;
                    <!-- <?php echo anchor('dashboard/edit_sekolah/'.$row->id_sekolah,"Edit");?> -->
                    <a href='<?=base_url();?>dashboard/edit_sekolah/<?=$row->id_sekolah;?>' class="btn btn-warning btn-sm">Edit</a>
                    &nbsp;<a href="<?=base_url();?>dashboard/delete_sekolah/<?=$row->id_sekolah;?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini ? ')">Delete</a></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
              <div class="btn-group btn-group-sm">
             <a type="button" class="btn btn-success" href="<?php echo base_url()?>dashboard/tambah_sekolah">Tambah Sekolah</a></div></p>

            </table>
          </div>
        </section>
    </section>
    <script src="<?=base_url();?>assets/js/jquery.datatables.min.js"></script>
<script src="<?=base_url();?>assets/js/datatables.bootstrap.min.js"></script>


<?php $this->load->view('element/js'); ?>
<script>
  $(document).ready(function(){
   $("#datasekolah").DataTable();
 });
</script>