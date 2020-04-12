<html lang="en">

<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

  <?php $this->load->view("admin/_partials/navbar.php") ?>
    <div id="wrapper">

      <?php $this->load->view("admin/_partials/sidebar.php") ?>

        <div id="content-wrapper">

          <div class="container-fluid">

            <?php $this->load->view("admin/_partials/breadcrumb.php") ?>

              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>

                  <div class="card mb-3">
                    <div class="card-header">
                      <a href="<?php echo site_url('admin/layanan/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">

                      <form action="<?php base_url('admin/layanan/edit') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="name">Kode Layanan</label>
                          <input readonly value="<?php echo $lyn->kd_layanan ?>" class="form-control" type="text" name="kd_layanan" placeholder="Kode Layanan" />
                          <div class="invalid-feedback">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="price">Nama Layanan</label>
                          <input class="form-control <?php echo form_error('nama_lyn') ? 'is-invalid':'' ?>" type="text" name="nama_lyn" min="0" placeholder="Nama Layanan" value="<?php echo $lyn->nama_lyn ?>" />
                          <div class="invalid-feedback">
                            <?php echo form_error('nama_lyn') ?>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="price">Harga Layanan</label>
                          <input class="form-control <?php echo form_error('harga_layanan') ? 'is-invalid':'' ?>" type="number" name="harga_layanan" min="0" placeholder="Harga Layanan" value="<?php echo $lyn->harga_layanan ?>"/>
                          <div class="invalid-feedback">
                            <?php echo form_error('harga_layanan') ?>
                          </div>
                        </div>
                        <input class="btn btn-success" type="submit" name="btn" value="Save" />
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


        <?php $this->load->view("admin/_partials/scrolltop.php") ?>

          <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
