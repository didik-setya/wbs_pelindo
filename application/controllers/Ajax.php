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

    public function get_report_for_user(){
        valid_ajax();
        $user = get_pelapor();

        $data = $this->data->get_data_report($user->media_access);
        $output = array();
        $no = $_POST['start'];

        foreach($data as $d){
            $date = date_create($d->create_at);
            if($d->status_kasus == 1){
                $status = 'Proses';
            } else if($d->status_kasus == 0){
                $status = 'Selesai';
            } else {
                $status = 'Unknow';
            }

            $no++;
            $row = array();
            $row[] = $no;
            $row[] = date_format($date, 'd M Y H:i');
            $row[] = $d->hal_terjadi;
            $row[] = $d->unit_kerja_laporan;
            $row[] = $status;
            $row[] = '
            
                <button class="btn btn-sm btn-secondary detail" data-id="'.$d->relation_all.'"><i class="fa fa-search"></i></button>

                    ';
            $output[] = $row;
        }

        $list = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->data->count_all_report($user->media_access),
            "recordsFiltered" => $this->data->count_filtered_report($user->media_access),
            "data" => $output,
        );
        echo json_encode($list);
    }

    public function get_detail_report_for_user(){
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

        $this->load->view('ajax/detail_report_user', $data);
    }
}