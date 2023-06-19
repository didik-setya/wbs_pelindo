<?php
defined('BASEPATH')or exit('No direct script access allowed');
class Master_model extends CI_Model {
    public function send_mail($subject = null, $template = null, $email = null){
        $config = [
            //INI BAWAAN DARI GOOGLE
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'didikarpuz@gmail.com',
            'smtp_pass' => 'jmqyoqpqxbhryefr',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n",
            'wordwrap' => true
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('WBS Pelindo', 'Pelabuhan Indonesia');
        $this->email->to($email);

        $this->email->subject($subject);
        $this->email->message($template);

        if ($this->email->send()) {
            $send = 1;
        } else {
            $send = 0;
        }
        return $send;
    }

    public function get_report($id = null){
        $data = $this->db->where('relation_all', $id)->get('laporan')->row();
        return $data;
    }

    public function get_jenis_laporan($id = null){
        $data = $this->db->where('relation_laporan', $id)->get('jenis_laporan')->result();
        return $data;
    }

    public function get_kasus_terjadi($id = null){
        $data = $this->db->where('relation_laporan', $id)->get('kasus_terjadi')->result();
        return $data;
    }

    public function get_kasus_sebelumnya($id = null){
        $data = $this->db->where('relation_laporan', $id)->get('kasus_sebelumnya')->result();
        return $data;
    }

    public function get_informan_pihak_kedua($id){
        $data = $this->db->where('relation_laporan', $id)->get('sumber_informasi')->result();
        return $data;
    }

    public function get_pihak_terlibat($id){
        $data = $this->db->where('relation_laporan', $id)->get('pihak_terlibat')->result();
        return $data;
    }

    public function get_laporan_sebelumnya($id){
        $data = $this->db->where('relation_laporan', $id)->get('laporan_sebelumnya')->result();
        return $data;
    }

    public function get_pihak_lain_menyadari_kasus($id){
        $data = $this->db->where('relation_laporan', $id)->get('selain_saya')->result();
        return $data;
    }

    public function get_saksi($id){
        $data = $this->db->where('relation_laporan', $id)->get('saksi')->result();
        return $data;
    }

}