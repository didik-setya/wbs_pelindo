<?php
defined('BASEPATH')or exit('No direct script access allowed');
class Master_model extends CI_Model {
    public function send_mail($subject = null, $template = null){
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
        $this->email->to('didiksetyaone0@gmail.com');

        $this->email->subject($subject);
        $this->email->message($template);

        if ($this->email->send()) {
            $send = 1;
        } else {
            $send = 0;
        }
        return $send;
    }
}