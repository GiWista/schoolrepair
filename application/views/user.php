<?php $this->load->view('element/head'); ?>
<?php $this->load->view('element/header'); ?>
<?php $this->load->view('element/sidebar'); ?>
<?php $this->load->view ('element/tambahan') ?>

	<section id="main-content">
          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" align="center"></i>Input User</h3>
                </div>
            </div>
            <div class="input col-lg-12">
            <?php echo form_open('dashboard/tambah_sekolah'); ?>
  <table class="table table-hover">
   <tr>
    <td> User Name </td>
    <td> <?php echo form_input('id_sekolah'); ?> </td>
  </tr> 
  <tr>
    <td> Password </td>
    <td> <?php echo form_input('nama_sekolah'); ?> </td>
  </tr>
  <tr>
    <td> Level </td>
    <td> <?php echo form_input('alamat_sekolah'); ?> </td>
  </tr>
  
  <tr>
  <td> <?php echo form_submit('submit', 'Tambah'); ?> </td>
  <td><a href="<?php echo base_url();?>dashboard/data_sekolah" class="btn btn-default">Back</a></td>
                    
    
  </tr>


  </table>
    </div>
		
</div>
        </section>
    </section>


<?php $this->load->view('element/js'); ?>