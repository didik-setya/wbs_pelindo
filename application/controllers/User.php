<?php
defined('BASEPATH')or exit('No direct script access allowed');
class User extends CI_Controller {
    public function index(){
        $data = [
            'user' => get_pelapor(),
            'title' => 'Home | WBS Pelindo',
        ];
        $this->load->view('user/template_user', $data);
    }

}