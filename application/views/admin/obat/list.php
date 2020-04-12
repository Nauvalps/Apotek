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
                  <a href="<?php echo site_url('admin/obat/add') ?>"><i class="fas fa-plus"></i> Add New</a>
  					         </div>
          			<div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Kode Obat</th>
                          <th>Nama Obat</th>
                          <th>Jenis Obat</th>
                          <th>Gambar</th>
                          <th>Harga</th>
                          <th>Stock</th>
                          <th>Tools</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($obat as $ob) {
                          // code...
                          ?>
                        <tr>
                          <td><?php echo $ob->kd_obat ?></td>
                          <td><?php echo $ob->nama_obat ?></td>
                          <td><?php echo $ob->jenis_obat ?></td>
                          <td>
                            <img src="<?php echo base_url('upload/obat/'.$ob->gambar)?>" alt="obat" width="64">
                          </td>
                          <td>Rp. <?php echo number_format($ob->harga_obat, 2,',','.'); ?></td>
                          <td><?php echo $ob->Stock ?></td>
                          <td>
                          <a href="<?php echo base_url('admin/obat/edit/'.$ob->kd_obat)?>">
                            <button type="button" name="edit" class="btn btn-default btn-sm"><i class="fas fa-fw fa-edit"></i> Edit</button></a>&nbsp;&nbsp;
                             <a href="<?php echo base_url('admin/obat/delete/'.$ob->kd_obat) ?>">
                             <button onclick="return confirm('Yakin ?')"  type="button" name="hapus" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i> Hapus</button> </td>
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
