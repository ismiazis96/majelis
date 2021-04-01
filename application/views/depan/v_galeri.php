<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('depan/layout/v_css'); ?>
</head>

<body>
  <!--============================= HEADER =============================-->
 <?php 
$this->load->view('depan/layout/v_topbar');
 ?>
 
     <!-- NAVBAR -->
<?php 
$this->load->view('depan/layout/v_navbar');
 ?>
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
      <div class="col-md-4">
          <div class="categorydiv">
            <ul>
              <li><a class="selected" href="#" style="font-size: 12px;">Semua</a></li>
                <?php 
                  foreach ($alb->result_array() as $i) {
                           $alb_id=$i['album_id'];
                           $alb_nama=$i['album_nama'];       
                            ?>
                            <li><a href="<?php echo base_url().'galeri/album/'.$alb_id;?>" style="font-size: 12px;"><?php echo $alb_nama;?></a></li>
                  <?php } ?>    
            </ul>
          </div>
        </div>
    <!-- </div> --> 

<!-- <div class="row"> -->
  <div class="col-md-8">
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
    <?php 
    $this->load->view('depan/layout/v_footer');
     ?>
    <!--//END FOOTER -->
    <!-- jQuery, Bootstrap JS. -->
    <?php $this->load->view('depan/layout/v_js'); ?>

  </body>

  </html>
