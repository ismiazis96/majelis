<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('depan/layout/v_css'); ?>
    <?php
    function limit_words($string, $word_limit)
    {
        $words = explode(" ", $string);
        return implode(" ", array_splice($words, 0, $word_limit));
    }
    ?>
</head>

<body>
    <!--============================= HEADER =============================-->
    <!-- TOPBAR -->
    <?php $this->load->view('depan/layout/v_topbar'); ?>

    <!-- NAVBAR -->
    <?php $this->load->view('depan/layout/v_navbar'); ?>

    <section>
        <!-- Banner -->
        <div class="slider_img layout_two">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    $heading = $this->m_heading->get_heading_data()->result_array();
                    foreach ($heading as $key => $value) {
                        $active = ($key == 0) ? 'active' : '';
                        echo '<li data-target="#carousel" data-slide-to="' . $key . '" class="' . $active . '"></li>';
                    }
                    ?>

                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php
                    foreach ($heading as $key => $value) {
                        $active = ($key == 0) ? 'active' : '';
                        echo '<div class="carousel-item ' . $active . '">
                    <img style="opacity:0.5; =" class="d-block" src="' . base_url() . 'theme/images/banner/' . $value['heading_image'] . '">
                    <div class="carousel-caption d-md-block">
                        <div class="slider_title" data-aos="fade-up" data-aos-delay="100">
                            <h1>' . $value['heading_judul'] . '</h1>
                            <h4>' . $value['heading_description'] . '</h4>
                        </div>
                    </div>
                </div>';
                    }
                    ?>
                </div>

                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <i class="icon-arrow-left fa-slider" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <i class="icon-arrow-right fa-slider" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </section>
    <!--//END HEADER -->
    <!--============================= ABOUT =============================-->
    <section class="clearfix about about-style2">
        <div class="container">
            <div class="row">
                <div class="col-md-8" data-aos="fade-right" data-aos-delay="100">
                    <h2>Welcome</h2>
                    <p>Kami Menyambut baik terbitnya Website Majelis Ta'lim yang baru, dengan harapan dipublikasinya website ini kami berharap : Peningkatan layanan Informasi kepada anggota kami sendiri, para orangtua, dan masyarakat pada umumnya semakin meningkat.</p>
                </div>
                <div class="col-md-4" data-aos="fade-left" data-aos-delay="100">
                    <img src="<?php echo base_url() . 'theme/images/welcome_1.svg' ?>" class="img-fluid about-img" alt="#">
                </div>
            </div>
        </div>
    </section>
    <!--//END ABOUT -->
    <!--============================= OUR COURSES =============================-->
    <section class="our_courses">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Artikel Terbaru</h2>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <?php foreach ($berita->result() as $row) : ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="courses_box mb-4">
                            <div class="course-img-wrap">
                                <img src="<?php echo base_url() . 'assets/images/' . $row->tulisan_gambar; ?>" class="img-fluid" alt="courses-img">
                            </div>
                            <!-- // end .course-img-wrap -->
                            <a href="<?php echo site_url('artikel/' . $row->tulisan_slug); ?>" class="course-box-content">
                                <h3 style="text-align:center;"><?php echo $row->tulisan_judul; ?></h3>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div> <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="<?php echo site_url('artikel'); ?>" class="btn btn-default btn-courses">View More</a>
                </div>
            </div>
        </div>
    </section>
    <!--//END OUR COURSES -->
    <!--============================= EVENTS =============================-->
    <section class="event">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <div class="event-img2">
                        <?php foreach ($pengumuman->result() as $row) : ?>
                            <div class="row">
                                <div class="col-sm-3"> <img src="<?php echo base_url() . 'theme/images/announcement-icon.png' ?>" class="img-fluid" alt="event-img"></div><!-- // end .col-sm-3 -->
                                <div class="col-sm-9">
                                    <h3><a href="<?php echo site_url('pengumuman'); ?>"><?php echo $row->pengumuman_judul; ?></a></h3>
                                    <span><?php echo $row->tanggal; ?></span>
                                    <p><?php echo limit_words($row->pengumuman_deskripsi, 10) . '...'; ?></p>

                                </div><!-- // end .col-sm-7 -->
                            </div><!-- // end .row -->
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
                    <div class="row">
                        <div class="col-md-12">
                            <?php foreach ($agenda->result() as $row) : ?>
                                <div class="event_date">
                                    <div class="event-date-wrap">
                                        <p><?php echo date("d", strtotime($row->agenda_mulai)); ?></p>
                                        <span><?php echo date("M. y", strtotime($row->agenda_mulai)); ?></span>
                                    </div>
                                </div>
                                <div class="date-description">
                                    <h3><a href="<?php echo site_url('agenda'); ?>"><?php echo $row->agenda_nama; ?></a></h3>
                                    <p><?php echo limit_words($row->agenda_deskripsi, 10) . '...'; ?></p>
                                    <hr class="event_line">
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--============================= TESTIMONIAL =============================-->
    <section class="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Testimonial</h2>
                </div>
                <div class="col-md-12">
                    <div class="single-item">
                        <?php foreach ($testimonial->result() as $row) : ?>
                            <div class="quote">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                                <p class="quote_text"><?php echo $row->testimonial_content; ?>.</p>
                                <div class="testi-img_block">
                                    <?php if (empty($row->testimonial_image)) : ?>
                                        <img width="40" height="40" src="<?php echo base_url() . 'theme/images/testimonial/user_blank.png'; ?>" alt="">
                                    <?php else : ?>
                                        <img src="<?php echo base_url() . 'theme/images/testimonial/' . $row->testimonial_image; ?>" class="img-fluid" alt="#">
                                    <?php endif; ?>
                                    <p><span><?php echo $row->testimonial_name; ?></span><?php echo $row->testimonial_status; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--//END TESTIMONIAL -->

    <!--//END EVENTS -->
    <!--============================= DETAILED CHART =============================-->
    <div class="detailed_chart">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 chart_bottom">
                    <div class="chart-img">
                        <img src="<?php echo base_url() . 'theme/images/chart-icon_1.png' ?>" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter"><?php echo $tot_guru; ?></span> Guru
                        </p>
                    </div>
                </div>
                <!-- <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom chart_top">
                <div class="chart-img">
                    <img src="<?php echo base_url() . 'theme/images/chart-icon_2.png' ?>" class="img-fluid" alt="chart_icon">
                </div>
                <div class="chart-text">
                    <p><span class="counter"><?php echo $tot_siswa; ?></span> Anggota
                    </p>
                </div>
            </div> -->
                <div class="col-xs-12 col-sm-6 col-md-4 chart_top">
                    <div class="chart-img">
                        <img src="<?php echo base_url() . 'theme/images/chart-icon_3.png' ?>" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter"><?php echo $tot_files; ?></span> Download
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="chart-img">
                        <img src="<?php echo base_url() . 'theme/images/chart-icon_4.png' ?>" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter"><?php echo $tot_agenda; ?></span> Agenda</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <!--//END DETAILED CHART -->
    <!--============================= FOOTER =============================-->
    <?php $this->load->view('depan/layout/v_footer'); ?>
    <!--//END FOOTER -->
    <!-- jQuery, Bootstrap JS. -->
    <?php $this->load->view('depan/layout/v_js'); ?>
</body>

</html>