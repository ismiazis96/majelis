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
  <!--============================= Gallery =============================-->
  <div class="gallery-wrap">
    <div class="container">
<!-- Style 2 -->
<div class="row">
  <div class="col-md-12">
    <h3 class="gallery-style"><?php echo $heading; ?></h3>
  </div>
</div><br>
<div class="row">
  <div class="col-md-12">
    <div id="gallery">
      <div id="gallery-content">
        <div id="gallery-content-center">
          <?php foreach ($all_galeri->result() as $row) : ?>
            <a href="<?php echo base_url().'assets/images/'.$row->galeri_gambar;?>" class="image-link2">
             <img src="<?php echo base_url().'assets/images/'.$row->galeri_gambar;?>" class="all img-fluid" alt="#" />
            </a>
          <?php endforeach;?>
       </div>
     </div>
   </div>
 </div>
</div>
<!--//End Style 2 -->

</div>
</div>
<!--//End Gallery -->
<!--============================= FOOTER =============================-->
    <?php $this->load->view('depan/layout/v_footer'); ?>
    <!--//END FOOTER -->
    <!-- jQuery, Bootstrap JS. -->
    <?php $this->load->view('depan/layout/v_js'); ?>

  </body>

  </html>
