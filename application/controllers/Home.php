<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => 'WBS Pelindo',
            'content' => 'home/index'
        ];
        $this->load->view('template_home', $data);
    }

    public function form(){
        $this->session->sess_destroy();
        $this->load->view('home/form');
    }

    public function check_form_1(){
        valid_ajax();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
            'required' => 'Nama lengkap harap di isi'
        ]);
        $this->form_validation->set_rules('nik', 'nik', 'required|trim|numeric|is_unique[pelapor.nik]',[
            'required' => 'Nik harap di isi',
            'numeric' => 'Nik harus angka',
            'is_unique' => 'Nik sudah terdaftar'
        ]);

        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[pelapor.email]',[
            'required' => 'Email harap di isi',
            'valid_email' => 'Email tidak valid',
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('telp', 'telp', 'required|trim|numeric|is_unique[pelapor.telp]',[
            'required' => 'No telp harap di isi',
            'numeric' => 'No telp harus angka',
            'is_unique' => 'No telp sudah terdaftar'
        ]);

        if($this->form_validation->run() == false){
            $output = [
                'success' => false,
                'err_nama' => form_error('nama'),
                'err_nik' => form_error('nik'),
                'err_email' => form_error('email'),
                'err_telp' => form_error('telp')
            ];
        } else {
            $media_call = $_POST['media_call'];
            $a = count($media_call);
            $data = array();

            for($b=0; $b<$a; $b++){
                array_push($data, array(
                    $media_call[$b]
                ));
            }


            $data = [
                'status_identitas' => $this->input->post('anonym'),
                'nama_pelapor' => $this->input->post('nama'),
                'nik' => $this->input->post('nik'),
                'email' => $this->input->post('email'),
                'no_kepegawaian' => $this->input->post('no_kepegawaian'),
                'telp' => $this->input->post('telp'),
                'jln' => $this->input->post('jln'),
                'kota' => $this->input->post('kota'),
                'kode_pos' => $this->input->post('post'),
                'wilayah' => $this->input->post('negara'),
                'media_call' => $data
            ];
            $this->session->set_userdata($data);
            $output = [
                'success' => true
            ];
        }
        echo json_encode($output);

    }

    public function load_data(){
        $data = $this->session->userdata('media_call');
        var_dump($data);
    }
}
