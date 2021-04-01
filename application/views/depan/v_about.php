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
<!--//END ABOUT IMAGE -->
<!--============================= WELCOME TITLE =============================-->
<section class="welcome_about">
    <div class="container">
        <div class="row">
            <div class="col-md-7" data-aos="fade-right"
              data-aos-delay="100">
                <h2>Kata Sambutan</h2>
               <?php echo $about_desc; ?>
                </div>
                <div class="col-md-5" data-aos="fade-left"
              data-aos-delay="100">
                    <img src="<?php echo base_url().'assets/images/'.$about_img; ?>" class="img-fluid" alt="#" width="201px" height="183px">
                </div>
            </div>
        </div>
    </section>
    <!--//END WELCOME TITLE -->
    <!--============================= TESTIMONIAL =============================-->
    <section class="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Testimonial</h2>
                </div>
                <div class="col-md-12">
                    <div class="single-item">
                        <?php foreach ($testimonial->result() as $row): ?>
                        <div class="quote">
                            <i class="fa fa-quote-left" aria-hidden="true"></i>                   
                            <p class="quote_text"><?php echo $row->testimonial_content;?>.</p>
                            <div class="testi-img_block">
                        <?php if(empty($row->testimonial_image)):?>
                            <img width="40" height="40" src="<?php echo base_url().'theme/images/testimonial/user_blank.png';?>" alt="">
                        <?php else: ?>
                            <img src="<?php echo base_url().'theme/images/testimonial/'.$row->testimonial_image;?>" class="img-fluid" alt="#">
                        <?php endif;?>       
                            <p><span><?php echo $row->testimonial_name; ?></span><?php echo $row->testimonial_status;?></p>
                            </div>    
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!--//END TESTIMONIAL -->
    <!--============================= DETAILED CHART =============================-->
    <div class="detailed_chart">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom">
                    <div class="chart-img">
                        <img src="<?php echo base_url().'theme/images/chart-icon_1.png'?>" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter"><?php echo $tot_guru;?></span> Guru
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom chart_top">
                    <div class="chart-img">
                        <img src="<?php echo base_url().'theme/images/chart-icon_2.png'?>" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter"><?php echo $tot_siswa;?></span> Anggota
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 chart_top">
                    <div class="chart-img">
                        <img src="<?php echo base_url().'theme/images/chart-icon_3.png'?>" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter"><?php echo $tot_files;?></span> Download
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="chart-img">
                        <img src="<?php echo base_url().'theme/images/chart-icon_4.png'?>" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter"><?php echo $tot_agenda;?></span> Agenda</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//END DETAILED CHART -->

        <!--============================= FOOTER =============================-->
        <?php 
        $this->load->view('depan/layout/v_footer');
         ?>
                <!--//END FOOTER -->
                <!-- jQuery, Bootstrap JS. -->
                <?php $this->load->view('depan/layout/v_js'); ?>
            </body>

            </html>
