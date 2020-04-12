<?php
  /**
   *
   */
  class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('akses') == '2') {
            redirect(base_url('kasir'));
          }
          elseif($this->session->userdata('akses')!='1'){
            redirect(base_url());
          }
          $this->load->model("LaporanModel");
          $this->load->library('session');        
    }

    public function index() {
        $this->load->view("admin/laporan/new_form");
    }

    public function cari() {
        $this->load->library('dompdf_gen');
        $tgl_first = $this->input->post('tgl_first');
        $tgl_last = $this->input->post('tgl_last');
        $sql = "SELECT * FROM transaksi WHERE DATE(tgl) BETWEEN '$tgl_first' AND '$tgl_last'";
        $data["trx"]  = $this->db->query($sql)->result();
        $this->load->view('admin/laporan/laporan_pdf',$data);
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
		$this->dompdf->stream("laporan_trx.pdf", array('Attachment' => 0));
    }
  }