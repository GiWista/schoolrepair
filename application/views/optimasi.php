<?php $this->load->view('element/head'); ?>
<?php $this->load->view('element/header'); ?>
<?php $this->load->view('element/sidebar'); ?>
<?php $this->load->view('element/tambahan'); ?>

  <section id="main-content">
          <section class="wrapper">
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" align="center"></i>Optimasi</h3>
                </div>
            </div>
            <div class="col-sm-10">
            <h1> </h1>

              <?php if(isset($_SESSION['percobaan'])){?>

                <!--Anda sudah melakukan <?=$_SESSION['percobaan'];?> kali percobaan,ha -->
               <h4> Anda telah melakukan proses optimasi,silahkan klik tombol reset untuk melakukan optimasi kembali </h4>
                <br>
                <a type="button" class="btn btn-danger" href="<?php echo base_url();?>optimasi/reset" id="resetoptimasi"> Reset Optimasi </a>
                <a type="button" class="btn btn-info" href="<?php echo base_url();?>report"> Hasil </a>
                <?php }else{ ?>

                
                <div class="col-lg-6">
                  <h3 align="center" > Silahkan Masukan Jumlah Optimasi </h3>
                  <input type="text" name="optimasikali" id="nilaioptimasi" class="form-control" /> <br>
                  <button type="button" class="btn btn-primary" id="optimasiwoy"> Proses </button>
                </div>

                <div class="clearfix"> </div>
                <?php } ?>
                <div id="loading_optimasi"> </div>
                <div id="hasil_optimasi"> </div>
              </div>
              

             
             <script>
              $(document).ready(function(){
                $("#optimasiwoy").click(function(){
                    var nilaiopt = $("#nilaioptimasi").val();
                  $.ajax({
                    type:"POST",
                    data:"nilai="+nilaiopt,
                    //data: { nilai: nilaiopt },
                    url:"<?php echo base_url()?>optimasi/newopt",
                    beforeSend:function(){
                      $("#loading_optimasi").show();
                      $("#optimasiwoy").hide();
                      $("#loading_optimasi").html("<img src='<?php echo base_url();?>assets/ring-alt.gif'>");

                    },success:function(dt){
                      $("#loading_optimasi").hide();
                      $("#hasil_optimasi").html(dt);
                      

                    }
                  })
              });
          });

             </script>
              
          </div>
        </section>
    </section>

<?php $this->load->view('element/js'); ?>

