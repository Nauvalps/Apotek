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
          <div class="card col-md-6 mb-4">
                    <div class="card-header">
                      <a href="<?php echo site_url('admin/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                    <form action="<?php echo site_url('admin/laporan/cari') ?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="tgl_first">Periode awal</label>
                        <input type="date" class="form-control" id="tgl_first" name="tgl_first" required>
                        </div>
                        <div class="form-group col-md-4">
                        <label for="tgl_last">Periode akhir</label>
                        <input type="date" class="form-control" id="tgl_last" name="tgl_last" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Cari data</button>
                    <!-- <a href="<?php base_url('admin/laporan/cari') ?>" target="_blank" type="submit" class="btn btn-success">Cari data</a> -->
                    </form>
                    </div>
                    <div class="card-footer small text-muted">
                      * required fields
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
