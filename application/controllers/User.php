<?php
defined('BASEPATH')or exit('No direct script access allowed');
class User extends CI_Controller {
    public function index(){
        $data = [
            'user' => get_pelapor(),
            'title' => 'Home | WBS Pelindo',
            'view' => 'user/index'
        ];
        $this->load->view('user/template_user', $data);
    }

    public function report(){
        $data = [
            'user' => get_pelapor(),
            'title' => 'Laporan | WBS Pelindo',
            'view' => 'user/report'
        ];
        $this->load->view('user/template_user', $data);
    }

}