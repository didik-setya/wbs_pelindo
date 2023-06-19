<?php
defined('BASEPATH')or exit('No direct script access allowed');
class Report extends CI_Controller {
    public function index(){
        $data = [
            'title' => 'Laporan | WBS Pelindo',
            'view' => 'member/report/index'
        ];
        $this->load->view('template_dashboard', $data);
    }

    public function get_report(){
        valid_ajax();

        $data = $this->data->get_data_report();
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
            
                <button class="btn btn-sm btn-primary detail" data-id="'.$d->relation_all.'"><i class="fa fa-search"></i></button>

                    ';
            $output[] = $row;
        }

        $list = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->data->count_all_report(),
            "recordsFiltered" => $this->data->count_filtered_report(),
            "data" => $output,
        );
        echo json_encode($list);
    }
}