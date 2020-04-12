<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- load header -->

    <?php
    $this->load->view("kasir/_partials/head.php");
     ?>
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

          <?php if ($this->session->flashdata('Success')): ?>
            <div class="alert alert-success" role="alert">
              <?php echo $this->session->flashdata('Success'); ?>
            </div>
            <?php endif; ?>
          		<!-- Area Chart Example-->
          		<div class="card mb-3">
          			<div class="card-header">
                  <a href="<?php echo site_url('kasir/obat/add') ?>"><i class="fas fa-plus"></i> Add New</a>
  					         </div>
          			<div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Kode Nota</th>
                          <th>Nama Transaksi</th>
                          <th>Waktu Transaksi</th>
                          <th>Kasir</th>
                          <th>Total</th>
                          <th>Tools</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($trans as $ob) {
                          // code...
                          ?>
                        <tr>
                          <td><?php echo $ob->kd_nota ?></td>
                          <td><?php
                            if($ob->type_trans==1){
                              echo "Pembelian Obat";
                            }else {
                              echo "Melakukan Pelayanan";
                            }
                           ?></td>
                          <td><?php echo tgl_ind($ob->tgl) ?></td>
                          <td><?php echo $ob->id_ksr ?></td>
                          <td>Rp. <?php echo number_format($ob->ttl, 2,',','.'); ?></td>
                          <td>
                          <a href="<?php echo base_url('kasir/obat/view/'.$ob->kd_nota)?>">
                            <button type="button" name="edit" class="btn btn-default btn-sm"><i class="fas fa-fw fa-eye"></i></button></a>                        </tr>
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
