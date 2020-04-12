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
                      <a href="<?php echo site_url('admin/obat/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">

                      <form action="<?php base_url('admin/obat/edit') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="name">Kode Obat</label>
                          <?php
                        //   $kdNext = $obat->kd_obat;
                        //   if($kdNext != null)
                        //   {
                        //     $kd = substr($kdNext, 2);
                        //     $kd = $kd + 1;

                        //     if($kd <= 9)
                        //     {
                        //       $kd = "OB00".$kd;
                        //     }
                        //     else if($kd <= 99)
                        //     {
                        //       $kd = "OB0".$kd;
                        //     }
                        //     else
                        //     {
                        //       $kd = "OB".$kd;
                        //     }

                        //   }?>
                          <input readonly value="<?php echo $obat->kd_obat ?>" class="form-control" type="text" name="kd_obat" placeholder="Kode Obat" />
                          <div class="invalid-feedback">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="price">Nama Obat</label>
                          <input class="form-control <?php echo form_error('nama_obat') ? 'is-invalid':'' ?>" type="text" name="nama_obat" min="0" placeholder="Nama Obat" value="<?php echo $obat->nama_obat ?>" />
                          <div class="invalid-feedback">
                            <?php echo form_error('nama_obat') ?>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="price">Jenis Obat</label>
                          <!-- <input class="form-control <?php echo form_error('jenis_obat') ? 'is-invalid':'' ?>" type="number" name="jenis_obat" min="0" placeholder="Nama Obat" /> -->
                          <select class="form-control <?php echo form_error('jenis_obat') ? 'is-invalid':'' ?>" name="jenis_obat">
                            <option value="">--Pilih Obat-- </option>
                            <option value="Kapsul" <?php if($obat->jenis_obat == "Kapsul") echo "selected" ?>>Kapsul</option>
                            <option value="Tablet" <?php if($obat->jenis_obat == "Tablet") echo "selected" ?>>Tablet</option>
                            <option value="Cair" <?php if($obat->jenis_obat == "Cair") echo "selected" ?>>Cair</option>
                          </select>
                          <div class="invalid-feedback">
                            <?php echo form_error('jenis_obat') ?>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="price">Harga Obat</label>
                          <input class="form-control <?php echo form_error('harga_obat') ? 'is-invalid':'' ?>" type="number" name="harga_obat" min="0" placeholder="Harga Obat" value="<?php echo $obat->harga_obat ?>"/>
                          <div class="invalid-feedback">
                            <?php echo form_error('harga_obat') ?>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="price">Stock Obat</label>
                          <input class="form-control <?php echo form_error('Stock') ? 'is-invalid':'' ?>" type="text" name="Stock" min="0" placeholder="Stock Obat" value="<?php echo $obat->Stock ?>"/>
                          <div class="invalid-feedback">
                            <?php echo form_error('Stock') ?>
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
