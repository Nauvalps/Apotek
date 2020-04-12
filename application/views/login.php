<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.css')?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('css/sb-admin.css')?>" rel="stylesheet">
  <style>
    body {
      background-image: url("upload/obat/apotek.jpg");
            /* Full height */
      height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }
    .login {
      width: 350px;
	background: white;
	/*meletakkan form ke tengah*/
	margin: 80px auto;
	padding: 30px 20px;
	box-shadow: 0px 0px 100px 4px #d6d6d6;
    }

    .form_login {
      	box-sizing : border-box;
	width: 100%;
	padding: 10px;
	font-size: 11pt;
	margin-bottom: 20px;
    }
  </style>
</head>

<body style="margin: 0;">
  <div class="login">
    <!-- <div class="row"> -->
      <!-- <div class="col col-md-6"> -->
        <?php
        if($this->session->flashdata('Failed') != ""){
          echo "
          <div class='alert alert-danger' role='alert'>".$this->session->flashdata('Failed')."</div>";
        } ?>

        <div class="card">
          <div class="card-header">
            Login
          </div>
          <div class="card-body">
            <form class="" action="<?php echo base_url('login/auth') ?>" method="post">
              <div class="form-group">
                <label>Username</label>
                <input class="form-control form_login" type="text" name="id_kry" placeholder="Masukkan Username" required>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input class="form-control form_login" type="password" name="pass" value="" placeholder="Masukkan Password" required>
              </div>
              <div class="form-group">
                <button type="submit" name="button" class="btn btn-primary btn-sm">Login</button>
              </div>
            </form>
          </div>
        </div>
      <!-- </div>
    </div> -->
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/jquery/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url('assets/chart.js/Chart.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('js/sb-admin.min.js')?>"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo base_url('js/demo/datatables-demo.js')?>"></script>
  <script src="<?php echo base_url('js/demo/chart-area-demo.js')?>"></script>

</body>

</html>
