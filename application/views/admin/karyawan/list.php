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
                  <a href="<?php echo site_url('admin/karyawan/add') ?>"><i class="fas fa-plus"></i> Add New</a>
  					         </div>
          			<div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>ID Karyawan</th>
                          <th>Nama Karyawan</th>
                          <th>Alamat</th>
                          <th>No HP</th>
                          <th>Level</th>
                          <th>Tools</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($kry as $kr) {
                          // code...
                          ?>
                        <tr>
                          <td><?php echo $kr->id_kry ?></td>
                          <td><?php echo $kr->nama ?></td>
                          <td><?php echo $kr->alamat ?></td>
                          <td><?php echo $kr->no_hp ?></td>
                          <td><?php 
                          if($kr->level == 1) {
                            echo "Admin";
                          }
                          else {
                            echo "Kasir";
                          } ?></td>
                          <td>
                          <a href="<?php echo base_url('admin/karyawan/edit/'.$kr->id_kry)?>">
                            <button type="button" name="edit" class="btn btn-default btn-sm"><i class="fas fa-fw fa-edit"></i></button></a>
                             <a href="<?php echo base_url('admin/karyawan/delete/'.$kr->id_kry) ?>">
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
