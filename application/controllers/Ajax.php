<?php
defined('BASEPATH')or exit('No direct script access allowed');
class Ajax extends CI_Controller {
    public function get_detail_report(){
        $id = $_POST['id'];

        $data = [
            'report' => $this->m->get_report($id),
            'jenis_laporan' => $this->m->get_jenis_laporan($id),
            'kasus_terjadi' => $this->m->get_kasus_terjadi($id),
            'kasus_sebelumnya' => $this->m->get_kasus_sebelumnya($id),
            'informan' => $this->m->get_informan_pihak_kedua($id),
            'pihak_terlibat' => $this->m->get_pihak_terlibat($id),
            'laporan_sebelumnya' => $this->m->get_laporan_sebelumnya($id),
            'pihak_lain' => $this->m->get_pihak_lain_menyadari_kasus($id),
            'saksi' => $this->m->get_saksi($id),
        ];

        $this->load->view('ajax/detail_report', $data);
    }
}