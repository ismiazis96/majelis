<!--Counter Inbox-->
<?php
$query = $this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
$query2 = $this->db->query("SELECT * FROM tbl_komentar WHERE komentar_status='0'");
$jum_comment = $query2->num_rows();
$jum_pesan = $query->num_rows();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <?php $this->load->view('admin/v_head'); ?>

</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view('admin/v_header'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('admin/v_sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Data Heading
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Heading</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">

              <div class="box">
                <div class="box-header">
                  <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add Heading</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-striped" style="font-size:13px;">
                    <thead>
                      <tr>
                        <th>Photo</th>
                        <th>Judul</th>
                        <th>Description</th>
                        <th style="text-align:right;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 0;
                      foreach ($data->result_array() as $i) :
                        $no++;
                        $id    = $i['heading_id'];
                        $judul = $i['heading_judul'];
                        $desc  = $i['heading_description'];
                        $photo = $i['heading_image'];

                      ?>
                        <tr>
                          <?php if (empty($photo)) : ?>
                            <td><img width="40" height="40" class="img-circle" src="<?php echo base_url() . 'theme/images/banner/user_blank.png'; ?>"></td>
                          <?php else : ?>
                            <td><img src="<?php echo base_url() . 'theme/images/banner/' . $photo; ?>" style="width:100px;"></td>
                          <?php endif; ?>

                          <td><?php echo $judul; ?></td>
                          <td><?php echo $desc; ?></td>

                          <td style="text-align:right;">
                            <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>"><span class="fa fa-pencil"></span></a>
                            <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>"><span class="fa fa-trash"></span></a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
    $this->load->view('admin/v_footer');
    ?>

    <!--Modal Add Pengguna-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Add Heading</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'admin/heading/simpan_heading' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                <div class="col-sm-7">
                  <input type="text" name="judul" class="form-control" id="inputUserName" placeholder="masukan judul" required>
                </div>
              </div>

              <div class="form-group">
                <label for="desc" class="col-sm-4 control-label">Desciption</label>
                <div class="col-sm-7">
                  <!-- <input type="text" name="desc" class="form-control" id="inputUserName" placeholder="desc" required> -->
                  <textarea id="desc" name="desc" class="form-control" placeholder="Isi Deskripsi"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                <div class="col-sm-7">
                  <input type="file" name="photo" />
                </div>
              </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!--Modal Edit Album-->
    <?php foreach ($data->result_array() as $i) :
      $id = $i['heading_id'];
      $judul = $i['heading_judul'];
      $desc = $i['heading_description'];
      $photo = $i['heading_image'];
    ?>

      <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Edit Heading</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'admin/heading/update_heading' ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                <input type="hidden" value="<?php echo $photo; ?>" name="gambar">
                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                  <div class="col-sm-7">
                    <input type="text" name="judul" value="<?php echo $judul; ?>" class="form-control" id="inputUserName" placeholder="Judul" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="desc" class="col-sm-4 control-label">Desc</label>
                  <div class="col-sm-7">
                    <!-- <input type="text" name="desc" value="<?php echo $desc; ?>" class="form-control" id="inputUserName" placeholder="Desciption" required> -->
                    <textarea id="desc" name="desc" class="form-control" placeholder="Isi Deskripsi"><?= htmlspecialchars($desc); ?></textarea>

                  </div>
                </div>

                <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                  <div class="col-sm-7">
                    <input type="file" name="photo" />
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <!--Modal Edit Album-->

    <?php foreach ($data->result_array() as $i) :
      $id = $i['heading_id'];
      $judul = $i['heading_judul'];
      $desc = $i['heading_description'];
      $photo = $i['heading_image'];
    ?>
      <!--Modal Hapus Pengguna-->
      <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Hapus Heading</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url() . 'admin/heading/hapus_heading' ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                <input type="hidden" value="<?php echo $photo; ?>" name="gambar">
                <p>Apakah Anda yakin mau menghapus heading <b><?php echo $judul; ?></b> ?</p>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>




    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url() . 'assets/plugins/jQuery/jquery-2.2.3.min.js' ?>"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url() . 'assets/bootstrap/js/bootstrap.min.js' ?>"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url() . 'assets/plugins/datatables/jquery.dataTables.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/plugins/datatables/dataTables.bootstrap.min.js' ?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url() . 'assets/plugins/slimScroll/jquery.slimscroll.min.js' ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() . 'assets/plugins/fastclick/fastclick.js' ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() . 'assets/dist/js/app.min.js' ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url() . 'assets/dist/js/demo.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/toast/jquery.toast.min.js' ?>"></script>
    <!-- page script -->
    <script>
      $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <?php if ($this->session->flashdata('msg') == 'error') : ?>
      <script type="text/javascript">
        $.toast({
          heading: 'Error',
          text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
          showHideTransition: 'slide',
          icon: 'error',
          hideAfter: false,
          position: 'bottom-right',
          bgColor: '#FF4859'
        });
      </script>

    <?php elseif ($this->session->flashdata('msg') == 'success') : ?>
      <script type="text/javascript">
        $.toast({
          heading: 'Success',
          text: "Guru Berhasil disimpan ke database.",
          showHideTransition: 'slide',
          icon: 'success',
          hideAfter: false,
          position: 'bottom-right',
          bgColor: '#7EC857'
        });
      </script>
    <?php elseif ($this->session->flashdata('msg') == 'info') : ?>
      <script type="text/javascript">
        $.toast({
          heading: 'Info',
          text: "Guru berhasil di update",
          showHideTransition: 'slide',
          icon: 'info',
          hideAfter: false,
          position: 'bottom-right',
          bgColor: '#00C9E6'
        });
      </script>
    <?php elseif ($this->session->flashdata('msg') == 'success-hapus') : ?>
      <script type="text/javascript">
        $.toast({
          heading: 'Success',
          text: "Guru Berhasil dihapus.",
          showHideTransition: 'slide',
          icon: 'success',
          hideAfter: false,
          position: 'bottom-right',
          bgColor: '#7EC857'
        });
      </script>
    <?php else : ?>

    <?php endif; ?>
</body>

</html>