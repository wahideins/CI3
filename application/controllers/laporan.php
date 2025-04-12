<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Laporan_model');
    }

    public function index() {
        $this->load->view('laporan_view');
    }

    public function get_data() {
        $tahun = $this->input->post('tahun');
        $data['tahun'] = $tahun;
        $data['laporan'] = $this->Laporan_model->get_laporan($tahun);
        $this->load->view('laporan_view', $data);
    }

    public function download_database() {
        $this->load->helper('download');
        $this->load->dbutil();

        $prefs = array(
            'format'      => 'zip',
            'filename'    => 'database_backup.sql'
        );

        $backup = $this->dbutil->backup($prefs);
        force_download('backup_database.zip', $backup);
    }
}
