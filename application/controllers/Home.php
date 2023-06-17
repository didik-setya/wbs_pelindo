<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

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

    public function check_form_3(){
        valid_ajax();
        $tgl_terjadi = $this->input->post('tgl_terjadi');
        $prov_terjadi = $this->input->post('prov_terjadi');
        $kota_terjadi = $this->input->post('kota_terjadi');
        $kec_terjadi = $this->input->post('kec_terjadi');

        $tgl_terjadi_before = $this->input->post('tgl_terjadi_before');
        $prov_terjadi_before = $this->input->post('prov_terjadi_before');
        $kota_terjadi_before = $this->input->post('kota_terjadi_before');
        $kec_terjadi_before = $this->input->post('kec_terjadi_before');

        $i = count($kec_terjadi);
        $data_terjadi_kasus = array();
        for($a=0; $a<$i; $a++){
            array_push($data_terjadi_kasus, array(
                'tanggal_terjadi' => $tgl_terjadi[$a],
                'prov_terjadi' => $prov_terjadi[$a],
                'kota_terjadi' => $kota_terjadi[$a],
                'kec_terjadi' => $kec_terjadi[$a]
            ));
        }

        $a = count($kec_terjadi_before);
        $data_kasus_sebelumnya = array();
        for($b=0; $b<$a; $b++){
            array_push($data_kasus_sebelumnya, array(
                'tanggal_terjadi' => $tgl_terjadi_before[$b],
                'prov_terjadi' => $prov_terjadi_before[$b],
                'kota_terjadi' => $kota_terjadi_before[$b],
                'kec_terjadi' => $kec_terjadi_before[$b]
            ));
        }

        $data = [
            'lama_kasus' => $this->input->post('lama_kasus_berlangsung'),
            'kasus_before' => $this->input->post('kasus_before'),
            'kasus_terjadi' => $data_terjadi_kasus,
            'kasus_sebelumnya' => $data_kasus_sebelumnya
        ];
        $this->session->set_userdata($data);
        $output = ['success' => true];
        echo json_encode($output);
    }

    public function check_form_4(){
        valid_ajax();

        $panggilan_informan = $this->input->post('panggilan_informan');
        $nama_informan = $this->input->post('nama_informan');
        $divisi_informan = $this->input->post('divisi_informan');

        $panggilan_report = $this->input->post('panggilan_report');
        $nama_report = $this->input->post('nama_report');
        $divisi_report = $this->input->post('divisi_report');

        $panggilan_report_before = $this->input->post('panggilan_report_before');
        $nama_report_before = $this->input->post('nama_report_before');
        $divisi_report_before = $this->input->post('divisi_report_before');

        $panggilan_another_people = $this->input->post('panggilan_another_people');
        $nama_another_people = $this->input->post('nama_another_people');
        $divisi_another_people = $this->input->post('divisi_another_people');

        $panggilan_saksi = $this->input->post('panggilan_saksi');
        $nama_saksi = $this->input->post('nama_saksi');
        $divisi_saksi = $this->input->post('divisi_saksi');

        $informan = count($nama_informan);
        $people_report = count($nama_report);
        $report_before = count($nama_report_before);
        $another_people = count($nama_another_people);
        $saksi = count($nama_saksi);

        $data_informan = array();
        $data_people_report = array();
        $data_report_before = array();
        $data_another_people = array();
        $data_saksi = array();

        for($i=0; $i<$informan; $i++){
            array_push($data_informan, array(
                'paggilan' => $panggilan_informan[$i],
                'nama' => $nama_informan[$i],
                'divisi' => $divisi_informan[$i]
            ));
        }

        for($i=0; $i<$people_report; $i++){
            array_push($data_people_report, array(
                'paggilan' => $panggilan_report[$i],
                'nama' => $nama_report[$i],
                'divisi' => $divisi_report[$i]
            ));
        }

        for($i=0; $i<$report_before; $i++){
            array_push($data_report_before, array(
                'paggilan' => $panggilan_report_before[$i],
                'nama' => $nama_report_before[$i],
                'divisi' => $divisi_report_before[$i]
            ));
        }

        for($i=0; $i<$another_people; $i++){
            array_push($data_another_people, array(
                'paggilan' => $panggilan_another_people[$i],
                'nama' => $nama_another_people[$i],
                'divisi' => $divisi_another_people[$i]
            ));
        }

        for($i=0; $i<$saksi; $i++){
            array_push($data_saksi, array(
                'paggilan' => $panggilan_saksi[$i],
                'nama' => $nama_saksi[$i],
                'divisi' => $divisi_saksi[$i]
            ));
        }

        $data = [
            'sumber_informasi' => $this->input->post('informan'),
            'unit_kerja_report' => $this->input->post('unit_report'),
            'manajemen_terlibat' => $this->input->post('manajemen_terlibat'),
            'laporan_sebelumnya' => $this->input->post('report_before'),
            'orang_lain' => $this->input->post('another_people'),
            'saksi' => $this->input->post('saksi'),

            'desc_management_terlibat' => $this->input->post('decs_pihak_management_terlibat'),
            'informan' => $data_informan,
            'people_report' => $data_people_report,
            'report_before' => $data_report_before,
            'another_people' => $data_another_people,
            'data_saksi' => $data_saksi
        ];
        $this->session->set_userdata($data);
        $output = ['success' => true];
        echo json_encode($output);

    }

    public function check_form_5(){
        valid_ajax();

        $relation_all = time();
        $count_file = count($_FILES['file_bukti']['name']);
        
        $all_data = $this->session->userdata();
        $email_pelapor = $all_data['email'];
        $new_pass = 'wbs_'. rand(10000, 99999);

        $data_file = array();


        for($i=0; $i<$count_file; $i++){
            if(!empty($_FILES['file_bukti']['name'][$i])){

                $_FILES['file']['name'] = $_FILES['file_bukti']['name'][$i];  
                $_FILES['file']['type'] = $_FILES['file_bukti']['type'][$i];  
                $_FILES['file']['tmp_name'] = $_FILES['file_bukti']['tmp_name'][$i];  
                $_FILES['file']['error'] = $_FILES['file_bukti']['error'][$i];  
                $_FILES['file']['size'] = $_FILES['file_bukti']['size'][$i]; 
                $type_file = ['doc', 'docx', 'xls', 'xlsx', 'pdf', 'mp3', 'mp4', 'jpg', 'png', 'jpeg', 'gif'];

                $config['upload_path'] = './assets/berkas/';   
                $config['allowed_types'] = $type_file;
                $config['file_name'] = $_FILES['file_bukti']['name'][$i]; 

                $this->load->library('upload',$config);

                if($this->upload->do_upload('file')){

                    array_push($data_file, array(
                        'relation_laporan' => $relation_all,
                        'bukti' => $this->upload->data('file_name'),
                        'type_file' => $this->upload->data('file_ext') 
                    ));

                } else {
                    $output = [
                        'success' => false,
                        'msg' => 'Error: failed upload file'
                    ];
                    echo json_encode($output);
                    die;
                }

            } else {
                $output = [
                    'success' => false,
                    'msg' => 'No file to upload'
                ];
                echo json_encode($output);
                die;
            }
        }


        //akses pelapor
        $data_akses = $this->session->userdata('media_call');
        $new_access_pelapor = array();
        foreach($data_akses as $da){
            $new = implode("", $da);
            $row = array();
            $row['relation_laporan'] = $relation_all;
            $row['media_access'] = $new;
            $new_access_pelapor[] = $row;
        }

        //data pelapor
        $data_pelapor = [
            'nama' => $all_data['nama_pelapor'],
            'email' => $all_data['email'],
            'pass' => md5(sha1($new_pass)),
            'is_anonym' => $all_data['status_identitas'],
            'nik' => $all_data['nik'],
            'no_kepegawaian' => $all_data['no_kepegawaian'],
            'telp' => $all_data['telp'],
            'alamat_jalan' => $all_data['jln'],
            'kota' => $all_data['kota'],
            'wilayah' => $all_data['wilayah'],
            'kode_pos' => $all_data['kode_pos'],
            'media_access' => $relation_all,
            'create_at' => date('Y-m-d'),
            'lain_lain' => $all_data['other_media_call']
        ];


        // data laporan
        $data_laporan = [
            'relation_all' => $relation_all,
            'laporan_luar_cangkupan' => $all_data['other_jenis_laporan'],
            'hal_terjadi' =>  $all_data['apa_yang_terjadi'],
            'penyadaran_kasus' => $all_data['penyadaran_kasus'],
            'lama_kasus_berlangsung' => $all_data['lama_kasus'],
            'kasus_sebelumnya' => $all_data['kasus_before'],
            'sumber_informasi' => $all_data['sumber_informasi'],
            'unit_kerja_laporan' => $all_data['unit_kerja_report'],
            'management_terlibat' => $all_data['manajemen_terlibat'],
            'desc_management_terlibat' => $all_data['desc_management_terlibat'],
            'laporan_sebelumnya' => $all_data['laporan_sebelumnya'],
            'selain_anda' => $all_data['orang_lain'],
            'saksi' => $all_data['saksi'],
            'pihak_menutupi_kasus' => $this->input->post('pihak_penutupan_kasus'),
            'hal_berkaitan_kasus' => $this->input->post('hal_berkaitan_kasus'),
            'penyampaian_tentang_kasus' => $this->input->post('penyampaikan_kasus'),
            'bukti_kasus' => $this->input->post('bukti'),
            'desc_bukti' => $this->input->post('tentang_bukti'),
            'create_at' => date('Y-m-d H:i:s'),
            'status_kasus' => 1,
            'respond_by' => 0
        ];

        //data jenis laporan
        $jenis_laporan = $all_data['jenis_laporan'];
        $new_jenis_laporan = array();
        foreach($jenis_laporan as $jl){
            $row = array();
            $row['relation_laporan'] = $relation_all;
            $row['jenis_laporan'] = $jl;
            $new_jenis_laporan[] = $row;
        }

        //data kasus
        $data_kasus = $all_data['kasus_terjadi'];
        $count_kasus = count($data_kasus);
        $new_data_kasus = array();
        for($i=0; $i<$count_kasus; $i++){
            if($data_kasus[$i]['tanggal_terjadi'] != null){
                array_push($new_data_kasus, array(
                    'relation_laporan' => $relation_all,
                    'tanggal' => date('Y-m-d', strtotime($data_kasus[$i]['tanggal_terjadi'])),
                    'provinsi' => $data_kasus[$i]['prov_terjadi'],
                    'kota' => $data_kasus[$i]['kota_terjadi'],
                    'kecamatan' => $data_kasus[$i]['kec_terjadi']
                ));
            }
        }


        //data kasus sebelumnya
        if($all_data['kasus_before'] == 'ya' && $all_data['kasus_sebelumnya'] != null){
            $kasus_sebelumnya = $all_data['kasus_sebelumnya'];
            $new_kasus_sebelumnya = array();
            $count_sebelumnya = count($kasus_sebelumnya);
            for($i=0; $i<$count_sebelumnya; $i++){
                if($kasus_sebelumnya[$i]['tanggal_terjadi'] != null){
                    array_push($new_kasus_sebelumnya, array(
                        'relation_laporan' => $relation_all,
                        'tanggal' => date('Y-m-d', strtotime($kasus_sebelumnya[$i]['tanggal_terjadi'])),
                        'provinsi' => $kasus_sebelumnya[$i]['prov_terjadi'],
                        'kota' => $kasus_sebelumnya[$i]['kota_terjadi'],
                        'kecamatan' => $kasus_sebelumnya[$i]['kec_terjadi']
                    ));
                }
            }
        }


        //sumber infromasi
        if($all_data['sumber_informasi'] == 'pihak kedua' &&  $all_data['informan'] != null){
            $sumber_informasi = $all_data['informan'];
            $new_sumber_informasi = array();
            $count_informasi = count($sumber_informasi);

            for($i=0; $i<$count_informasi; $i++){
                if($sumber_informasi[$i]['nama'] != null){
                    array_push($new_sumber_informasi, array(
                        'relation_laporan' => $relation_all,
                        'panggilan' => $sumber_informasi[$i]['paggilan'],
                        'nama' => $sumber_informasi[$i]['nama'],
                        'divisi' => $sumber_informasi[$i]['divisi']
                    ));
                }
            }
        }

        //pihak terlibat
        if($all_data['people_report'][0]['nama'] != null){
            $pihak_terlibat = $all_data['people_report'];
            $new_pihak_terlibat = array();
            $count_informasi = count($pihak_terlibat);

            for($i=0; $i<$count_informasi; $i++){
                if($pihak_terlibat[$i]['nama'] != null){
                    array_push($new_pihak_terlibat, array(
                        'relation_laporan' => $relation_all,
                        'panggilan' => $pihak_terlibat[$i]['paggilan'],
                        'nama' => $pihak_terlibat[$i]['nama'],
                        'divisi' => $pihak_terlibat[$i]['divisi']
                    ));
                }
            }
        }

        //laporan sebelumnya
        if($all_data['laporan_sebelumnya'] == 'ya' && $all_data['report_before'][0]['nama'] != null){
            $laporan_sebelumnya = $all_data['report_before'];
            $new_laporan_sebelumnya = array();
            $count = count($laporan_sebelumnya);

            for($i=0; $i<$count; $i++){
                if($laporan_sebelumnya[$i]['nama'] != null){
                    array_push($new_laporan_sebelumnya, array(
                        'relation_laporan' => $relation_all,
                        'panggilan' => $laporan_sebelumnya[$i]['paggilan'],
                        'nama' => $laporan_sebelumnya[$i]['nama'],
                        'divisi' => $laporan_sebelumnya[$i]['divisi']
                    ));
                }
            }
        }


        //selain saya
        if($all_data['orang_lain'] == 2 && $all_data['another_people'][0]['nama'] != null){
            $orang_lain = $all_data['another_people'];
            $new_orang_lain = array();
            $count = count($orang_lain);

            for($i=0; $i<$count; $i++){
                if($orang_lain[$i]['nama'] != null){
                    array_push($new_orang_lain, array(
                        'relation_laporan' => $relation_all,
                        'panggilan' => $orang_lain[$i]['paggilan'],
                        'nama' => $orang_lain[$i]['nama'],
                        'divisi' => $orang_lain[$i]['divisi']
                    ));
                }
            }
        }

        //saksi
        if($all_data['saksi'] == 'ya' && $all_data['data_saksi'][0]['nama'] != null){
            $saksi = $all_data['data_saksi'];
            $new_saksi = array();
            $count = count($saksi);

            for($i=0; $i<$count; $i++){
                if($saksi[$i]['nama'] != null){
                    array_push($new_saksi, array(
                        'relation_laporan' => $relation_all,
                        'panggilan' => $saksi[$i]['paggilan'],
                        'nama' => $saksi[$i]['nama'],
                        'divisi' => $saksi[$i]['divisi']
                    ));
                }
            }
        }
        

        // echo json_encode($new_saksi);

        $this->db->trans_start();
        $this->db->insert('pelapor', $data_pelapor);
        $this->db->insert('laporan', $data_laporan);
        $this->db->insert_batch('access_pelapor', $new_access_pelapor);
        $this->db->insert_batch('jenis_laporan', $new_jenis_laporan);
        $this->db->insert_batch('kasus_terjadi', $new_data_kasus);
        $this->db->insert_batch('bukti_kasus',$data_file);
        $this->db->trans_complete();

        if($all_data['kasus_before'] == 'ya' && $all_data['kasus_sebelumnya'] != null){
            $this->db->insert_batch('kasus_sebelumnya', $new_kasus_sebelumnya);
        }

        if($all_data['sumber_informasi'] == 'pihak kedua' && $all_data['informan'] != null){
            $this->db->insert_batch('sumber_informasi', $new_sumber_informasi);
        }

        if($all_data['people_report'][0]['nama'] != null){
            $this->db->insert_batch('pihak_terlibat', $new_pihak_terlibat);
        }
        
        if($all_data['laporan_sebelumnya'] == 'ya' && $all_data['report_before'][0]['nama'] != null){
            $this->db->insert_batch('laporan_sebelumnya', $new_laporan_sebelumnya);
        }

        if($all_data['orang_lain'] == 2 && $all_data['another_people'][0]['nama'] != null){
            $this->db->insert_batch('selain_saya', $new_orang_lain);
        }

        if($all_data['saksi'] == 'ya' && $all_data['data_saksi'][0]['nama'] != null){
            $this->db->insert_batch('saksi', $new_saksi);
        }

        
        

        if($this->db->affected_rows() > 0){
            $nama = $all_data['nama_pelapor'];
            $subject = 'Laporan Pengaduan';
            $link = base_url('login');

            $content = '
                <h4>Halo '.$nama.'</h4>

                <p>Terima kasih atas laporan anda. kami akan segera memproses laporan anda. anda dapat melihat progres laporan anda dengan dengan login di bawah ini dan gunakan email di password di bawah ini untuk login</p>

                <p>
                    <b>Link Login: </b> '.$link.' <br>
                    <b>Email: </b> '.$email_pelapor.' <br>
                    <b>Password: </b> '.$new_pass.'
                </p>
            ';

            $data['content'] = $content;

            $template = $this->load->view('user/template_email', $data, true);

            $this->m->send_mail($subject, $template);

            $output = [
                'success' => true,
                'msg' => 'Laporan berhasil di kirim'
            ];
        } else {
            $output = [
                'success' => false,
                'msg' => 'Failed to insert data'
            ];   
        }


        echo json_encode($output);
    }

    public function load_data(){
        // $new_data = array();
        // $data_media_call = $this->session->userdata('media_call');
        // foreach($data_media_call as $dmc){
        //     $row = array();
        //     $row['nama'] = $dmc;
        //     $new_data[] = $row;
        // }

        $data = $this->session->userdata();
        

        var_dump($data);
        // $date = '16-06-2023';
        // $new_date = date('Y-m-d', strtotime($date));
        // var_dump($new_date);
    }
}
