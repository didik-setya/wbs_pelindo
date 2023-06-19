<?php
defined('BASEPATH')or exit('No direct script access allowed');
class Auth extends CI_Controller {
    public function index(){
        $this->load->view('member/auth');
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
            $this->pv_proccess();
        }

        
    }

    private function pv_proccess(){
        $email = htmlspecialchars($this->input->post('email'));
        $pass = md5(sha1($this->input->post('password')));
        $user = $this->db->get_where('member', ['email' => $email])->row();

        if($user){
            if($user->password == $pass){
                if($user->is_active == 1){

                    $params = [
                        'email_member' => $email,
                        'status' => $user->is_active,
                        'role' => $user->id_role
                    ];
                    $output = [
                        'success' => true,
                        'msg' => 'Login Success',
                        'redirect' => base_url('master')
                    ];
                    $this->session->set_userdata($params);

                } else if($user->is_active == 2) {
                    $output = [
                        'success' => false,
                        'msg' => 'Email tidak terverifikasi'
                    ];
                } else if($user->is_active == 0){
                    $output = [
                        'success' => false,
                        'msg' => 'Akun sudah tidak aktif'
                    ];
                } else {
                    $output = [
                        'success' => false,
                        'msg' => 'Unknow user status'
                    ];
                }
            } else {
                $output = [
                    'success' => false,
                    'msg' => 'Password salah'
                ];
            }
        } else {
            $output = [
                'success' => false,
                'msg' => 'Email tidak terdaftar'
            ];
        }
        $output['type'] = 'result';
        $output['token'] = $this->security->get_csrf_hash();

        echo json_encode($output);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }

    public function verify(){
        $this->load->view('member/verify_email');
    }

    public function verify_email(){
        // valid_ajax();
        $email = $this->input->post('email');
        $token = $this->input->post('token');

        $this->db->from('email_token')->join('member', 'email_token.email = member.email')->where('email_token.email', $email)->where('token', $token);
        $user = $this->db->get()->row();

        if($user){
            $this->db->trans_start();
            $this->db->set('is_active', 1)->where('email', $email)->update('member');
            $this->db->where('email', $email)->delete('email_token');
            $this->db->trans_complete();

            if($this->db->trans_status() == true){
                $msg = [
                    'success' => true,
                    'msg' =>  'Verifikasi berhasil' 
                ];
            } else {
                $msg = [
                    'success' => false,
                    'msg' =>  'Verifikasi gagal' 
                ];
            }

        } else {
            $msg = [
                'success' => false,
                'msg' => 'Verifikasi tidak valid'
            ];
        }
        echo json_encode($msg);
    }

}