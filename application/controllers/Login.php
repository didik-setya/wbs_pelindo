<?php
defined('BASEPATH')or exit('No direct script access allowed');
class Login extends CI_Controller {
    public function index(){
        $this->load->view('user/login');
    }

    public function proccess(){
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email', [
            'required' => 'Email harap di isi',
            'valid_email' => 'Email harus valid '
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim', [
            'required' => 'Password harap di isi'
        ]);

        if($this->form_validation->run() == false){
            $output = [
                'type' => 'validation',
                'err_email' => form_error('email'),
                'err_pass' => form_error('password'), 
                'token' => $this->security->get_csrf_hash()
            ];
            echo json_encode($output);
            die;
        } else {    
            $this->pv_login();
        }
    }

    private function pv_login(){
        $email = $this->input->post('email');
        $pass = md5(sha1($this->input->post('password')));

        $user = $this->db->where('email', $email)->or_where('username', $email)->get('pelapor')->row();

        if($user){
            if($user->pass == $pass){
                $params = [
                    'email' => $email,
                    'username' => $email,
                ];
                $this->session->set_userdata($params);

                $output = [
                    'success' => true,
                    'msg' => 'Login success',
                    'redirect' => base_url('user')
                ];

            } else {
                $output = [
                    'success' => false,
                    'msg' => 'Password salah'
                ];
            }
        } else {
            $output = [
                'success' => false,
                'msg' => 'Email atau username tidak terdaftar'
            ];
        }
        $output['type'] = 'result';
        $output['token'] = $this->security->get_csrf_hash();
        echo json_encode($output);
    }

}