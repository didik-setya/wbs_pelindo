<?php
defined('BASEPATH')or exit('No direct script access allowed');
class User extends CI_Controller {
    public function index(){
        echo "ok";
    }

    public function load_email(){
        $view = $this->load->view('user/template_email', '', true);
        $this->m->send_mail(null, $view);
    }

    public function view_email(){
        $this->load->view('user/template_email');
    }

}