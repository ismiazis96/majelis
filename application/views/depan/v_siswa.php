<!DOCTYPE html>
<html lang="en">

<head>
<?php $this->load->view('depan/layout/v_css'); ?>
</head>

<body>
  <!--============================= HEADER =============================-->
  <?php $this->load->view('depan/layout/v_topbar'); ?>

    <!-- NAVBAR -->
<?php $this->load->view('depan/layout/v_navbar'); ?>
    <section>
</section>
<!--//END HEADER -->

    <section class="our-teachers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-5"><?php echo $heading; ?></h2>
                </div>
            </div>
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <?php foreach ($data->result() as $row) : ?>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="admission_insruction">
                          <?php if(empty($row->siswa_photo)):?>
                            <img src="<?php echo base_url().'assets/images/blank.png';?>" class="img-fluid" alt="#">
                          <?php else:?>
                            <img src="<?php echo base_url().'assets/images/'.$row->siswa_photo;?>" class="img-fluid" alt="#">
                          <?php endif;?>
                            <p class="text-center mt-3"><span><?php echo $row->siswa_nama;?></span>
                                <br>
                                <?php echo $row->kelas_nama;?></p>
                        </div>
                    </div>
                <?php endforeach;?>
              </div>
            <!-- End row -->
            <nav><?php echo $page;?></nav>
        </div>
    </section>

    <!--//End Style 2 -->
<!--============================= FOOTER =============================-->
    <?php 
    $this->load->view('depan/layout/v_footer');
     ?>
    <!--//END FOOTER -->
    <!-- jQuery, Bootstrap JS. -->
    <?php $this->load->view('depan/layout/v_js'); ?>
</body>

</html>
