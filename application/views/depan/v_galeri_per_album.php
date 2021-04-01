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
          <h3 class="gallery-style"><?php echo $album; ?></h3>
        </div>
      </div>
<br>
<div class="row">
  <div class="col-md-3">
    <?php $b = $data->row_array(); ?>
    <div class="categorydiv">
      <ul>
        <li><a class="selected" href="<?= base_url().'galeri' ?>" style="font-size: 12px;">Semua</a></li>
          <?php 
            foreach ($alb->result_array() as $i) {
               $alb_id=$i['album_id'];
               $alb_nama=$i['album_nama'];       
          ?>
                <?php if($b['galeri_album_id']== $alb_id): ?>
                  <li><a href="<?php echo base_url().'galeri/album'. $alb_id;?>" class="selected" style="font-size: 12px;"><?php echo $alb_nama; ?></a></li>
                  <?php else: ?>
                  <li><a href="<?php echo base_url().'galeri/album/'.$alb_id;?>" style="font-size: 12px;"><?php echo $alb_nama;?></a></li>
                <?php endif;?>
                <?php } ?>
      </ul>
    </div>
  </div>
  <div class="col-md-9">
    <div id="gallery">
      <div id="gallery-content">
        <div id="gallery-content-center">
          <?php foreach ($data->result() as $row) : ?>
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
