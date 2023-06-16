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
            $media_call = $this->input->post('media_call');
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
                'kode_pos' => $this->input->post('pos'),
                'wilayah' => $this->input->post('negara'),
                'media_call' => $data,
                'other_media_call' => $this->input->post('lain_lain_form')
            ];
            $this->session->set_userdata($data);
            $output = [
                'success' => true
            ];
        }
        echo json_encode($output);

    }

    public function check_form_2(){
        valid_ajax();

        $laporan = $this->input->post('laporan');
        $a = count($laporan);
        $data_laporan = array();

        for($b=0; $b<$a; $b++){
            array_push($data_laporan, array(
                $laporan[$b]
            ));
        }

        $data = [
            'jenis_laporan' => $laporan,
            'apa_yang_terjadi' => $this->input->post('apa_yang_terjadi'),
            'penyadaran_kasus' => $this->input->post('penyadaran_kasus'),
            'other_jenis_laporan' => $this->input->post('other_laporan')
        ];
        $this->session->set_userdata($data);

        $output = ['success' => true];
    
        echo json_encode($output);

    }

    public function load_data(){
        $data = $this->session->userdata();
        var_dump($data);
    }
}
