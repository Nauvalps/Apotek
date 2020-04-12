<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- load header -->

    <?php 
    $this->load->view("admin/_partials/head.php");
     ?>
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

          <?php if ($this->session->flashdata('Success')): ?>
            <div class="alert alert-success" role="alert">
              <?php echo $this->session->flashdata('Success'); ?>
            </div>
            <?php endif; ?>
          		<!-- Area Chart Example-->
          		<div class="card mb-3">
          			<div class="card-header">
                  <a href="<?php echo site_url('admin/pasien/add') ?>"><i class="fas fa-plus"></i> Add New</a>
  					         </div>
          			<div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>ID Pasien</th>
                          <th>Nama Pasien</th>
                          <th>Tanggal Lahir</th>
                          <th>Keluhan</th>
                          <th>No HP</th>
                          <th>Alamat</th>
                          <th>Tools</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($pasien as $ps) {
                          // code...
                          ?>
                        <tr>
                          <td><?php echo $ps->pasien_id ?></td>
                          <td><?php echo $ps->nama_pasien ?></td>
                          <td><?php echo mediumdate_indo($ps->tanggal_lahir) ?></td>
                          <td><?php echo $ps->keluhan ?></td>
                          <td><?php echo $ps->no_hp ?></td>
                          <td><?php echo $ps->alamat ?></td>
                          <td>
                          <a href="<?php echo base_url('admin/pasien/edit/'.$ps->pasien_id)?>">
                            <button type="button" name="edit" class="btn btn-default btn-sm"><i class="fas fa-fw fa-edit"></i></button></a>
                             <a href="<?php echo base_url('admin/pasien/delete/'.$ps->pasien_id) ?>">
                             <button onclick="return confirm('Yakin ?')"  type="button" name="hapus" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></button> </td>
                             </a>
                        </tr>
                        <?php
                      } 
                      ?>
                      </tbody>
                    </table>
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
