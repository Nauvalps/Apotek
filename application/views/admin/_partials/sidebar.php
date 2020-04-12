<ul class="sidebar navbar-nav">
  <li class="nav-item active <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo base_url('admin/home')?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <li class="nav-item <?php echo $this->uri->segment(2) == 'obat' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo base_url('admin/obat/') ?>">
      <i class="fas fa-fw fa-medkit"></i>
      <span>Obat</span></a>
  </li>
  <li class="nav-item <?php echo $this->uri->segment(2) == 'layanan' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo base_url('admin/layanan/') ?>">
    <i class="fas fa-briefcase-medical"></i>
      <span>Layanan</span></a>
  </li>
  <li class="nav-item <?php echo $this->uri->segment(2) == 'pasien' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo base_url('admin/pasien/') ?>">
      <i class="fas fa-fw fa-address-card"></i>
      <span>Pasien</span></a>
  </li>
  <li class="nav-item <?php echo $this->uri->segment(2) == 'karyawan' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo base_url('admin/karyawan/') ?>">
      <i class="fas fa-fw fa-users"></i>
      <span>Karyawan</span></a>
  </li>
  <li class="nav-item <?php echo $this->uri->segment(2) == 'laporan' ? 'active': '' ?>">
    <a class="nav-link" href="<?php echo base_url('admin/laporan/') ?>">
    <i class="fas fa-chart-area"></i>
      <span>Laporan Transaksi</span></a>
  </li>
</ul>
