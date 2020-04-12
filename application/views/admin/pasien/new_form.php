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
                      <a href="<?php echo site_url('admin/pasien/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">

                      <form action="<?php base_url('admin/pasien/add') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="name">ID Pasien</label>
                          <?php 
                          if($pasien == null) {
                            $kdNext= "PS000";
                          }
                          else{
                            $kdNext = $pasien->pasien_id;
                          }
                          if($kdNext != null)
                          {
                            $kd = substr($kdNext, 2);
                            $kd = $kd + 1;

                            if($kd <= 9)
                            {
                              $kd = "PS00".$kd;
                            }
                            else if($kd <= 99)
                            {
                              $kd = "PS0".$kd;
                            }
                            else
                            {
                              $kd = "PS".$kd;
                            }

                          }?>
                          <input class="form-control" <?php echo form_error('id_pasien') ? 'is-invalid':'' ?>" type="text" name="id_pasien" readonly value="<?php echo $kd ?>" placeholder="ID Pasien" />
                          <div class="invalid-feedback">
                            <?php echo form_error('id_pasien') ?>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="name">Nama Pasien</label>
                          <input class="form-control <?php echo form_error('nama_pasien') ? 'is-invalid':'' ?>"type="text" name="nama_pasien" placeholder="Nama Pasien">
                          <div class="invalid-feedback">
                            <?php echo form_error('nama_pasien') ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="price">Tanggal Lahir </label>
                          <input type="date" class="form-control  <?php echo form_error('tanggal_lahir') ? 'is-invalid':'' ?>" name="tanggal_lahir">
                          <div class="invalid-feedback">
                            <?php echo form_error('tanggal_lahir') ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="keluhan">Keluhan</label>
                          <input type="text" class="form-control  <?php echo form_error('keluhan') ? 'is-invalid':'' ?>" name="keluhan">
                          <div class="invalid-feedback">
                            <?php echo form_error('keluhan') ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="no_hp">No HP</label>
                          <input class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>" type="number" name="no_hp" min="0" placeholder="No HP" />
                          <div class="invalid-feedback">
                            <?php echo form_error('no_hp') ?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="alamat">Alamat</label>
                          <textarea name="alamat" id="" class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>">
                          </textarea>
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
