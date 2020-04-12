<ul class="sidebar navbar-nav">
  <li class="nav-item active <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo base_url('kasir/home/') ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <li class="nav-item <?php echo $this->uri->segment(2) == 'obat' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo base_url('kasir/obat/') ?>">
      <i class="fas fa-fw fa-medkit"></i>
      <span>Transaksi Obat</span></a>
  </li>
  <li class="nav-item <?php echo $this->uri->segment(2) == 'layanan' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo base_url('kasir/layanan/') ?>">
    <i class="fas fa-briefcase-medical"></i>
      <span>Transaksi Layanan</span></a>
  </li>
</ul>
