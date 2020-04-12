<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- load header -->
    <?php $this->load->view("admin/_partials/head.php") ?>
  </head>

  <body id="page-top">
    <!-- Navbar -->
  <?php $this->load->view("admin/_partials/navbar.php") ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php $this->load->view("admin/_partials/sidebar.php") ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->

          <?php $this->load->view("admin/_partials/breadcrumb.php") ?>

          <!-- Icon Cards-->
          <div class="row">
          			<div class="col-xl-3 col-sm-6 mb-3">
          			<div class="card text-white bg-primary o-hidden h-100">
          				<div class="card-body">
          				<div class="card-body-icon">
          					<i class="fas fa-fw fa-comments"></i>
          				</div>
						  <div class="mr-5"><?php $query = $this->db->query('SELECT * FROM obat');
						  echo $query->num_rows();
						  ?> Data obat</div>
          				</div>
          				<a class="card-footer text-white clearfix small z-1" href="<?= base_url('admin/obat/')?>">
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
          				<div class="mr-5"><?php $query = $this->db->query('SELECT * FROM layanan');
						  echo $query->num_rows();
						  ?> Data layanan</div>
          				</div>
          				<a class="card-footer text-white clearfix small z-1" href="<?= base_url('admin/layanan')?>">
          				<span class="float-left">View Details</span>
          				<span class="float-right">
          					<i class="fas fa-angle-right"></i>
          				</span>
          				</a>
          			</div>
          			</div>
          			<div class="col-xl-3 col-sm-6 mb-3">
          			<div class="card text-white bg-success o-hidden h-100">
          				<div class="card-body">
          				<div class="card-body-icon">
          					<i class="fas fa-fw fa-shopping-cart"></i>
          				</div>
          				<div class="mr-5"><?php $query = $this->db->query('SELECT * FROM pasien');
						  echo $query->num_rows();
						  ?> Data pasien</div>
          				</div>
          				<a class="card-footer text-white clearfix small z-1" href="<?= base_url('admin/pasien')?>">
          				<span class="float-left">View Details</span>
          				<span class="float-right">
          					<i class="fas fa-angle-right"></i>
          				</span>
          				</a>
          			</div>
          			</div>
          			<div class="col-xl-3 col-sm-6 mb-3">
          			<div class="card text-white bg-danger o-hidden h-100">
          				<div class="card-body">
          				<div class="card-body-icon">
          					<i class="fas fa-fw fa-life-ring"></i>
          				</div>
          				<div class="mr-5"><?php $query = $this->db->query('SELECT * FROM transaksi');
						  echo $query->num_rows();
						  ?> Data transaksi </div>
          				</div>
          				<a class="card-footer text-white clearfix small z-1" href="#">
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

        <?php $this->load->view("admin/_partials/footer.php") ?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <?php $this->load->view("admin/_partials/scrolltop.php") ?>

    <!-- Logout Modal-->

    <?php $this->load->view("admin/_partials/modal.php") ?>

  <!-- load Javascript -->
      <?php $this->load->view("admin/_partials/js.php") ?>

  </body>

</html>
