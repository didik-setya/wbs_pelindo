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


    //master user
    public function user(){
        access_menu();
        $data = [
            'title' => 'Master User',
            'view' => 'member/master/user',
            'role' => $this->db->get('role')->result()
        ];
        $this->load->view('template_dashboard', $data);
    }

    public function add_user(){
        valid_ajax();
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[member.email]', [
            'required' => 'Email harap di isi',
            'valid_email' => 'Email tidak valid',
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('user', 'user', 'required|trim',[
            'required' => 'Nama user harap di isi'
        ]);


        if($this->form_validation->run() == false){
            $output = [
                'type' => 'validation',
                'err_user' => form_error('user'),
                'err_email' => form_error('email'),
                'token' => $this->security->get_csrf_hash()
            ];
            echo json_encode($output);
            die;
        } else {
            $this->pv_add_user();
        }
    }

    private function pv_add_user(){
        $role = htmlspecialchars($this->input->post('role'));
        $user = htmlspecialchars($this->input->post('user'));
        $email = htmlspecialchars($this->input->post('email'));
        $pass = 'wbs_'. rand(10000, 99999);
        $token = base64_encode(random_bytes(32));

        $link = base_url() . 'auth/verify?email='.$email.'&token='.urlencode($token);

        //data for insert to database
        $data_member = [
            'id_role' => $role,
            'nama' => $user,
            'email' => $email,
            'img' => 'default.jpg',
            'is_active' => 2,
            'create_at' => date('Y-m-d'),
            'password' => md5(sha1($pass))
        ];
        $data_token = [
            'email' => $email,
            'token' => $token
        ];

        //setting for email verify
        $subject = 'Verfikasi dan aktifasi akun';
        $message = 
            '<h4>Halo '.$user.'</h4>
            <p>Selamat datang di WBS Pelindo. untuk melanjutkan pendaftaran akun member andan, silahkan klik link di bawah ini. <br>
    
            <b>Link Verfikasi : </b> <a href="'.$link.'">'.$link.'</a>
    
            </p>
            
            <p>Setelah aktifasi akun anda berhasil, silahkan lanjutkan login member menggunakan email dan password di bawah ini. <br>
                <b>Email:</b>  '.$email.'<br>
                <b>Password: </b>  '.$pass.'
            </p>';
        $data['content'] = $message;
        $template = $this->load->view('user/template_email', $data, true);
        //send email
        $send = $this->m->send_mail($subject, $template);
        
        if($send == 1){

            $this->db->trans_start();
            $this->db->insert('member', $data_member);
            $this->db->insert('email_token', $data_token);
            $this->db->trans_complete();

            if($this->db->trans_status() == TRUE){
                $output = [
                    'type' => 'result',
                    'success' => true,
                    'msg' => 'User baru berhasil di tambahkan, silahkan cek inbox email atau di bagian spam'
                ];
            } else {
                $output = [
                    'type' => 'result',
                    'success' => false,
                    'msg' => 'User baru gagal di tambahkan'
                ];
            }

        } else {
            $output = [
                'type' => 'email',
                'msg' => 'Email verifikasi gagal di kirim'
            ];
        }

        $output['token'] = $this->security->get_csrf_hash();
        echo json_encode($output);
    }

    public function get_data_member(){
        valid_ajax();
        $data = $this->data->get_data_user();
        $output = array();
        $no = $_POST['start'];

        foreach($data as $d){
            if($d->is_active == 0){
                $status = 'Tidak aktif';
            } else if($d->is_active == 1){
                $status = 'Aktif';
            } else if($d->is_active == 2){
                $status = 'Belum verifikasi email';
            } else {
                $status = 'Unknow user status';
            }


            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $d->nama;
            $row[] = $status;
            $row[] = '
                    <button class="btn btn-sm btn-success text-white edit" data-id="'.md5(sha1($d->id_member)).'"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger text-white delete" data-id="'.md5(sha1($d->id_member)).'"><i class="fa fa-trash"></i></button>
                    <button class="btn btn-sm btn-info text-white detail" data-id="'.md5(sha1($d->id_member)).'"><i class="fa fa-search"></i></button>
                ';

            $output[] = $row;
        }

        $list = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->data->count_all_user(),
            "recordsFiltered" => $this->data->count_filtered_user(),
            "data" => $output,
            "token" => $this->security->get_csrf_hash()
        );
        echo json_encode($list);
    }

}