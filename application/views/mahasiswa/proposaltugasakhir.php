<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
     
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sistem Pemantauan Tugas Akhir</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs"><?php echo("{$_SESSION['logged_in']['username']}"."<br />");?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php echo("{$_SESSION['logged_in']['username']}"."<br />");?>
              </li>
            
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>Mahasiswa/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo("{$_SESSION['logged_in']['username']}"."<br />");?></p>
        
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        <li>
          <a href="pages/widgets.html">
            <i class=""></i> <a href="<?php echo base_url(); ?>Mahasiswa/dashboard" > <span>Dashboard</span></a>
            
          </a>
        </li>

         <li>
          <a href="pages/widgets.html">
            <i class=""></i><a href="<?php echo base_url(); ?>Mahasiswa/jadwalinformasi" ><span>Jadwal & Informasi</span></a>
            
          </a>
        </li>

         <li>
          <a href="pages/widgets.html">
            <i class=""></i><a href="<?php echo base_url(); ?>Mahasiswa/proposaltugasakhir" > <span>Proposal Tugas Akhir</span></a>
            
          </a>
        </li>

         <li>
          <a href="pages/widgets.html">
            <i class=""></i><a href="<?php echo base_url(); ?>Mahasiswa/laporanprogress" > <span>Laporan Progress</span></a>
            
          </a>
        </li>

       
          </ul>
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <?php
                echo "<div class='error_msg'>";
                if (isset($error_message)) {
                  echo $error_message;
                }
                  echo validation_errors();
                  echo "</div>";
                ?>
          <h1 align="center">Seminar Proposal</h1>
           <?php foreach($data->result() as $row):?>
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
              <div class="col-sm-10">
                  <label for="inputEmail3" class=" control-label"><?php echo $row->judul_tugas_akhir;?></label>
              </div>
          </div>

          <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Pembimbing I</label>
              <?php if ($row->status_proposal_pembimbing_1 === '0'): ?>

                <div class="col-sm-10">
                  <label for="inputEmail3" class="col-sm-2 control-label">Belum Bimbingan</label>
                </div>

              <?php elseif ($row->status_proposal_pembimbing_1 === '1'): ?>

                       <div class="col-sm-10">
                  <label for="inputEmail3" class="col-sm-2 control-label">Acc Judul</label>
                </div>
              <?php elseif ($row->status_proposal_pembimbing_1 === '2'): ?>

                       <div class="col-sm-10">
                  <label for="inputEmail3" class="col-sm-2 control-label">Acc Proposal</label>
                </div>
              <?php elseif ($row->status_proposal_pembimbing_1 === '3'): ?>

                       <div class="col-sm-10">
                  <label for="inputEmail3" class="col-sm-2 control-label">Rekomendasi Seminar Proposal</label>
                </div>


              <?php endif; ?>
              
          </div>

          <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Pembimbing II</label>
                <?php if ($row->status_proposal_pembimbing_2 === '0'): ?>

                <div class="col-sm-10">
                  <label for="inputEmail3" class="col-sm-2 control-label">Belum Bimbingan</label>
                </div>

              <?php elseif ($row->status_proposal_pembimbing_2 === '1'): ?>

                       <div class="col-sm-10">
                  <label for="inputEmail3" class="col-sm-2 control-label">Acc Judul</label>
                </div>
              <?php elseif ($row->status_proposal_pembimbing_2 === '2'): ?>

                       <div class="col-sm-10">
                  <label for="inputEmail3" class="col-sm-2 control-label">Acc Proposal</label>
                </div>
              <?php elseif ($row->status_proposal_pembimbing_2 === '3'): ?>

                       <div class="col-sm-10">
                  <label for="inputEmail3" class="col-sm-2 control-label">Rekomendasi Seminar Proposal</label>
                </div>


              <?php endif; ?>
          </div>
          <?php if ($row->status_proposal_pembimbing_1 === '3' and $row->status_proposal_pembimbing_2 === '3' and $row->status_tugas_akhir != '1' ): ?>
           <?php echo form_open_multipart('Mahasiswa/proposaltugasakhirtodatabase');?>
                              <input type="hidden" name="id_tugas_akhir" value="<?php echo $row->id;?>">
                                <div class="form-group">
                                      <label for="inputEmail3" class="col-sm-2 control-label">Berkas Proposal </label>
                                      <div class="col-sm-10">
                                          <input type="file" id="berkasproposal" name="berkasproposal">
                                        </div>
                                  </div>
                                </div>
                                 <div class="box-footer">
                                  <button type="submit" class="btn btn-primary">Daftar Sempro</button>
                                </div>
                            <?php echo form_close(); ?>

          <?php endif; ?>
         
       
       
         <?php endforeach;?>
      </div>
    </section>
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
   
    
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
