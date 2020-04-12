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
                      <a href="<?php echo site_url('admin/karyawan/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">

                      <form action="<?php base_url('admin/karyawan/add') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="name">ID Karyawan</label>
                          <input class="form-control" <?php echo form_error('id_kry') ? 'is-invalid':'' ?>" type="text" name="id_kry" placeholder="ID Karyawan" />
                          <div class="invalid-feedback">
                            <?php echo form_error('id_kry') ?>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="name">Password</label>
                          <input class="form-control" <?php echo form_error('pass') ? 'is-invalid':'' ?>" type="password" name="pass" placeholder="Password" />
                          <div class="invalid-feedback">
                            <?php echo form_error('pass') ?>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="price">Nama </label>
                          <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" type="text" name="nama" min="0" placeholder="Nama" />
                          <div class="invalid-feedback">
                            <?php echo form_error('nama') ?>
                          </div>
                        </div>


                        <div class="form-group">
                          <label for="price">Alamat </label>
                          <textarea name="alamat" id="" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" cols="30" rows="10">
                          
                        </textarea>
                          <div class="invalid-feedback">
                            <?php echo form_error('alamat') ?>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="price">No HP</label>
                          <input class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>" type="number" name="no_hp" min="0" placeholder="No HP" />
                          <div class="invalid-feedback">
                            <?php echo form_error('no_hp') ?>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="price">Level</label>
                          <select class="form-control <?php echo form_error('level') ? 'is-invalid':'' ?>" name="level">
                            <option value="">--Pilih Level-- </option>
                            <option value="1">Admin</option>
                            <option value="2">Kasir</option>
                          </select>
                          <div class="invalid-feedback">
                            <?php echo form_error('level') ?>
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
