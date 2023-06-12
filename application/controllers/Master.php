<?php
defined('BASEPATH')or exit('No direct script access allowed');
class Master extends CI_Controller {
    public function index(){
        $data = [
            'title' => 'Dashboard | WBS Pelindo',
            'view' => 'member/master/dashboard'
        ];
        $this->load->view('template_dashboard', $data);
    }

    public function user(){
        access_menu();
        $data = [
            'title' => 'Dashboard | WBS Pelindo',
            'view' => 'member/master/dashboard'
        ];
        $this->load->view('template_dashboard', $data);
    }

}