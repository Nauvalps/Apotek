<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- load header -->
    <?php $this->load->view("kasir/_partials/head.php") ?>
  </head>

  <body id="page-top">
    <!-- Navbar -->
  <?php $this->load->view("kasir/_partials/navbar.php") ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php $this->load->view("kasir/_partials/sidebar.php") ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->

          <?php $this->load->view("kasir/_partials/breadcrumb.php") ?>

          <!-- Icon Cards-->
          <div class="row">
          			<div class="col-xl-3 col-sm-6 mb-3">
          			<div class="card text-white bg-primary o-hidden h-100">
          				<div class="card-body">
          				<div class="card-body-icon">
          					<i class="fas fa-fw fa-comments"></i>
          				</div>
          				<div class="mr-5"><?php $query = $this->db->query('SELECT * FROM transaksi WHERE type_trans = 1');
						  echo $query->num_rows();
						  ?> Data transaksi obat</div>
          				</div>
          				<a class="card-footer text-white clearfix small z-1" href="<?= base_url('kasir/obat')?>">
          				<span class="float-left">View Details</span>
          				<span class="float-right">
          					<i class="fas fa-angle-right"></i>
          				</span>
          				</a>
          			</div>
          			</div>
          			<div class="col-xl-3 col-sm-6 mb-3">
          			<div class="card text-white bg-warning o-hidden h-100">
          				<div class="card-body">
          				<div class="card-body-icon">
          					<i class="fas fa-fw fa-list"></i>
          				</div>
          				<div class="mr-5"><?php $query = $this->db->query('SELECT * FROM transaksi WHERE type_trans = 2');
						  echo $query->num_rows();
						  ?> Data transaksi layanan</div>
          				</div>
          				<a class="card-footer text-white clearfix small z-1" href="<?= base_url('kasir/layanan')?>">
          				<span class="float-left">View Details</span>
          				<span class="float-right">
          					<i class="fas fa-angle-right"></i>
          				</span>
          				</a>
          			</div>
          			</div>
          			
          			
          		</div>

          		

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->

        <?php $this->load->view("kasir/_partials/footer.php") ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <?php $this->load->view("kasir/_partials/scrolltop.php") ?>

    <!-- Logout Modal-->

    <?php $this->load->view("kasir/_partials/modal.php") ?>

  <!-- load Javascript -->
      <?php $this->load->view("kasir/_partials/js.php") ?>

  </body>

</html>
